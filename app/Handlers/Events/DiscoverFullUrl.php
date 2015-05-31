<?php namespace PNGN\Handlers\Events;

use PNGN\Events\LinkWasShortened;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class DiscoverFullUrl {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  LinkWasShortened  $event
	 * @return void
	 */
	public function handle(LinkWasShortened $event)
	{
		$before = $event->link->url;
		$ch = curl_init($before);
		curl_setopt_array($ch, array(
			CURLOPT_FOLLOWLOCATION => TRUE,  // the magic sauce
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_SSL_VERIFYHOST => FALSE, // suppress certain SSL errors
			CURLOPT_SSL_VERIFYPEER => FALSE, 
		));
		curl_exec($ch);
		$after = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
		curl_close($ch);
		if ($before != $after) {
			$event->link->url = $after;
			$event->link->save();
		}
	}

}
