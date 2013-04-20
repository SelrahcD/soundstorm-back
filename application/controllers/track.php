<?php

class Track_Controller extends Base_Controller {
	
	public $restful = true;

	private $trackRepository;

	private $libraryRepository;

	public function __construct()
	{
		$this->trackRepository = Ioc::resolve('trackRepository');

		$this->libraryRepository = Ioc::resolve('libraryRepository');
	}

	public function post_create($libraryId)
	{
		if(!($library = $this->libraryRepository->getById($libraryId)))
		{
			return Response::error('404');
		}

		$track = $this->trackRepository->make(Input::json());

		if(!$track->valid())
		{
			return Response::json(array(
				'error' => $track->errors));
		}

		// $library->addTrack($track);

		return Response::json($track->to_array());
	}
}