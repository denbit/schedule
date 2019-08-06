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
	const STATIC_PAGE = 2;
	public $id;
	public $module_name;
	public $url;
	public $page_type;
	public $has_permanent_url;
	public $additional_title;
	public $content;
	public $title;
	public $seo_name;
	public $seo_title;
	public $seo_desc;
	public $seo_before_route;
	public $seo_menu_title;
	public $language;

	public function getPage($lang, $url = '', $module = '', $uni_page_id = null)
	{

		$lang_id = Kernel::getLanguageId($lang);
		if (!empty($url)) {
			$page = UniversalPage::findFirst(["url like '{$url}' and lang_id={$lang_id}"]);
		}
		if (!empty($module)) {
			$page = UniversalPage::findFirst(["module_name like '{$module}' and lang_id={$lang_id}"]);
		}
		//$page=new UniversalPage();

		$this->id = $page->getId();
		$this->language = $lang_id;
		$this->has_permanent_url = $page->getHasPermanentUri();
		$this->url = $page->getUrl();
		$this->module_name = $page->getModuleName();
		if (($page_inst = $page->page) === false) {
			$page_inst = new Pages();
			$seo = new SEOInfo();
		} else {
			$seo = $page->page->seo;
		}
		$this->page_type = $page_inst->pagetype->id;
		$this->additional_title = $page_inst->getAdditionalTitle();
		$this->seo_title = $seo->getTitle();
		$this->seo_name = $seo->getName();
		$this->seo_desc = $seo->getDescription();
		$this->seo_before_route = $seo->getBeforeRoute();
		$this->seo_menu_title = $seo->getMenuTitle();

		return $this;

	}

	public function newPageForm()
	{

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
		if (!empty($this->id) && UniversalPage::count($this->id) > 0) {
			$log_message .= " Page  exists  \n";
			$edit = true;
		}
		if (!$edit) {
			$uni = new UniversalPage();
		} else {
			$uni = UniversalPage::findFirst($this->id);
		}
		$uni->setHasPermanentUri($this->has_permanent_url);
		$uni->setModuleName($this->module_name);
		$uni->setUrl($this->url);
		$uni->setLangId($this->language);

		if ($uni->save()) {
			$log_message .= "universal page saved\n";
			if ( !$edit ||  is_null($uni->getPageId())) {
				$page = new Pages();
			} else {
				$page = Pages::findFirst($uni->getPageId());
			}
			$page->setAdditionalTitle($this->additional_title);
			$page->setTypeId($this->page_type);

			if ($this->page_type === PageParser::STATIC_PAGE) {
				if ( !$edit || is_null($page->getContentId() )) {
					$content = new Content();
				} else {
					$content = Content::findFirst($page->getContentId());
				}
				$content->setContent($this->content);
				$content->setTitle($this->title);
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

			if (!$edit  || is_null($page->getSeoInfoId())) {
				$seo = new SEOInfo();
			} else {
				$seo = SEOInfo::findFirst($page->getSeoInfoId());
			}
			$seo->setBeforeRoute($this->seo_before_route);
			$seo->setDescription($this->seo_desc);
			$seo->setTitle($this->seo_title);
			$seo->setMenuTitle($this->seo_menu_title);
			$seo->setName($this->seo_name);
			if (!$seo->save()) {
				$this->throwWriteError($log_message);
			}
			if ( !$edit || is_null($page->getSeoInfoId())) {
				$page->setSeoInfoId($seo->getId());
			}

			$log_message .= "seo info saved \n";
			if ( !$page->save()) {
				$this->throwWriteError($log_message);
			}
			if ( !$edit || is_null($uni->getPageId())) {
				$uni->setPageId($page->getId());
				$seo->setToPage($page->getId());
				$log_message .= "seo info linked to page and page linked to unversal page \n";
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