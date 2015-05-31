<?php namespace PNGN\Events;

use PNGN\Events\Event;
use PNGN\Link;
use Illuminate\Queue\SerializesModels;

class LinkWasShortened extends Event {

	use SerializesModels;

	public $link;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Link $link)
	{
		$this->link = $link;
	}

}
