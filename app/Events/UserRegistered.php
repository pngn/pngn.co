<?php namespace PNGN\Events;

use PNGN\Events\Event;
use PNGN\User;

use Illuminate\Queue\SerializesModels;

class UserRegistered extends Event {

	use SerializesModels;

	public $user;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

}
