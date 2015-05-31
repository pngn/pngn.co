<?php namespace PNGN\Events;

use PNGN\Events\Event;

use Illuminate\Queue\SerializesModels;

class LinkShortenRequest extends Event {

	use SerializesModels;

	public $url;
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($url)
	{
		$this->url = $url;
	}

}
