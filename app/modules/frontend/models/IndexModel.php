<?php
namespace Schedule\Modules\Frontend\Models;

use Fabiang\Xmpp\Client;
use Phalcon\Mvc\Model;
use Schedule\Core\Location;
use Schedule\Core\PageParser;
use Fabiang\Xmpp\Options;
class IndexModel extends Model implements IModel
{
    public function getDataForHTTP($input)
    {
        $pageParser=new PageParser();
        $page = $pageParser->getPage($input['lang'],$input['url']);
        if(!$page->title && !empty($page->seo_title)){
        	$page->title=$page->seo_title;
		}
        $page->language = PageParser::getLanguageById($page->language);

		return $page;


    }

    public function chatInit()
    {
        $opt = new Options();

        $chat_opt = $this->getDI()['config']->get('chat');
        $opt->setAddress($chat_opt->host)->setUsername($chat_opt->username)->setPassword($chat_opt->password);
        //$opt->setLogger();
        $cl = new Client($opt);
        $cl->connect();

        var_dump($opt);
        die;
    }

    public function getDataForAjax($input)
    {
        // TODO: Implement getDataForAjax() method.
    }


	public function searchSuggestions($suggestion)
	{$result= [];
		  $results = Location::findAllVariants($suggestion);
			$keys = array_keys($results);
//var_dump($keys);var_dump($results);
		foreach ($keys as $key) {
			switch ($key){
				case 'city':
					foreach ($results[$key] as $item){

					$result[] =	[
						'value' =>$key.$item->id,
						'label' =>$item->national_name
						];
					}
					break;
			}
}

		return $result;
    }

}