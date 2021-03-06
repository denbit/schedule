<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 03.10.2018
 * Time: 15:21
 */

namespace Schedule\Core;

use Phalcon\Cache\Exception;
use Phalcon\Mvc\View;
use Phalcon\Text;
use Schedule\Core\Models\Languages;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

/**
 * Phalcon\Di\Injectable
 *
 * This class allows to access services in the services container by just only accessing a public property
 * with the same name of a registered service
 *
 * @property \Phalcon\Mvc\Dispatcher|\Phalcon\Mvc\DispatcherInterface                                  $dispatcher
 * @property \Phalcon\Mvc\Router|\Phalcon\Mvc\RouterInterface                                          $router
 * @property \Phalcon\Mvc\Url|\Phalcon\Mvc\UrlInterface                                                $url
 * @property \Phalcon\Http\Request|\Phalcon\Http\RequestInterface                                      $request
 * @property \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface                                    $response
 * @property \Phalcon\Http\Response\Cookies|\Phalcon\Http\Response\CookiesInterface                    $cookies
 * @property \Phalcon\Filter|\Phalcon\FilterInterface                                                  $filter
 * @property \Phalcon\Flash\Direct                                                                     $flash
 * @property \Phalcon\Flash\Session                                                                    $flashSession
 * @property \Phalcon\Session\Adapter\Files|\Phalcon\Session\Adapter|\Phalcon\Session\AdapterInterface $session
 * @property \Phalcon\Events\Manager|\Phalcon\Events\ManagerInterface                                  $eventsManager
 * @property \Phalcon\Db\AdapterInterface                                                              $db
 * @property \Phalcon\Security                                                                         $security
 * @property \Phalcon\Crypt|\Phalcon\CryptInterface                                                    $crypt
 * @property \Phalcon\Tag                                                                              $tag
 * @property \Phalcon\Escaper|\Phalcon\EscaperInterface                                                $escaper
 * @property \Phalcon\Annotations\Adapter\Memory|\Phalcon\Annotations\Adapter                          $annotations
 * @property \Phalcon\Mvc\Model\Manager|\Phalcon\Mvc\Model\ManagerInterface                            $modelsManager
 * @property \Phalcon\Mvc\Model\MetaData\Memory|\Phalcon\Mvc\Model\MetadataInterface                   $modelsMetadata
 * @property \Phalcon\Mvc\Model\Transaction\Manager|\Phalcon\Mvc\Model\Transaction\ManagerInterface    $transactionManager
 * @property \Phalcon\Assets\Manager                                                                   $assets
 * @property \Phalcon\Di|\Phalcon\DiInterface                                                          $di
 * @property \Phalcon\Session\Bag|\Phalcon\Session\BagInterface                                        $persistent
 * @property \Phalcon\Mvc\View|\Phalcon\Mvc\ViewInterface                                              $view
 * @property \Phalcon\Cache\Backend|\Phalcon\Cache\Backend[]                                           $coreCache
 * @property \Phalcon\Logger\Adapter\File                                                              $logger
 */
class Kernel
{
	/**
	 * @var \Phalcon\Di
	 */
	private static $di_inst = null;
	/**
	 * @var \Phalcon\Di
	 */
	protected $di;

	public final function __construct()
	{
		if (is_null(self::$di_inst)) {
			global $application;
			$this->di = self::$di_inst = $application->getDI();
		} else {
			$this->di = self::$di_inst;
		}

	static::on__construct();
	}

	protected function on__construct()
	{

	}

	public static function toObject(array $array): \stdClass
	{
		return json_decode(json_encode($array), false);

	}

	/**
	 * serialize() checks if your class has a function with the magic name __sleep.
	 * If so, that function is executed prior to any serialization.
	 * It can clean up the object and is supposed to return an array with the names of all variables of that object that should be serialized.
	 * If the method doesn't return anything then NULL is serialized and E_NOTICE is issued.
	 * The intended use of __sleep is to commit pending data or perform similar cleanup tasks.
	 * Also, the function is useful if you have very large objects which do not need to be saved completely.
	 *
	 * @return string[]
	 * @link https://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.sleep
	 */
	public function __sleep()
	{
		$ref =new \ReflectionClass( static::class);
		$vars=[];
		foreach ($ref->getProperties(\ReflectionProperty::IS_PRIVATE|\ReflectionProperty::IS_PROTECTED|\ReflectionProperty::IS_PUBLIC) as $item) {
			if ($item->getName()=='di'||$item->isStatic())
				continue;
			$vars[]=$item->getName();
		   }
		return $vars;
	}

	/**
	 * unserialize() checks for the presence of a function with the magic name __wakeup.
	 * If present, this function can reconstruct any resources that the object may have.
	 * The intended use of __wakeup is to reestablish any database connections that may have been lost during
	 * serialization and perform other reinitialization tasks.
	 *
	 * @return void
	 * @link https://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.sleep
	 */
	public function __wakeup()
	{
		$this->di = self::$di_inst;
	}


	public function __get($var)
	{
		 return $this->di->get($var);
//		if (property_exists($this->di, $var)) {
//			return $this->di[$var];
//		} else {
//			return false;
//		}
	}

	public function getPartialTemplate($template,$vars=null){
		$view_inst= new View\Simple();
		$view_dir = $this->di->getConfig()->get('application')->partialViewDir;
		$view_inst->setViewsDir(APP_PATH . $view_dir);
		$view_inst->registerEngines([
			'.volt' => function ($simpleView, $di) {
				$volt = new VoltEngine($simpleView, $di);
				$volt->setOptions(['compileAlways' => $this->di->getConfig()->application->development==true ? true:false]);
				$compiler = $volt->getCompiler();
				/**
				 * @var \Closure $prepareCompiler
				 */
				$prepareCompiler = include APP_PATH . '/config/volt_compiler.php';
				$prepareCompiler($compiler);
				return $volt;
			}
		]);
		$view_inst->setDI($this->di);
		if($vars){
			$view_inst->setVars($vars);
		}
		return $view_inst->render($template.'.volt');

	}
	public static function getLanguageId(string $lang): int
	{
		$lang = Languages::findFirst("lang_code like '{$lang}'");
		if ($lang === false) {
			$lang = Languages::findFirst("lang_code like 'uk'");
		}
		$lang_id = $lang->lang_id;
		return $lang_id;

	}

	public function rememberLanguage($lang)
	{
		if (Languages::count(
				[
					'conditions' => 'lang_code like ?0',
					'bind'       => [$lang]
				]
			) == 1
		) {
			$this->di['cookies']->set('current', $lang, time() + 15 * 86400);
			$this->di['cookies']->useEncryption(false);
			$this->di['cookies']->send();
		}

	}

	public function detectLanguage(): string
	{
		if ($this->di['cookies']->has('current')) {
			return $this->di['cookies']->get('current');
		} else {
			$locale = \Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
			return \Locale::getPrimaryLanguage($locale);
		}

	}

	public  static function getLanguageById($lang_id): string
	{
		$lang = Languages::findFirst("lang_id like '{$lang_id}'");
		if ($lang === false) {
			$lang = 'uk';
		}
		$lang_id = $lang->lang_code;
		return $lang_id;

	}

	/**
	 * @param $input  should contain input params
	 * @param string $model If cache key for Model, $model is neccessary
	 * @return string if it is called from model $class=Kernel if from Kernel childs then $child::class
	 */
	public static function createCacheKey($input, $model=''):string
	{
		if (!empty($model)){
			return self::createCacheKeyForModel($input,$model);
		}
		if (is_null($input))
			throw  new Exception("Key must exist");
		$reducer = function ($accamulator, $key)use ($input){
			if ($key=='di') return $accamulator;
			$input[$key]=is_array($input[$key])?implode('',$input[$key]):$input[$key];
			 $accamulator.= ('_'.$key.'&'.$input[$key]);
			return $accamulator;
		};
		$type =gettype($input);
		$class = (get_called_class().$model)."=";
		$key = '';
		switch ($type){
			case "boolean":
			case "integer":
			case "double":
			case "string":
			$key = $class. (string)$input;
				break;
			case "array":
			 $key = array_reduce(array_keys($input),$reducer,$class);
				break;
			case "object":
				if($input instanceof \stdClass){
					$input = (array)$input;
					$key = array_reduce(array_keys($input),$reducer,$class);
				}
				break;
		}
		$key = strtolower(str_replace('\\','_',$key));
//if( $model &&!$key ){
//	echo $class;
//	echo $key,"  - key\n";
//}
		return md5($key);
	}
	/**
	 * @param $input  should contain input params
	 * @param string $model If cache key for Model, $model is neccessary
	 * @return string if it is called from model $class=Kernel if from Kernel childs then $child::class
	 */
	public static function createCacheKeyForModel($input, $model):string
	{
		$self = new self();
		$self->logger->debug(json_encode($input));
		if (is_null($input))
			throw  new Exception("Key must exist");

		$type =gettype($input);
		$class = (get_called_class().$model)."=";
		switch ($type){
			case "boolean":
			case "integer":
			case "double":
			case "string":
				$input = ["id" => (string) $input];
				break;
			case "array":
				if (array_key_exists('bind', $input)) {
					$key = array_key_exists("0", $input)? 0 : null;
					$key = (is_null($key) && array_key_exists("conditions", $input)) ? "conditions" : $key;
					foreach ($input['bind'] as $bindkey => $bindee){
						var_dump($bindkey,$bindee,$input[$key],$key);
						$input[$key] = is_numeric($bindkey)
							?
							str_replace("?${$bindkey}", $bindee, $input[$key])
							:
							str_replace(":$bindkey:", $bindee, $input[$key]);
					}
					unset($input['bind']);
				}
				break;
			case "object":
				if($input instanceof \stdClass){
					$input = (array)$input;
				}
				break;
		}

		$reducer = function ($accamulator, $reduce_key) use ($input,$self){
			$reduce_key = (string)$reduce_key;
			if ($reduce_key=='di')	return $accamulator;
			//$input[$key]=is_array($input[$key])?implode('',(string)$input[$key]):(string)$input[$key];
			//echo $input;
			$value = str_replace(' ','', $input[$reduce_key]);

			$accamulator.= ('_'.$reduce_key . "&{$value}");

			return $accamulator;
		};
		$key = (string) array_reduce(array_keys($input),$reducer,$class);
		$key = strtolower(str_replace('\\','_',$key));

//if( $model &&!$key ){
//	echo $class;
//	echo $key,"  - key\n";
//}

$self->logger->info($key);

		return md5($key);
	}

}