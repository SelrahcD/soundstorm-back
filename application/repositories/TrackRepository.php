<?php

class TrackRepository {

	public function make($data)
	{
		if(is_object($data))
		{
			$data = get_object_vars($data);
		}
		
		$track = new Track;
		$track->fill($data);
		return $track;
	}
	
	public function getById($trackId)
	{
		return Track::find($trackId);
	}
}