<?php namespace PNGN\Services;

use PNGN\Contracts\Shortener;
use PNGN\Contracts\LinkRepository;
use PNGN\Events\LinkShortenRequest;
use PNGN\Events\LinkWasShortened;
use PNGN\Http\Requests\StoreLinkRequest;
use PNGN\Utilities\Hasher;
use PNGN\Exceptions\SelfShortenException;

class SimpleShortener implements Shortener {

	private $LinkRepo;
	private $hasher;

	public function __construct(LinkRepository $LinkRepo, Hasher $hasher)
	{
		$this->LinkRepo = $LinkRepo;
		$this->hasher = $hasher;
	}

	public function getUrlByHash($hash)
	{
		$link = $this->LinkRepo->byHash($hash);
		
		if (! $link) throw new NonExistentHashException;

		return $link->url;
	}

	public function make(StoreLinkRequest $request)
	{
		//Don't shorten links on the same domain.
		if ( strpos($request->input('url'), $request->root()) !== false )
		{
			throw new SelfShortenException;
		}

		$link = $this->LinkRepo->byUrl($request->input('url'));

		if ($link) return $link->hash;

		return $this->makeHash($request->input('url'));

	}

	public function makeHash($url)
	{
		$response = event(new LinkShortenRequest($url));

		$hash = $this->hasher->make($url);

		$data = compact('url', 'hash');

		$link = $this->LinkRepo->create($data);

		event(new LinkWasShortened($link));
		return $hash;
	}
}