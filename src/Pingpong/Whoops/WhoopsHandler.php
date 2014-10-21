<?php namespace Pingpong\Whoops;

use Whoops\Handler\PrettyPageHandler;

class WhoopsHandler {

	/**
	 * @param  mixed $handler 
	 * @return void          
	 */
	public static function handle($handler)
	{
        if($handler instanceof PrettyPageHandler)
        {
            $handler->addResourcePath(__DIR__ . '/Resources');
        }
	}

}