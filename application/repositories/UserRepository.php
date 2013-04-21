<?php

class UserRepository {

	public function getUserById($userId)
	{
		return User::find($userId);
	}
	
	public function getUserBySoundcloudId($soundcloudId)
	{
		return User::where('soundcloud_id', '=', $soundcloudId)->first();
	}

	public function createUser($soundcloudUser, $accessToken)
	{
		$user = new User;
		$user->username = $soundcloudUser->username;
		$user->soundcloud_id = $soundcloudUser->id;
		$user->soundcloud_token = $accessToken['access_token'];
		$user->soundcloud_refresh = $accessToken['refresh_token'];
		$user->soundcloud_expiration = time() + $accessToken['expires_in'];
		$user->save();

		return $user;
	}
}