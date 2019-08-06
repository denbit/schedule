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
		]
		);
		$module->setLabel("Назва модуля");
		$this->add($module);
		$lang = Languages::findFirst(['lang_code like "en"']);
		$language_disabled = $options->edit?'disabled':'';
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
		$lang_f->setLabel("Language of page")
				->setAttribute('disabled',$language_disabled);

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

		if ($page->has_permanent_url) {
			$chk = ['value' => 1, 'checked' => 'checked'];
		} else {
			$chk = ['value' => 1];
		}

		$radio = new Radio('has_permanent_url', $chk);
		$radio->setUserOption("group", 'true');
		$radio->setLabel("Yes");
		$this->add($radio);
		if (!$page->has_permanent_url) {
			$chk = ['name' => 'has_permanent_url', 'value' => 0, 'checked' => 'checked'];
		} else {
			$chk = ['name' => 'has_permanent_url', 'value' => 0];
		}
		$radio1 = new Radio('permanent_url1', $chk);
		$radio1->setLabel("No");
		$radio->setUserOption('h3', 'Has permanent URL:');
		$radio1->setUserOption("group", 'true');
		$this->add($radio1);
		$seo_title = new Text('seo_title', ["class" => 'form-control']);
		$seo_title->setLabel(" Title for SEO:");

		$seo_name = new Text('seo_name', ["class" => 'form-control']);
		$seo_desc = new Text('seo_desc', ["class" => 'form-control']);
		$seo_before_route = new Text('seo_before_route', ["class" => 'form-control']);
		$seo_menu_title = new Text('seo_menu_title', ["class" => 'form-control']);
		$this->add($seo_title);
		$this->add($seo_name);
		$this->add($seo_desc);
		$this->add($seo_desc);
		$this->add($seo_before_route);
		$this->add($seo_menu_title);


	}
}