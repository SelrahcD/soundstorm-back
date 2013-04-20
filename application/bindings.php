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