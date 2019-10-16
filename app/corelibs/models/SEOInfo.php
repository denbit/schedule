<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:11
 */

namespace Schedule\Core\Models;


use Phalcon\Mvc\Model;

class SEOInfo extends Model
{
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
    public function getToPage()
    {
        return $this->to_page;
    }

    /**
     * @param mixed $to_page
     */
    public function setToPage($to_page): void
    {
        $this->to_page = $to_page;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords): void
    {
        $this->keywords = $keywords;
    }

    /**
     * @return mixed
     */
    public function getBeforeRoute()
    {
        return $this->before_route;
    }

    /**
     * @param mixed $before_route
     */
    public function setBeforeRoute($before_route): void
    {
        $this->before_route = $before_route;
    }

private $id;
private $to_page;
private $title;
private $description;
private $keywords;
private $before_route;
private  $menu_title;

    /**
     * @return mixed
     */
    public function getMenuTitle()
    {
        return $this->menu_title;
    }

    /**
     * @param mixed $menu_title
     */
    public function setMenuTitle($menu_title): void
    {
        $this->menu_title = $menu_title;
    }
public function initialize()
    {
        $this->hasOne('id',Pages::class,'seo_info_id',['alias'=>'page', 'reusable' => true]);
    }
    public function getSource()
    {
        return 'seo_info';
    }
}