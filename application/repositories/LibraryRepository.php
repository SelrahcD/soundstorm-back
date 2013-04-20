<?php

class LibraryRepository {
	
	public function getById($libraryId)
	{
		return Library::find($libraryId);
	}
}