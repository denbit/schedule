<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 16.10.2018
 * Time: 14:56
 */

namespace Schedule\Modules\Authority\Models;


use Phalcon\Config;
use Schedule\Core\Kernel;

use Schedule\Core\LanguageParser;
use Schedule\Core\Models\Languages;
use Schedule\Core\Models\UniversalPage;
use Schedule\Core\PageParser;
use Schedule\Modules\Authority\Forms\PageForm;


class PageManager extends Kernel
{
	private function  scanForModules()
	{
		/**
		 * @var $config Config
		 */

		$opts = array(
			'http'=>array(
				'header'=>"X-Passed: PageManager\r\n"
			)
		);

		$context = stream_context_create($opts);
		if ($stream = fopen($_SERVER['HTTP_HOST'].'/list/main', 'r',false, $context)) {
			// вывести всю страницу начиная со смещения 10
			$controllers = json_decode(stream_get_contents($stream));
			fclose($stream);
		}
		$modules = [];
		foreach ($controllers as $controller=>$actions )
		{
			foreach ($actions as $action) {
				$modules[]=$controller.':'.$action;
			}
		}
		 return (object)[
		 	'modules' => $modules
		 ];
	}

    public function getForm( PageParser $i, bool $edit = false)
    {

		$options = $this->scanForModules();
		$options->modules = array_combine(array_values($options->modules),array_values($options->modules));
		$options->edit = $edit;

       return new PageForm($i,$options);
        
    }

    public function getListOfPages()
    {

		$universal_page=UniversalPage::find([
			'columns'=>'url,module_name, group_concat(lang_id) as lang_id ',
			'group'=>'module_name'
		]);
		$lang_codes=LanguageParser::ListLanguages();
		$availables=[];
		for($i=0;$i<count($universal_page);$i++){
			$langs=explode(',',$universal_page[$i]->lang_id);
			$temp=[];

			foreach ($langs as $avail){
				$temp[$avail] = $lang_codes[$avail];
			}

			$availables[$i]=$universal_page[$i]->toArray();
			sort($temp);
			$availables[$i]['available_langs']= array_reverse($temp,true);
			unset($temp, $availables[$i]['lang_id']);

		}

		return $availables;


    }
}