<?php

namespace Schedule\Modules\Authority\Forms;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Form;

use Schedule\Core\Components\RadioGroup;
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
			"emptyText" => "Оберіть мову",
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
		$title->setLabel("Заголовок static контенту ");
		$this->add($title);
		$content = new TextArea('content', $attrs);
		$content->setLabel(" static Content:")->setUserOption('needsEditor',true);
		$this->add($content);

		$fixed_uri_check = new RadioGroup('has_permanent_url', [
			"1"=>"Tak",
			"0"=>'Ni'
		]);
		$fixed_uri_check->setLabel('Чи має фіксований URI:');
		$this->add($fixed_uri_check);
		$seo_title = new Text('seo_title', ["class" => 'form-control']);
		$seo_title->setLabel("Meta title для SEO:");
		$seo_desc = new Text('seo_desc', ["class" => 'form-control']);
		$seo_desc->setLabel("Meta description для SEO:");

		$document_title = new Text('title', ["class" => 'form-control']);
		$document_title->setLabel("Заголовок документу");
		$seo_before_route = new TextArea('seo_before_route', ["class" => 'form-control']);
		$seo_before_route->setLabel("Контент після шапки:")->setUserOption('needsEditor',true);
		$seo_menu_title = new Text('seo_menu_title', ["class" => 'form-control']);
		$seo_menu_title->setLabel("Назва в пунках меню та хлібних крошках");

		$this->add($seo_title)->add($document_title)
			->add($seo_desc)->add($seo_desc)
			->add($seo_before_route)->add($seo_menu_title);


	}
}