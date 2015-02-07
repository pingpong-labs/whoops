<?php namespace Pingpong\Whoops;

use Whoops\Handler\PrettyPageHandler;
use Illuminate\Support\ServiceProvider;

class WhoopsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the package.
	 * 
	 * @return void 
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/Resources/views', 'whoops');
		
		$this->publishes([
	        	__DIR__.'/Resources/css' => base_path('public'),
		 ]);
		 
		WhoopsHandler::handle($this->app['whoops.handler']);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
