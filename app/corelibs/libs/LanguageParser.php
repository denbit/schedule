<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 5/26/2019
 * Time: 9:15 PM
 */

namespace Schedule\Core;


use Phalcon\Di;
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

	/**
	 * @return array of pairs lang_id => lang_code
	 */
	  public static function ListLanguages():array {
		  /**
		   * @var Di
		   */
	  	$di =Di::getDefault();
		if(false==($lang_list=$di->coreCache->fast->get('language_list'))){
			$lang_codes = Languages::find([
				'columns'=>'lang_id, lang_code',
				'hydration'=>Resultset::HYDRATE_ARRAYS
			])->toArray();
			$lang_list = array_column($lang_codes,'lang_code','lang_id');
			$di->coreCache->fast->save('language_list',$lang_list, 3600);
		}

		  return $lang_list;
	  }

}