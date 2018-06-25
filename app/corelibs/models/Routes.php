<?php
/**
 * Created by IntelliJ IDEA.
 * User: DenysBarsuk
 * Date: 11.06.2018
 * Time: 11:11
 */

namespace Schedule\Core\Models;


use Phalcon\Mvc\Model;

class Routes extends Model
{

    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
	private $start_station;
    /**
     * @var int
     */
	private $end_station;
    /**
     * @var string
     */
	private $transit_path;
    /**
     * @var int
     */
	private $made_by;
    /**
     * @var string
     */
	private $regularity;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getStartStation()
    {
        return $this->start_station;
    }

    /**
     * @param int $start_station
     */
    public function setStartStation($start_station)
    {
        $this->start_station = $start_station;
    }

    /**
     * @return int
     */
    public function getEndStation()
    {
        return $this->end_station;
    }

    /**
     * @param int $end_station
     */
    public function setEndStation($end_station)
    {
        $this->end_station = $end_station;
    }

    /**
     * @return string
     */
    public function getTransitPath()
    {
        return $this->transit_path;
    }

    /**
     * @param string $transit_path
     */
    public function setTransitPath($transit_path)
    {
        $this->transit_path = $transit_path;
    }

    /**
     * @return int
     */
    public function getMadeBy()
    {
        return $this->made_by;
    }

    /**
     * @param int $made_by
     */
    public function setMadeBy($made_by)
    {
        $this->made_by = $made_by;
    }

    /**
     * @return string
     */
    public function getRegularity()
    {
        return $this->regularity;
    }

    /**
     * @param string $regularity
     */
    public function setRegularity($regularity)
    {
        $this->regularity = $regularity;
    }


    public function initialize()
    {
        $this->hasOne('start_station',Stations::class,'id',['alias'=>'startStation']);
        $this->hasOne('end_station',Stations::class,'id',['alias'=>'endStation']);
        $this->hasOne('made_by',Company::class,'id',['alias'=>'madeBy']);
    }
    public function getSource()
    {
        return 'routes';
    }
}