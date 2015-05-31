<?php namespace PNGN\Handlers\Events;

use PNGN\Events\UserRegistered;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class EmailWelcomeMessage {

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
	 * @param  UserRegistered  $event
	 * @return void
	 */
	public function handle(UserRegistered $event)
	{
		$user = $event->user;
		Mail::send('emails.welcome', ['user' => $user], function($message) use ($user)
		{
			$message->to($user->email, $user->name)->subject('Welcome!');
		});
	}

}
