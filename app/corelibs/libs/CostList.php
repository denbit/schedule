<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 03.10.2018
 * Time: 16:11
 */

namespace Schedule\Core;


class CostList extends Kernel
{


    /**
     * @param $transit_data
     * @param $cost_data
     * @return bool
     */
    private function writeCost($cost_data):Cost
    {
        $cost=new Cost();
        //magic
        return $cost;
    }

    public static function addCostToRoute($data)
    {
        $new= new self();
        return $new->writeCost($data);
    }

}