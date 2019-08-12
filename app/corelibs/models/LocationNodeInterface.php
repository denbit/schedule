<?php


namespace Schedule\Core\Models;


interface LocationNodeInterface
{
	/**
	 * @param array $fields Fields of model $fieldName => Phalcon\Db\Column Dype
	 * @return array of editable column
	 */
	public function getFields(array $fields);

	/**
	 * @param int $id  Id of parent model - specifies the relatin in autofilling
	 * @return null
	 */
	public function setParentId(int $id);

	/**
	 * Deletes all related children models
	 * @return $this
	 */
	public function deleteChildren();

}