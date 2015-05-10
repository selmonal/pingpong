<?php namespace Acme\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class SupportServiceProvider extends ServiceProvider {

	/**
	 * Boot the service provider.
	 * 
	 * @return void
	 */
	public function boot()
	{
        require __DIR__ . '/../../permissions.php';
	}

	/**
	 * Register the service provider.
	 * 
	 * @return void
	 */
	public function register()
	{
		
	}

}