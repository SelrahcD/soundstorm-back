<?php
class Auth_Controller extends Base_Controller {

	private $client;

	public $restful = true;

	public function __construct()
	{
		$this->client = new Services_Soundcloud(
			Config::get('soundcloud.client_id'),
			Config::get('soundcloud.client_secret'),
			URL::to_action('auth@callback'));

		parent::__construct();
	}

	public function get_login()
	{
		return Redirect::to($this->client->getAuthorizeUrl());
	}

	public function get_callback()
	{

		$accessToken = $this->client->accessToken(Input::get('code'));

		$this->client->setAccessToken($accessToken['access_token']);

		$soundcloudUser = json_decode($this->client->get('me'));

		$userRepository = new UserRepository;

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