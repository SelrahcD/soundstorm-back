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

	public function createUser($soundcloudUser, $tokenData)
	{
		$user = new User;
		$user->username = $soundcloudUser->username;
		$user->soundcloud_id = $soundcloudUser->id;

		$user->setTokenData($tokenData);

		$user->save();

		return $user;
	}
}