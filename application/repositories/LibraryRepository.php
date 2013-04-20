<?php

class LibraryRepository {

	public function make($data = array())
	{
		$library = new Library;
		$library->user_id = Auth::user()->id;

		return $library;
	}
	
	public function getById($libraryId)
	{
		return Library::find($libraryId);
	}

	public function store(Library $library)
	{
		return $library->save();
	}
}