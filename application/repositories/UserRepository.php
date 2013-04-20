<?php

class UserRepository {
	
	public function getUserBySoundcloudId($soundcloudId)
	{
		return User::where('soundcloud_id', '=', $soundcloudId)->first();
	}

	public function createUser($soundcloudUser)
	{
		$user = new User;
		$user->username = $soundcloudUser->username;
		$user->soundcloud_id = $soundcloudUser->id;
		$user->save();

		return $user;
	}
}