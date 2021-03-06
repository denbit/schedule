<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 17:39
 */

namespace Schedule\Core;


use Phalcon\Mvc\Model\Transaction\Exception;
use Schedule\Core\Models\Content;
use Schedule\Core\Models\Pages;
use Schedule\Core\Models\SEOInfo;
use Schedule\Core\Models\UniversalPage;

class PageParser extends Kernel
{
	const DYNAMIC_PAGE = 1;
	const HAS_STATIC_PAGE = 2;
	public $id;
	public $module_name;
	public $url;
	public $page_type;
	public $has_permanent_url;
	public $additional_content;
	public $document_title;
	/**
	 * @var object
	 */
	public $content;
	public $title;
	public $seo_title;
	public $seo_desc;
	public $seo_before_route;
	public $seo_menu_title;
	public $language;
	public $keywords;

	protected function on__construct(){

		$obj = [
			'title' => null,
			'head_' => null,
			'content_title' => null,
			'content' => null,
			'body_' => null,
			'footer_' => null,
		];
		$this->content = Kernel::toObject($obj);
	}

	/**
	 * @param string $lang(uk|en|ru)
	 * @param string $url
	 * @param string $module
	 * @param int $uni_page_id
	 * @return $this|bool
	 */
	public function loadPage($lang = '', $url = '', $module = '', $uni_page_id = null)
	{

		$lang_id = Kernel::getLanguageId($lang);
		/**
		 * @var $page UniversalPage
		 */
		if (!empty($url) && !empty($module)){
			$page = UniversalPage::findFirst(["url like '{$url}' and lang_id={$lang_id} and module_name='{$module}'"]);
		}elseif (!empty($url)) {
			$page = UniversalPage::findFirst(["url like '{$url}' and lang_id={$lang_id}"]);
		}elseif (!empty($module)) {
			$page = UniversalPage::findFirst(["module_name like '{$module}' and lang_id={$lang_id}"]);
		}elseif (!empty($uni_page_id)){
			$page = UniversalPage::findFirst($uni_page_id);
		}
		if ($page === false){
			return false;
		}
		$this->id = $page->getId();
		$this->language = $page->getLangId();
		$this->has_permanent_url = $page->getHasPermanentUri();//using uri else using pattern

		$this->url = $page->getUrl();
		$this->module_name = $page->getModuleName();
		if (($page_inst = $page->page) === false) {
			$page_inst = new Pages();
			$seo = new SEOInfo();
		} else {
			$seo = $page->page->seo;
		}
		$this->page_type = $page_inst->pagetype->id;
		$this->additional_content = $page_inst->getAdditionalContent();
		$this->document_title = $page_inst->getDocumentTitle();

		if ($this->page_type === PageParser::HAS_STATIC_PAGE && $page_inst->getContentId()){
			$this->content = (object) $page_inst->content->toArray(get_object_vars($this->content));
		}
		$this->seo_title = $seo->getTitle();
		$this->keywords = $seo->getKeywords();
		$this->seo_desc = $seo->getDescription();
		$this->seo_before_route = $seo->getBeforeRoute();
		$this->seo_menu_title = $seo->getMenuTitle();

		return $this;

	}

	public static function getPage($lang = '', $url = '', $module = '', $uni_page_id = null):self
	{
		return (new self())->loadPage($lang, $url, $module, $uni_page_id);
	}

	/**
	 * Make saving transaction
	 * @throws Exception
	 * @return bool
	 */
	public function savePage() //rework save method!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	{
		$edit = false;
		$log_message = '';

		$this->db->begin();
		if (!empty($this->id) && UniversalPage::count($this->id) == 1) {
			$edit = true;
			$uni = UniversalPage::findFirst($this->id);
			$log_message .= "Page  exists  \n";
		} else {
			$uni = new UniversalPage();
		}

		$uni->setHasPermanentUri($this->has_permanent_url);
		//change modules for all locales

		if ($uni->getId()){
			$modules = UniversalPage::find([
				"module_name=?0 AND id<> ?1",
				'bind'=>[$uni->getModuleName(),$uni->getId()]
			]);
			if ( !$modules->update(['module_name'=>$this->module_name])) {
				$messages = $modules->getMessages();
				foreach ($messages as $message) {
					echo 'Message: ', $message->getMessage();
					echo 'Field: ', $message->getField();
					echo 'Type: ', $message->getType();
				}
				$this->throwWriteError($log_message);
			}
		}
		$uni->setModuleName($this->module_name);


		$uni->setUrl($this->url);
		$uni->setLangId($this->language);

		if ($uni->save()) {
			$log_message .= "universal page saved\n";
			if (
				!$edit
				||
				is_null($uni->getPageId())
				||
				false === ($page = Pages::findFirst($uni->getPageId()))
			) {
				$page = new Pages();
			}
			$page->setAdditionalContent($this->additional_content);
			$page->setTypeId($this->page_type);
			$page->setDocumentTitle($this->document_title);

			if ($this->page_type === PageParser::HAS_STATIC_PAGE) {
				if (
					!$edit
					||
					is_null($page->getContentId())
				) {
					$content = new Content();
				} else {
					$content = Content::findFirst($page->getContentId());
				}
				$content->assign((array)$this->content);
				if ( !$content->save()) {
					$messages = $content->getMessages();

					foreach ($messages as $message) {
						echo 'Message: ', $message->getMessage();
						echo 'Field: ', $message->getField();
						echo 'Type: ', $message->getType();
					}
					$this->throwWriteError($log_message);
				}
				$content_message = "content updated";
				if ( !$edit || is_null($page->getContentId())) {
					$content_message = "content saved\n";
					$page->setContentId($content->getId());
					$content_message.= "content linked to page\n";
				}
				$log_message .= $content_message;
			}

			if (
				!$edit
				||
				is_null($page->getSeoInfoId())
			) {
				$seo = new SEOInfo();
			} else {
				$seo = SEOInfo::findFirst($page->getSeoInfoId());
			}
			$seo->setBeforeRoute($this->seo_before_route);
			$seo->setDescription($this->seo_desc);
			$seo->setTitle($this->seo_title);
			$seo->setMenuTitle($this->seo_menu_title);
			$seo->setKeywords($this->keywords);
			if (!$seo->save()) {
				$this->throwWriteError($log_message);
			}
			if ( !$edit || is_null($page->getSeoInfoId())) {
				$page->setSeoInfoId($seo->getId());
			}
			$log_message .= "Seo info saved \n";

			// Finalising save process
			if ( !$page->save()) {
				$this->throwWriteError($log_message);
			}
			if ( !$edit || is_null($uni->getPageId())) {
				$uni->setPageId($page->getId());
				$seo->setToPage($page->getId());
				$log_message .= "Seo info linked to page and page linked to unversal page \n";
			}
			$log_message .= "page saved\n";
			if (!$seo->save() || !$uni->save()) {
				$this->throwWriteError($log_message);
			}
			$log_message .= "Everything is saved";
			echo $log_message;
			$this->db->commit();

		} else {
			$this->throwWriteError($log_message);
		}
	}


	private function throwWriteError($m)
	{
		$this->db->rollback();
		throw new Exception($m);
	}


}