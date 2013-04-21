<?php

class Auth_Controller extends Base_Controller {

	private $client;

	public $restful = true;

	public function __construct()
	{
		$this->client = Ioc::resolve('soundcloudService');

		parent::__construct();
	}

	public function get_login()
	{
		return View::make('auth.login')
		->with('soundcloud_login_url', $this->client->getAuthorizeUrl());
	}

	public function get_souncloud()
	{
		return Redirect::to($this->client->getAuthorizeUrl());
	}

	public function get_callback()
	{

		$accessToken = $this->client->accessToken(Input::get('code'));

		$this->client->setAccessToken($accessToken['access_token']);

		$soundcloudUser = json_decode($this->client->get('me'));

		$userRepository = IoC::resolve('userRepository');

		if(!($user = $userRepository->getUserBySoundcloudId($soundcloudUser->id)))
		{
			$user = $userRepository->createUser($soundcloudUser);
		}

		Auth::login($user->id);

		return Redirect::home();
	}

	public function get_logout()
	{
		Auth::logout();

		return Redirect::home();
	}
}