<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 5/26/2019
 * Time: 8:57 PM
 */

namespace Schedule\Core;



use Phalcon\Mvc\Model\Resultset;
use Schedule\Core\Models\Languages;
use Schedule\Core\Models\TranslationsCommon;

class Translate  extends Kernel
{
	public static function getTranslation( string $key, int $lang_id):string
	{
		$key=str_replace(['"',"'"],[''],$key);
		$lang_key=TranslationsCommon::findFirst([
			 "lang_id=?0 and key like ?1",
			'bind' => [$lang_id, $key]
		]);
		if ($lang_key !==false)
		{
			return $lang_key->description;
		}
		return '';

	}

	public static function setTranslation( string $key, string $lang_id, string $value):bool
	{

		$lang_key=TranslationsCommon::findFirst([
			'lang_id=?0 and key like ?1',
			'bind' => [$lang_id, self::filter($key)]
		]);
		if ($lang_key !==false)
		{
			 $lang_key->description = $value;
			 return $lang_key->update();
		} else{
			$lang_key =new TranslationsCommon();
			return $lang_key->save([
				'key'=>self::filter($key),
				'lang_id' =>$lang_id,
				'description' => $value
			]);
		}

	}

	public static function filter($value)
	{
		return str_replace(['"',"'"],[''],$value);
	}

	/**
	 * @param  int  $limit
	 * @param  Languages|null  $language
	 *
	 * @return \Phalcon\Mvc\Model\ResultsetInterface
	 */
	public static function getAllTransations($limit=25, Languages $language = null)
	{
		 $records=TranslationsCommon::find([
		 	'limit'=>$limit,
		    'hydration'=>Resultset::HYDRATE_OBJECTS
		 ]);
		$resultset =[];
		$list = LanguageParser::ListLanguages();
		foreach ($records as $record)
		{
			if (!array_key_exists($record->key,$resultset)){
			$resultset[$record->key]=[];
			}
			$resultset[$record->key]=[
				$list[$record->lang_id]=>[
					'id'=>$record->lang_id,
					'value'=>$record->description
				]
			];
		}
	return $resultset;
	}



}