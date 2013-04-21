<?php

class Library extends Aware {
	
	public static $table = 'libraries';

	public function tracks()
	{
		return $this->has_many('Track');
	}

	public function addTrack(Track $track)
	{
		$this->tracks()->insert($track);
	}

}