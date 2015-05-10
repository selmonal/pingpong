<?php namespace Acme\Providers;

use Response;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Pingpong\Trusty\Exceptions\ForbiddenException;

class ErrorServiceProvider extends ServiceProvider {

	/**
	 * Boot the service provider.
	 * 
	 * @return void
	 */
	public function boot()
	{
        $this->registerErrorHandlers();
	}

	/**
	 * Register the service provider.
	 * 
	 * @return void
	 */
	public function register()
	{
		
	}

	/**
     * Register the required handlers.
     *
     * @return void
     */
	public function registerErrorHandlers()
	{
		$this->app->error(function (ForbiddenException $e)
        {
            if ($this->app['request']->ajax())
            {
                return Response::json(['code' => 403, 'message' => 'Access denied'], 403);
            }

            return Response::view('admin::403', [], 403);
        });
	}

}