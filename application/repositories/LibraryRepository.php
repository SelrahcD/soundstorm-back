<?php

class LibraryRepository {

	public function make($data)
	{
		if(is_object($data))
		{
			$data = get_object_vars($data);
		}

		$library = new Library;
		$library->user_id = Auth::user()->id;

		return $library;
	}

	public function fill(Track $track, $data)
	{
		if(is_object($data))
		{
			$data = get_object_vars($data);
		}

		$track->fill($data);

		return $data;
	}
	
	public function getById($libraryId)
	{
		return Library::find($libraryId);
	}

	public function store(Library $library)
	{
		return $library->save();
	}

	public function delete(Library $library)
	{
		return $library->delete();
	}
}