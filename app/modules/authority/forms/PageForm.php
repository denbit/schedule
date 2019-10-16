<?php

namespace Schedule\Modules\Authority\Forms;

use Phalcon\Forms\Element;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Radio;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Exception;
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
		$lang = Languages::findFirst(['lang_code like "uk"']);
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
		$lang_f->setLabel("Мова стоірнки");
		if ($options->edit) {
			$lang_f->setAttribute('disabled', 'disabled');
		}

		$this->add($lang_f);
		$this->add($page_type);
		if ($page->page_type == PageParser::DYNAMIC_PAGE) {
			$attrs = ["class" => 'form-control', 'disabled' => 'disabled'];
		} else {
			$attrs = ["class" => 'form-control'];
		}
		$document_title = new Text('document_title', ["class" => 'form-control']);
		$document_title->setLabel("Заголовок документу");
		$additional_content = new Text('additional_content', ["class" => 'form-control']);
		$additional_content->setLabel("Вміст сторінк додатковий - Відображається навіть якщо не існує статичної сторінки");
		$this->add($document_title)->add($additional_content);
		$content =$this->getWYSWIGField('content', $attrs);
		$content->setLabel("Статичний контент:");
		$this->add($content);

		$fixed_uri_check = new RadioGroup('has_permanent_url', [
			"1"=>"Так",
			"0"=>'Ні'
		],[
			'input'=>[
				"class" => 'form-check-input',
				],
			'div'=> [
				'class' => 'form-check form-check-inline'
			],
			'label'=>[
				'class'=>'form-check-label'
			]
		]);
		$fixed_uri_check->setLabel('Чи має фіксований URI:');
		$this->add($fixed_uri_check);

		$seo_title = new Text('seo_title', ["class" => 'form-control']);
		$seo_title->setLabel("H1 заголовок для SEO:");
		$seo_desc = new Text('seo_desc', ["class" => 'form-control']);
		$seo_desc->setLabel("Meta description для SEO:");
		$keywords = new Text('keywords', ["class" => 'form-control']);
		$keywords->setLabel("Ключові слова ");
		$this->add($keywords);
		$seo_before_route = $this->getWYSWIGField('seo_before_route', ["class" => 'form-control']);
		$seo_before_route->setLabel("Контент після шапки:")->setUserOption('needsEditor',true);
		$seo_menu_title = new Text('seo_menu_title', ["class" => 'form-control']);
		$seo_menu_title->setLabel("Назва в пунках меню та хлібних крошках");

		$this->add($seo_title)
			->add($seo_desc)->add($seo_desc)
			->add($seo_before_route)->add($seo_menu_title);


	}

	private function getWYSWIGField(...$args)
	{
		return new class(...$args) extends Element{
			private $hidden;
			public function __construct($name, $attributes = null)
			{
				$js = "fields.push('{$name}');\nvar {$name} = new Quill('.controls.{$name} .toolbar', options);";
				$this->setUserOption('jsInclude', $js);
				parent::__construct($name, $attributes);
				$this->hidden = new Hidden($this->_name , $this->_attributes);
			}
			 /**
			  * Renders the element widget
			  *
			  * @param array $attributes
			  * @return string
			  */
			 public function render($attributes = null)
			 {
				$attributes =  $this->getAttributes();
				$this->hidden->setForm($this->getForm());
				$rendered = "<div class=\"toolbar\"></div>" . $this->hidden->render($attributes);
				return $rendered;

			 }

		 };
	}
}