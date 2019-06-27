<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:11
 */

namespace Schedule\Core\Models;


use Phalcon\Mvc\Model;

class TranslationsCommon extends Model
{

private $id;
private $key;
private $lang_id;
private $description;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param  mixed  $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getKey()
	{
		return $this->key;
	}

	/**
	 * @param  mixed  $key
	 */
	public function setKey($key)
	{
		$this->key = $key;
	}

	/**
	 * @return mixed
	 */
	public function getLangId()
	{
		return $this->lang_id;
	}

	/**
	 * @param  mixed  $lang_id
	 */
	public function setLangId($lang_id)
	{
		$this->lang_id = $lang_id;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param  mixed  $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}



	public function getSource()
    {
        return 'translations_common';
    }
}