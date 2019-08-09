<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 03.10.2018
 * Time: 15:21
 */

namespace Schedule\Core;

use Phalcon\Mvc\View;
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

	$this->on__construct();
	}

	private function on__construct()
	{

	}

	public static function toObject(array $array): \stdClass
	{
		return json_decode(json_encode($array), false);

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

	public function getPartialTemplate($template,...$vars){
		$view_inst= new View\Simple();
		$view_dir = $this->di->getConfig()->get('application')->partialViewDir;
		$view_inst->setViewsDir(APP_PATH . $view_dir);
		$view_inst->registerEngines([
			'.volt' => function ($simpleView, $di) {
				$volt = new VoltEngine($simpleView, $di);
				return $volt;
			}
		]);
		$view_inst->setDI($this->di);
		$view_inst->setVars($vars[0]);
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

}