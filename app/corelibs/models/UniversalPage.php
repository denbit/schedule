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

    private $id;
    private $url;
    private $module_name;
    private $has_permanent_uri;
    private $lang_id;
    private $page_id;
    private $available;
    /**
     * @return mixed
     */
    public function getLangId()
    {
        return $this->lang_id;
    }

    /**
     * @param mixed $lang_id
     */
    public function setLangId($lang_id): void
    {
        $this->lang_id = $lang_id;
    }

    /**
     * @return mixed
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * @param mixed $page_id
     */
    public function setPageId($page_id): void
    {
        $this->page_id = $page_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


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

    public static function getAllPages()
    {
        $uni=UniversalPage::find([
            'columns'=>'url,module_name, group_concat(lang_id) as lang_id ',
            'group'=>'module_name'
        ]);
       // return $uni;
        $all=Languages::find()->toArray();
        $lang_codes=[];
        foreach ($all as $lang){
           $lang_codes[$lang['lang_id']]=$lang['lang_code'];
            }

        $availables=[];
        for($i=0;$i<count($uni);$i++){
            $langs=explode(',',$uni[$i]->lang_id);
            $temp=[];

            foreach ($langs as $avail){
                $temp[$avail] = $lang_codes[$avail];
            }

            $availables[$i]=$uni[$i]->toArray();
            $availables[$i]['available_langs']=$temp;
            unset($temp, $availables[$i]['lang_id']);

        }

        return $availables;


    }
    public function initialize()
    {
        $this->hasOne('page_id',Pages::class,'id',['alias'=>'page']);
      //  $this->hasMany('lang_id')
    }

    public function getSource()
    {
        return 'uni_page';
    }
}