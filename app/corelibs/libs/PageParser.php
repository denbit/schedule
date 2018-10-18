<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 17:39
 */

namespace Schedule\Core;



use Schedule\Core\Models\Pages;
use Schedule\Core\Models\SEOInfo;
use Schedule\Core\Models\UniversalPage;

class PageParser extends Kernel
{
    public $id;
    public $module_name;
    public $url;
    public $page_type;
    public $has_permanent_url;
    public $seo_data;
    public $additional_title;
    public $content;
    public $seo_name;
    public $seo_title;
    public $seo_desc;
    public $seo_before_route;
    public $seo_menu_title;
    public $language;
    public function getPage($lang,$url='',$module='',$uni_page_id=null){

        $lang_id=$this->getLanguageId($lang);
        if(!empty($url))
            $page=UniversalPage::findFirst(["url like '{$url}' and lang_id={$lang_id}"]);
        if(!empty($module))
            $page=UniversalPage::findFirst(["module_name like '{$module}' and lang_id={$lang_id}"]);
       // $page=new UniversalPage();
        $this->id=$page->getId();
        $this->language=$lang_id;
        $this->has_permanent_url=$page->getHasPermanentUri();
        $this->url=$page->getUrl();
        $this->module_name=$page->getModuleName();
        if(($page_inst=$page->page)===false){
            $page_inst=new Pages();
            $seo=new SEOInfo();
        }else{
            $seo=$page->page->seo;
        }
        $this->page_type=$page_inst->pagetype->id;
        $this->additional_title=$page_inst->getAdditionalTitle();
        $this->seo_title=$seo->getTitle();
        $this->seo_name=$seo->getName();
        $this->seo_desc=$seo->getDescription();
        $this->seo_before_route=$seo->getBeforeRoute();
        $this->seo_menu_title=$seo->getMenuTitle();
        return $this;

    }

    public function newPageForm()
    {

    }

    public function savePage()
    {

    }


}