<?php

class User extends Eloquent {

	public function setTokenData($data = array())
	{
		$this->soundcloud_token      = $data['access_token'];
		$this->soundcloud_refresh    = $data['refresh_token'];
		$this->soundcloud_expiration = time() + $data['expires_in'];
	}

	public function getSoundcloudToken()
	{
		if($this->soundcloud_expiration < time())
		{
			$this->renewToken();
		}

		return $this->soundcloud_token;
	}

	protected function renewToken()
	{
		$soundcloudService = Ioc::resolve('soundcloudService');

		$soundcloudService->setAccessToken($this->soundcloud_token);

		$accessData = $soundcloudService->accessTokenRefresh($this->soundcloud_refresh);
		
		$this->setTokenData($accessData);

		$this->save();
	}
	
}