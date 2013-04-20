<?php

class TrackRepository {
	
	public function getById($trackId)
	{
		return Track::find($trackId);
	}
}