<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:11
 */

namespace Schedule\Core\Models;


use Phalcon\Mvc\Model;

class ReviewsToCompany extends Model
{

    public function getSource()
    {
        return 'reviews_to_company';
    }
}