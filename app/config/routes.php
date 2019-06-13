<?php

 $uri=explode('/',$application ->router->getRewriteUri())[1];

 $map=['carrier','authority'];

 $defualt='frontend';
 $namespaces =[];
 foreach ($application->getModules() as $name =>list('className'=>$className)){

     $namespaces[$name]=preg_replace('/Module$/', 'Controllers', $className);
 }
if(in_array($uri,$map)&& is_dir( BASE_PATH.$di->getConfig()->get('application')->modulesDir.$uri) ) {
		$module=$application->getModule($uri);
	require_once  BASE_PATH.$di->getConfig()->get('application')->modulesDir.$uri.'/config/routes.php';

}else{$module=$application->getModule($defualt);
	require_once  BASE_PATH.$di->getConfig()->get('application')->modulesDir.$defualt.'/config/routes.php';
}


