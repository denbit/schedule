<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:11
 */

namespace Schedule\Core\Models;


use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Alpha;
use Phalcon\Validation\Validator\PresenceOf;

class Pages  extends CachableModel
{

	private $id;
	private $type_id;
	private $content_id;
    private $seo_info_id;
    private $additional_content;
    private $document_title;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * @param mixed $type_id
     */
    public function setTypeId($type_id): void
    {
        $this->type_id = $type_id;
    }

    /**
     * @return mixed
     */
    public function getContentId()
    {
        return $this->content_id;
    }

    /**
     * @param mixed $content_id
     */
    public function setContentId($content_id): void
    {
        $this->content_id = $content_id;
    }

    /**
     * @return mixed
     */
    public function getSeoInfoId()
    {
        return $this->seo_info_id;
    }

    /**
     * @param mixed $seo_info_id
     */
    public function setSeoInfoId($seo_info_id): void
    {
        $this->seo_info_id = $seo_info_id;
    }

    /**
     * @return mixed
     */
    public function getAdditionalContent()
    {
        return $this->additional_content;
    }

	/**
	 * @return mixed
	 */
	public function getDocumentTitle()
	{
		return $this->document_title;
	}

	/**
	 * @param mixed $document_title
	 */
	public function setDocumentTitle($document_title): void
	{
		$this->document_title = $document_title;
	}

    /**
     * @param mixed $additianal_content
     */
    public function setAdditionalContent($additianal_content): void
    {
        $this->additional_content = $additianal_content;
    }

	public function validation()
	{
		$validator =new Validation();
		$validator->add(['type_id','seo_info_id'], new PresenceOf(
			['message'=>":field is required"]
		));
		$validator->add(['type_id','seo_info_id'],new Alpha(['message'=>[
			'lang_id'=>"Language code is nessecary ",
			'page_id' =>" :field is required"
		]]));
		//$this->validate($validator);

	}
    public function initialize()
    {
        $this->hasOne('id',SEOInfo::class,'to_page',['alias'=>'seo', 'reusable' => true]);
        $this->hasOne('type_id',PagesTypes::class,'id',['alias'=>'pagetype', 'reusable' => true]);

    }
    public function getSource()
    {
        return 'pages';
    }
}