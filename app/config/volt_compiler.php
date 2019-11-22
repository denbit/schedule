<?php
return function ( \Phalcon\Mvc\View\Engine\Volt\Compiler & $compiler) {

	$compiler->addFunction('substr','substr');
	$compiler->addFilter('replace','replace');
	$compiler->addFunction('translate', function ($_, $exprArgs='') use ($compiler) {

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
			$lang = \Schedule\Core\Kernel::getLanguageId('en');
		}
		$translation = \Schedule\Core\Translate::getTranslation($firstArgument,$lang);
		if (!empty($translation)){
			return preg_match( "/^'.+'$/", $translation) ? $translation : "'{$translation}'";
		} else{
			\Schedule\Core\Translate::setTranslation($firstArgument, $lang, $secondArgument);
			return $secondArgument;
		}
	});
};
