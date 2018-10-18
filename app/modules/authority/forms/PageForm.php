<?php
namespace Schedule\Modules\Authority\Forms;

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
        $url=new Text('url');
        $url->addFilter('string');
        $url->setLabel("URL:");

        $this->add($url);
        $page_type=new Select('page_type',PagesTypes::find(),[
            "using" => [
                "id",
                "type_name",
            ],
            "useEmpty" => true,
            "emptyText" => "select type",
            "emptyValue" => "",
        ]);
        $lang=Languages::findFirst(['lang_code like "en"']);
        $lang_f=new Select('language',$lang->allangs,[
            'using'=>[
                "to_lang",
                "description"
            ],
            "useEmpty"=>true]);
        $this->add($lang_f);
        $this->add($page_type);
        $title=new Text('title');
        $this->add($title);
        $radio=new Radio('has_permanent_url',['value'=>0]);
        $this->add($radio);
        $radio1=new Radio('permanent_url1',['name'=>'has_permanent_url','value'=>1]);
        $this->add($radio1);
        $seo_title=new Text('seo_title');
        $content=new TextArea('content');
        $this->add($content);
        $seo_name=new Text('seo_name');
        $seo_desc=new Text('seo_desc');
        $seo_before_route=new Text('seo_before_route');
        $seo_menu_title=new Text('seo_menu_title');
        $this->add($seo_title);
        $this->add($seo_name);
        $this->add($seo_desc);
        $this->add($seo_desc);
        $this->add($seo_before_route);
        $this->add($seo_menu_title);



}
}