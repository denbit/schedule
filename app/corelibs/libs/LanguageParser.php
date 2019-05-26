<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 5/26/2019
 * Time: 9:15 PM
 */

namespace Schedule\Core;


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

}