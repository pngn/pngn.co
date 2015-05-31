<?php namespace PNGN\Contracts;

interface LinkRepository {

	public function byHash($hash);
	public function byUrl($url);
	public function create(array $data);

}