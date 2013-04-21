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

	public function get_index($libraryId)
	{
		if(!($library = $this->libraryRepository->getById($libraryId)))
		{
			return Response::error('404');
		}

		$tracks = $library->tracks;
		$tracksArray = array();
		foreach($tracks as $track)
		{
			$tracksArray[] = $track->to_array();
		}

		return Response::json($tracksArray);
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

		$library->addTrack($track);

		return Response::json($track->to_array());
	}

	public function put_update($trackId)
	{
		if(!($track = $this->trackRepository->getById($trackId)))
		{
			return Response::error('404');
		}

		$this->trackRepository->fill($track, Input::json());

		if(!$track->valid())
		{
			return Response::json(array(
				'error' => $track->errors));
		}

		$this->trackRepository->store($track);

		return Response::json($track->to_array());
	}
}