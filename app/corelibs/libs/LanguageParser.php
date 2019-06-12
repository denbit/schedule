<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 5/26/2019
 * Time: 9:15 PM
 */

namespace Schedule\Core;


use Phalcon\Mvc\Model\Resultset;
use Schedule\Core\Models\Languages;

class LanguageParser
{

	public static function SystemLanguage($lang='')
	{
		$kernel= new Kernel();
		if(empty($lang)){

			return	$kernel->detectLanguage();
		}
			else{
				$kernel->rememberLanguage($lang);
			}
	  }
	  public static function ListLanguages():array {
		$kernel=new Kernel();
		  $lang_codes=Languages::find([
			  'columns'=>'lang_id,lang_code',
			  'hydration'=>Resultset::HYDRATE_ARRAYS
		  ])->toArray();
		  $ids=array_column($lang_codes,'lang_id');
		  $codes=array_column($lang_codes,'lang_code');
		  return array_combine($ids,$codes);
	  }

}