<?php

IoC::singleton('userRepository', function()
{
    return new UserRepository;
});

Ioc::singleton('libraryRepository', function()
{
	return new LibraryRepository;
});

Ioc::singleton('trackRepository', function()
{
	return new TrackRepository;
});

Ioc::singleton('soundcloudService', function()
{
	return new Services_Soundcloud(
			Config::get('soundcloud.client_id'),
			Config::get('soundcloud.client_secret'),
			URL::to_action('auth@callback'));
});