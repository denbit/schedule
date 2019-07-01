<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 6/27/2019
 * Time: 11:07 PM
 */

namespace Schedule\Modules\Authority\Models;


class Route
{
	public $id;
	/**
	 * @var int
	 */
	private $start_st;
	/**
	 * @var int
	 */
	private $end_st;
	/**
	 * @var int
	 */
	private $made_by;
	/**
	 * @var array
	 */
	private $path;
	/**
	 * @var string
	 */
	private $regularity;

	public function set_transit()
	{
		//$transit_data=[
//			['from'=>1,'to'=>4,'arrival'=>'00:00:00','departure'=>'00:20:00'],
//			['from'=>4,'to'=>2,'arrival'=>'01:00:00','departure'=>'01:05:00'],
//			['from'=>2,'to'=>3,'arrival'=>'03:00:00','departure'=>'00:00:00']
//		];
	}


}