<?php

class User_Task
{
	public function add($arguments)
	{
		if (count($arguments) != 2)
		{
			echo "Usage: php artisan user:add email@example.com password\n";
			exit;
		}
		$email = $arguments[0];
		$password = Hash::make($arguments[1]);
		$u = User::create( compact('email', 'password') );
		echo "Created user {$email}\n";
	}
}