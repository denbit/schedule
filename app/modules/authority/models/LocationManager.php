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

class LocationManager extends Kernel
{

	public function getOverview(): object
	{
		$list = [
			'countries' => States::count(),
			'cities' => Cities::count(),
			'local_regions' => LocalRegions::count(),
			'stations' => Stations::count(),
		];
		$list = array_change_key_case($list, CASE_UPPER);
		$per_state = new Location();
		$per_state->addState(States::getOneByAnyName('Ukraine'));
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
				['key' => $key, 'item' => $item, 'nodeNames' => Location::$location_nodes]
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

	public function getInstanceFromData(string $category, array $data, int $id = null)
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
			 * @var $node Model|LocationNodeInterface
			 */
			$locationNodeName =Location::getNodeName($category);
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
	private function get_template($key, $item)
	{
		return <<< HTML
<li data-id=$key> 
	<button class="btn btn-link collapsed" data-toggle="collapse" href="#{$item['name']}_collapse" role="button" aria-expanded="false" aria-controls="collapse">
	{$item['name']}
	</button>
	<ul class="collapse" id="{$item['name']}_collapse">
HTML;
	}
}