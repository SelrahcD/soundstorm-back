<?php

class TrackRepository {

	public function make($data = array())
	{
		$track = new Track;
		$track->fill($data);
		return $track;
	}
	
	public function getById($trackId)
	{
		return Track::find($trackId);
	}
}