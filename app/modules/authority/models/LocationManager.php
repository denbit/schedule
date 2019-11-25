<?php


namespace Schedule\Modules\Authority\Models;


use Phalcon\Db\Column;
use Phalcon\Exception;
use Phalcon\Mvc\Model;
use Schedule\Core\Kernel;
use Schedule\Core\Location;
use Schedule\Core\Models\Cities;
use Schedule\Core\Models\LocalRegions;
use Schedule\Core\Models\LocationNodeInterface;
use Schedule\Core\Models\States;
use Schedule\Core\Models\Stations;
use Schedule\Modules\Authority\Forms\IDispayable;
use Schedule\Modules\Authority\Forms\LocationForm;

class LocationManager extends Kernel
{
    /**
     * @var int|null $base_id
     */
    private $base_id;
    private $country_latin_name;
    private $country_cyr_name;
    private $country_national_name;

    /**
     * @return int|null
     */
    public function getBaseId():?int
    {
        return $this->base_id;
    }

    /**
     * @param int|null $base_id
     * @return LocationManager
     */
    public function setBaseId($base_id)
    {
        $this->base_id = $base_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountryLatinName():?string
    {
        return $this->country_latin_name;
    }

    /**
     * @param string $country_latin_name
     * @return LocationManager
     */
    public function setCountryLatinName($country_latin_name)
    {
        $this->country_latin_name = $country_latin_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountryCyrName():?int
    {
        return $this->country_cyr_name;
    }

    /**
     * @param string $country_cyr_name
     * @return LocationManager
     */
    public function setCountryCyrName($country_cyr_name):?string
    {
        $this->country_cyr_name = $country_cyr_name;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCountryNationalName():?string
    {
        return $this->country_national_name;
    }

    /**
     * @param string $country_national_name
     * @return LocationManager
     */
    public function setCountryNationalName($country_national_name)
    {
        $this->country_national_name = $country_national_name;
        return $this;
    }

    /**
     * @param LocationManager|null $instance
     * @param array|null $options
     * @return LocationForm
     */
    public static function getForm(self $instance = null, $options = []):LocationForm
    {
        $instance = $instance ?? new self();
        return new LocationForm($instance, $options);
    }

    public static function getBaseCountry(int $id):self
    {
        $state = States::findFirst($id);
        $instance = new self();
        $instance->base_id = $id;
        $instance->country_cyr_name = $state->getCyrName();
        $instance->country_latin_name = $state->getLatinName();
        $instance->country_national_name = $state->getNationalName();
        return  $instance;
    }

	public function getOverview(): object
	{
		$list = [
			'countries' => States::count(),
			'cities' => Cities::count(),
			'local_regions' => LocalRegions::count(),
			'stations' => Stations::count(),
		];
		$list = array_change_key_case($list, CASE_UPPER);
		$base_country = $this->session->get('base_country', 'Ukraine');
		$per_state = new Location();
		$per_state->addState(States::getOneByAnyName($base_country));
		$per_state_tree = $per_state->buildTree();
		$result_set = [
			'list' => $list,
			'per_state' => $per_state_tree,
			'tree_list' => $this->build_list_tree($per_state_tree),
		];

		return (object)$result_set;
	}

	private function build_list_tree($tree)
	{
		$string = '';
		$closere = function ($item, $key, $closere) use (&$string) {
			$string .= $this->getPartialTemplate(
				'locationTree',
				[
					'key' => $key,
					'item' => $item,
					'nodeNames' => Location::$location_nodes,
					'nodesChildren'=> Location::$location_children_nodes
				]
			);
			if (is_array($item) && is_array($item['children'])) {
				array_walk($item['children'], $closere, $closere);
			}
			$string .= $this->getPartialTemplate('locationTreeEnd', ['key' => $key, 'item' => $item]);
		};

		array_walk($tree, $closere, $closere);

		return $string;

	}

	/**
	 * @param Model $item_to_add|LocationNodeInterface
	 * @param Model $parent_entity|LocationNodeInterface
	 * @return bool
	 * @throws Model\Exception
	 */
	public function addItem(Model $item_to_add, Model $parent_entity)
	{
		$item_to_add->setParentId($parent_entity->getId());

		if (!$item_to_add->create()) {
			$messages = $item_to_add->getMessages();
			throw new Model\Exception(implode("\n", $messages));
		}

		return true;
	}

	public function getParent(string $category, int $id)
	{
		if (in_array($category, Location::$location_nodes)) {
			/**
			 * @var $locationNode Model
			 */
			$locationNode = Location::getNodeName($category);

			return $locationNode::findFirst($id);
		}
		throw new Exception("$category is not location node");
	}

	public function getInstanceFromData(string $category, array $data, ?int $id)
	{
		if (in_array($category, Location::$location_nodes)) {
			/**
			 * @var $node Model
			 */
			$locationNodeName = Location::getNodeName($category);
			if ( !is_null($id)){
				 if (false ===($locationNode = $locationNodeName::findFirst($id)))
				 {
					 throw new Exception("$category $id doesn't exist");
				 }
				$data =  array_intersect_key($data, $this->getFields($category));
			}
			else{

				$locationNode = new $locationNodeName();
			}

			$locationNode->assign($data);

			return $node;
		}
		throw new Exception("$category is not location node");
	}

	public function getFields($category, int $id = null)
	{
		if (in_array($category, Location::$location_nodes)) {
			/**
			 * @var $locationNode Model|LocationNodeInterface
			 */
			$locationNodeName = Location::getNodeName($category);
			$locationNode = new $locationNodeName();
			$metadata = $locationNode->getModelsMetaData();
			$dataTypes = $metadata->getDataTypes($locationNode);
			$nodeFields = $locationNode->getFields($dataTypes);
			if ( !is_null($id)){
				$locationNode = $locationNodeName::findFirst($id);
				$nodeFields = array_intersect_key($locationNode->toArray(), $nodeFields);
			}

			return $nodeFields;
		}
		throw new Exception("$category is not location node");
	}

	public function delete($category, int $id)
	{
		$node = $this->getParent($category,$id);
		$node->delete();//make recursive delete
}

}