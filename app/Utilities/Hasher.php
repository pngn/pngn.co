<?php namespace PNGN\Utilities;

class Hasher {
	protected $hashLength = 3;

	public function make($string)
	{
		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		return substr(str_shuffle(str_repeat($pool, 5)), 0, $this->hashLength);
	}
}