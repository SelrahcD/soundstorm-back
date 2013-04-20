<?php

class AuthManager {

	protected $userId;

	protected $user;

	public function __construct()
	{
		if (Session::started())
		{
			$this->userId = Session::get($this->token());
		}
	}

	public function user()
	{
		var_dump($this->userId);
		// if ( ! is_null($this->user)) return $this->user;

		// return $this->user = $this->retrieve($this->token);
	}
	
	public function login($userId)
	{
		Session::put($this->token(), $userId);
	}

	public function logout()
	{
		$this->user = null;

		Session::forget($this->token());

		$this->userId = null;
	}

	public function guest()
	{
		return ! $this->check();
	}

	public function check()
	{
		return ! is_null($this->user());
	}

	protected function token()
	{
		return $this->name().'_login';
	}

	protected function name()
	{
		return strtolower(str_replace('\\', '_', get_class($this)));
	}

}