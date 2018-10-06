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

    private $from_station_id;
    private $to_station_id;
    private $price;
    private $currency;
    private $to_route;

    /**
     * @param mixed $from_station_id
     */
    public function setFromStationId($from_station_id): void
    {
        $this->from_station_id = $from_station_id;
    }

    /**
     * @param mixed $to_station_id
     */
    public function setToStationId($to_station_id): void
    {
        $this->to_station_id = $to_station_id;
    }

    /**
     * @param mixed $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @param mixed $to_route
     */
    public function setToRoute($to_route): void
    {
        $this->to_route = $to_route;
    }




    public function getSource()
    {
        return 'pricing_to_route';
    }
}