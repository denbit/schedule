<?php
namespace Schedule\Modules\Authority\Forms;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Form;

use Schedule\Core\Models\Languages;
use Schedule\Core\Models\PagesTypes;
use Schedule\Core\PageParser;

class PageForm extends Form
{
    public function initialize(PageParser $page,$options)
    {
        $this->setEntity($page);
        $url=new Text('url',["class"=>'form-control']);
        $url->addFilter('string');
        $url->setLabel("URL:");
        $this->add($url);
        $id=(new Hidden('id'))->setLabel(' ');
        $id->setUserOption('no_style',1);
        $this->add($id);
        $page_type=new Select('page_type',PagesTypes::find(),[
            "using" => [
                "id",
                "type_name",
            ],
            "useEmpty" => true,
            "emptyText" => "select type",
            "emptyValue" => "",
        "class"=>'form-control'
        ]);
        $page_type->setLabel("Type of page:");
        $module=new Text('module_name',["class"=>'form-control']);
        $module->setLabel("Module name");
        $this->add($module);
        $lang=Languages::findFirst(['lang_code like "en"']);
        $lang_f=new Select('language',$lang->allangs,[
            'using'=>[
                "to_lang",
                "description"
            ],
            "useEmpty"=>true,
            "emptyText" => "select language of page",
            "emptyValue" => "",
            "class"=>'form-control']);
        $lang_f->setLabel("Language of page");
        $this->add($lang_f);
        $this->add($page_type);
        $title=new Text('title',["class"=>'form-control']);
        $title->setLabel("Title of page");
        $this->add($title);
        $additional_title=new Text('additional_title',["class"=>'form-control']);
        $additional_title->setLabel("Additional title");
        $this->add($additional_title);
        $radio=new Radio('has_permanent_url',['value'=>0]);
        $radio->setUserOption("group",'true');
        $radio->setLabel("No");
        $this->add($radio);
        $radio1=new Radio('permanent_url1',['name'=>'has_permanent_url','value'=>1]);
        $radio1->setLabel("Yes");
        $radio->setUserOption('h3','Has permanent URL:');
        $radio1->setUserOption("group",'true');
        $this->add($radio1);
        $seo_title=new Text('seo_title',["class"=>'form-control']);
        $seo_title->setLabel(" Title for SEO:");
        $content=new TextArea('content',["class"=>'form-control']);
        $content->setLabel("Content:");
        $this->add($content);
        $seo_name=new Text('seo_name',["class"=>'form-control']);
        $seo_desc=new Text('seo_desc',["class"=>'form-control']);
        $seo_before_route=new Text('seo_before_route',["class"=>'form-control']);
        $seo_menu_title=new Text('seo_menu_title',["class"=>'form-control']);
        $this->add($seo_title);
        $this->add($seo_name);
        $this->add($seo_desc);
        $this->add($seo_desc);
        $this->add($seo_before_route);
        $this->add($seo_menu_title);



}
}