<?php namespace PNGN\Repositories;
use PNGN\Link;
use PNGN\Contracts\LinkRepository;

class DbLinkRepository implements LinkRepository {

	public function __construct(Link $link)
	{
		$this->link = $link;
	}

	public function byHash($hash)
	{
		return $this->link->whereId(intval($hash, 36));
	}

	public function byUrl($url)
	{
		return $this->link->whereUrl($url)->first();
	}

	public function getShortenedUrl($hash)
	{
		return route('link', ['hash' => $hash]);
	}

	public function create(array $data)
	{
		return $this->link->create($data);
	}

}