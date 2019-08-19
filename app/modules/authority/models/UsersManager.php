<?php
/**
 * Created by IntelliJ IDEA.
 * User: r_a
 * Date: 8/17/2019
 * Time: 11:18 PM
 */

namespace Schedule\Modules\Authority\Models;


use Schedule\Core\{Models\Users,Kernel};
use Schedule\Modules\Authority\Forms\UserForm;
class UsersManager extends Kernel
{
	public function getList($index=5)
	{
		Users::setCachable(false);
		$users=Users::find([
			'limit'=>$index
		]);
		Users::setCachable(true);
		return $users;
	}

	public static function getUserForm( Users $i = null, bool $edit = false)
	{
		$options=new \stdClass();
		$options->edit = $edit;

		return new UserForm($i, $options);

	}

	public static function getUserForSelect()
	{
		$users=Users::find(['columns'=>'id,login,name']);
		return $users->toArray();
	}
}