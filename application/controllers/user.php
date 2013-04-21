<?php

class User_Controller extends Base_Controller {
	
	public $restful = true;

	private $soundcloudService;

	public function __construct()
	{
		$this->soundcloudService = Ioc::resolve('soundcloudService');

		parent::__construct();
	}

	public function get_songs()
	{
		$token = Auth::user()->getSoundcloudToken();

		$this->soundcloudService->setAccessToken($token);

		$tracks = $this->soundcloudService->get('me/tracks');

		return $tracks;
	}
}