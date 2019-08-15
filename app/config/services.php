<?php

use Phalcon\Loader;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Config\Adapter\Ini;
use Phalcon\Cache\Backend\{File as LongCache, Memory as ShortCache};

/**
 * Shared configuration service
 */
$di->setShared('config', function () {
	return new Ini(APP_PATH  . "/config/config.ini");
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () {
	$config = $this->getConfig();

	$class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
	$params = [
		'host'     => $config->database->host,
		'username' => $config->database->username,
		'password' => $config->database->password,
		'dbname'   => $config->database->dbname,
		'charset'  => $config->database->charset
	];

	if ($config->database->adapter == 'Postgresql') {
		unset($params['charset']);
	}

	$connection = new $class($params);

	return $connection;
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
	return new MetaDataAdapter();
});

/**
 * Configure the Volt service for rendering .volt templates
 */
$di->setShared('voltShared', function ($view) {
	$config = $this->getConfig();

	$volt = new VoltEngine($view, $this);
	$volt->setOptions([
		'compiledPath' => function($templatePath) use ($config) {
			$basePath = $config->application->appDir;
			if ($basePath && substr($basePath, 0, 2) == '..') {
				$basePath = dirname(__DIR__);
			}

			$basePath = realpath($basePath);
			$templatePath = trim(substr($templatePath, strlen($basePath)), '\\/');

			$filename = basename(str_replace(['\\', '/'], '_', $templatePath), '.volt') . '.php';

			$cacheDir = $config->application->cacheDir;
			if ($cacheDir && substr($cacheDir, 0, 2) == '..') {
				$cacheDir = __DIR__ . DIRECTORY_SEPARATOR . $cacheDir;
			}

			$cacheDir = realpath($cacheDir);

			if (!$cacheDir) {
				$cacheDir = sys_get_temp_dir();
			}

			if (!is_dir($cacheDir . DIRECTORY_SEPARATOR . 'volt' )) {
				@mkdir($cacheDir . DIRECTORY_SEPARATOR . 'volt' , 0755, true);
			}

			return $cacheDir . DIRECTORY_SEPARATOR . 'volt' . DIRECTORY_SEPARATOR . $filename;
		},
		'compileAlways' => $config->application->development==true ? true:false

	]);
	$compiler=$volt->getCompiler();
	$compiler->addFunction('substr','substr');
	$compiler->addFunction('translate', function ($res, $exprArgs='')use ($compiler) {

		// Resolve the first argument
		$firstArgument = $compiler->expression($exprArgs[0]['expr']);
		$secondArgument ='';
		// Checks if the second argument was passed
		if (isset($exprArgs[1])) {
			$secondArgument = $compiler->expression($exprArgs[1]['expr']);
		}
		$di = \Phalcon\DI::getDefault();
		if ($di->getSession()->has('language')) {
			$lang =$di->getSession()->get('language');
		}else{
			$lang = \Schedule\Core\Kernel::getLanguageId('uk');
		}
		echo $translation = \Schedule\Core\Translate::getTranslation($firstArgument,$lang);
		if (!empty($translation)){echo 1;
			return $translation;
		} else{
			\Schedule\Core\Translate::setTranslation($firstArgument,$lang,$secondArgument);
			return $secondArgument;
		}
	});

	return $volt;
});
$di->setShared('modelsCache', function (){
	$storage_format_quick =  new \Phalcon\Cache\Frontend\Data(
	[
		'lifetime' => 1800,
	]
);

	return new ShortCache($storage_format_quick);
});
$di->setShared('coreCache',function (){
	$storage_format = new \Phalcon\Cache\Frontend\Igbinary([
		'lifetime' => 1800,
	]);
	$storage_format_quick =  new \Phalcon\Cache\Frontend\Data(
		[
			'lifetime' => 1800,
		]
	);
	$cache = new ShortCache($storage_format_quick);
	//!! add config reading!
	$cacheDir = $this->getConfig()->application->cacheDir;
	if ($cacheDir && (substr($cacheDir, 0, 2) == '..'|| substr($cacheDir, 0, 3) == '/..')) {
		$cacheDir = APP_PATH . DIRECTORY_SEPARATOR . $cacheDir;
	}

	$cacheDir = realpath($cacheDir);
	$targetDir = $cacheDir."/core";
	if(!is_dir($targetDir)){
		mkdir($targetDir,755,true);
	}

	$long_cache = new LongCache($storage_format,[
		"cacheDir"=> $targetDir . DIRECTORY_SEPARATOR
	]);
	return (object)[
		'fast'=>$cache,
		'slow'=>$long_cache
	];
});