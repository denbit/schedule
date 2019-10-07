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
	public function initialize(PageParser $page, $options)
	{
		$this->setEntity($page);
		$url = new Text('url', ["class" => 'form-control']);
		$url->addFilter('string');
		$url->setLabel("URL:");
		$this->add($url);
		$id = (new Hidden('id'))->setLabel(' ');
		$id->setUserOption('no_style', 1);
		$this->add($id);
		$page_type = new Select(
			'page_type', PagesTypes::find(), [
			"using" => [
				"id",
				"type_name",
			],
			"useEmpty" => true,
			"emptyText" => "select type",
			"emptyValue" => "",
			"class" => 'form-control',
		]
		);
		$page_type->setLabel("Тип сторінки:");
		$module = new Select(
			'module_name', $options->modules, [
				"emptyText" => "Оберіть назву модуля",
				"useEmpty" => true,
				"emptyValue" => "",
				"class" => 'form-control',
				"required"=>"required"
		]
		);
		$module->setLabel("Назва модуля");
		$this->add($module);
		$lang = Languages::findFirst(['lang_code like "en"']);
		$lang_f = new Select(
			'language', $lang->allangs, [
			'using' => [
				"to_lang",
				"description",
			],
			"useEmpty" => true,
			"emptyText" => "оберіть мову",
			"emptyValue" => "",
			"class" => "form-control",
		]		);
		$lang_f->setLabel("Language of page");
		if ($options->edit) {
			$lang_f->setAttribute('readonly', 'readonly');
		}

		$this->add($lang_f);
		$this->add($page_type);
		if ($page->page_type == PageParser::DYNAMIC_PAGE) {
			$attrs = ["class" => 'form-control', 'disabled' => 'disabled'];
		} else {
			$attrs = ["class" => 'form-control'];
		}
		$additional_title = new Text('additional_title', ["class" => 'form-control']);
		$additional_title->setLabel("Заголовок сторінки");
		$this->add($additional_title);

		$title = new Text('title', $attrs);
		$title->setLabel("Заголовок контенту ");
		$this->add($title);
		$content = new TextArea('content', $attrs);
		$content->setLabel("Content:");
		$this->add($content);


		$chk = ['value' =>1];
		$unchk = ['name' => 'has_permanent_url','value' =>0 ];
		if ($page->has_permanent_url) {
			$chk  ['checked'] = 'checked';
		} else {
			$unchk  ['checked'] = 'checked';
		}

		$fixed_uri_check = new Radio('has_permanent_url', $chk);
		$fixed_uri_check->setUserOptions(["group"=> 'true', 'h3'=>'Чи має фіксований URI:'])
			->setLabel("Так");

		$fixed_uri_uncheck = new Radio('permanent_url1', $unchk);
		$fixed_uri_uncheck->setUserOption("group", 'true')
			->setLabel("Ні");
		$this->add($fixed_uri_check)->add($fixed_uri_uncheck);

		$seo_title = new Text('seo_title', ["class" => 'form-control']);
		$seo_title->setLabel("Meta title для SEO:");
		$seo_desc = new Text('seo_desc', ["class" => 'form-control']);
		$seo_desc->setLabel("Meta description для SEO:");

		$seo_name = new Text('seo_name', ["class" => 'form-control']);
		$seo_name->setLabel("Заголовок документу");
		$seo_before_route = new Text('seo_before_route', ["class" => 'form-control']);
		$seo_before_route->setLabel("Контент після шапки:");
		$seo_menu_title = new Text('seo_menu_title', ["class" => 'form-control']);
		$seo_menu_title->setLabel("Назва в пунках меню та хлібних крошках");

		$this->add($seo_title)->add($seo_name)
			->add($seo_desc)->add($seo_desc)
			->add($seo_before_route)->add($seo_menu_title);


	}
}