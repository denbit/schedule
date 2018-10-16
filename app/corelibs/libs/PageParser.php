<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 17:39
 */

namespace Schedule\Core;



use Schedule\Core\Models\UniversalPage;

class PageParser extends Kernel
{


    public function getPage($url,$lang,$uni_page_id=null){
         $page_data=[];
        $lang_id=$this->getLanguageId($lang);
        $page=UniversalPage::findFirst(["url like '{$url}' and lang_id={$lang_id}"]);
       // $page=new UniversalPage();
        if(true==($page_data['permanent']=$page->getHasPermanentUri())){
         $page_data['url']=$page->getUrl();
        }else{
            $page_data['url_pattern']=$page->getUrl();
        }
        $page_data['module_name']=$page->getModuleName();
        $page_inst=$page->page;
        $page_data['page_type']=$page_inst->pagetype->type_name;
        $page_data['additional_content']=$page_inst->getAdditianalContent();
        $seo=$page->page->seo;
        $page_data['seo']=[
            'title'=>$seo->getTitle(),
            'name'=>$seo->getName(),
            'desc'=>$seo->getDescription(),
            'before_route'=>$seo->getBeforeRoute(),
            'menu_title'=>$seo->getMenuTitle()
        ];


        return $page_data;
       var_dump($page_data);

    }


}