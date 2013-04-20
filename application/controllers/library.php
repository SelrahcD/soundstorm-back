<?php

class Library_Controller extends Base_Controller {

	public $restful = true;

	private $libraryRepository;

	public function __construct()
	{
		$this->libraryRepository = Ioc::resolve('libraryRepository');
	}

	public function get_show($libraryId)
	{
		if(!($library = $this->libraryRepository->getById($libraryId)))
		{
			return Response::error('404');
		}

		return Response::json($library->to_array());
	}

	public function post_create()
	{
		$library = $this->libraryRepository->make(Input::json());

		if(!$library->valid())
		{
			return Response::json(array(
				'error' => $library->errors));
		}

		$this->libraryRepository->store($library);

		return Response::json($library->to_array());
	}

	public function put_update($libraryId)
	{
		if(!($library = $this->libraryRepository->getById($libraryId)))
		{
			return Response::error('404');
		}

		$library->fill(Input::json());

		if(!$library->valid())
		{
			return Response::json(array(
				'error' => $library->errors));
		}

		$this->libraryRepository->store($library);

		return Response::json($library->to_array());
	}
	
}