<?php


namespace Schedule\Core\Components;


trait NotFound
{
	public function error404Action()
	{
		echo(404);
		exit();
	}
}