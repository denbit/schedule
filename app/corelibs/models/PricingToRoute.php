<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:11
 */

namespace Schedule\Core\Models;


use Phalcon\Mvc\Model;

class PricingToRoute extends Model
{

    public function getSource()
    {
        return 'pricing_to_route';
    }
}