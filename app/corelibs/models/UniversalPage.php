<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:11
 */

namespace Schedule\Core\Models;


use Phalcon\Mvc\Model;

class UniversalPage extends Model
{


    private $url;
    private $module_name;
    private $has_permanent_uri;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getModuleName()
    {
        return $this->module_name;
    }

    /**
     * @param mixed $module_name
     */
    public function setModuleName($module_name): void
    {
        $this->module_name = $module_name;
    }

    /**
     * @return mixed
     */
    public function getHasPermanentUri()
    {
        return $this->has_permanent_uri;
    }

    /**
     * @param mixed $has_permanent_uri
     */
    public function setHasPermanentUri($has_permanent_uri): void
    {
        $this->has_permanent_uri = $has_permanent_uri;
    }

    public function initialize()
    {
        $this->hasOne('page_id',Pages::class,'id',['alias'=>'page']);
    }

    public function getSource()
    {
        return 'uni_page';
    }
}