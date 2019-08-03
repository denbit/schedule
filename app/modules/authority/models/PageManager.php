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
use Schedule\Core\Models\UniversalPage;
use Schedule\Core\PageParser;
use Schedule\Modules\Authority\Forms\PageForm;
use Schedule\Modules\Frontend\Controllers\IndexController;

class PageManager extends Kernel
{
	private function  scanForModules()
	{
		/**
		 * @var $config Config
		 */
		if ($stream = fopen('http://test.xn--k1auh3a.space/list/main', 'r')) {
			// вывести всю страницу начиная со смещения 10
			$config =  stream_get_contents($stream);

			fclose($stream);
		}
		echo $config;


	}

    public function getForm( PageParser $i)
    {
    	var_dump($this->scanForModules());die;
       return new PageForm($i,$available_modules);
        
    }

    public function getAllPages()
    {
        $uni=UniversalPage::getAllPages();
        return $uni;
    }
}