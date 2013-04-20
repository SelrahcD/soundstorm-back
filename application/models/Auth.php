<?php

class Auth {

	public static function driver()
	{
		return new AuthManager;
	}
	
	public static function __callStatic($method, $parameters)
	{
		return call_user_func_array(array(static::driver(), $method), $parameters);
	}
}