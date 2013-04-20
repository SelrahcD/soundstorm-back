<?php
class Auth_Controller extends Base_Controller {

	public $restful = true;

	public function get_step1()
	{
		$client = new Services_Soundcloud(
			Config::get('soundcloud.client_id'),
			Config::get('soundcloud.client_secret'),
			URL::to_action('auth@step2'));

		return Redirect::to($client->getAuthorizeUrl());
	}

	public function get_step2()
	{
		$client = new Services_Soundcloud(
			Config::get('soundcloud.client_id'),
			Config::get('soundcloud.client_secret'),
			URL::to_action('auth@step2'));

		$accessToken = $client->accessToken(Input::get('code'));

		// Si utilisateur existant
		// Sinon on créer un user
		$client->setAccessToken($accessToken['access_token']);

		$current_user = json_decode($client->get('me'));

		Auth::login(1);
	}

	public function get_logout()
	{
		Auth::logout();

		return Redirect::home();
	}
}