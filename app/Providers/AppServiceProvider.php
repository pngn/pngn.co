<?php namespace PNGN\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'PNGN\Services\Registrar'
		);
		$this->app->bind(
			'PNGN\Contracts\Shortener',
			'PNGN\Services\SimpleShortener'
		);
		$this->app->bind(
			'PNGN\Contracts\LinkRepository',
			'PNGN\Repositories\DbLinkRepository'
		);
	}

}
