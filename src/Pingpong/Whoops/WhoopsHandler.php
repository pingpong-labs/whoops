<?php namespace Pingpong\Whoops;

use Exception;
use Illuminate\Foundation\Exceptions\Handler;
use Whoops\Handler\JsonResponseHandler;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class WhoopsHandler extends Handler {

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        'Symfony\Component\HttpKernel\Exception\HttpException'
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * When debugging is enabled, we make the error pretty using Whoops
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception                $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if (config('app.debug'))
        {
            $whoops = new Run;
            $whoops->pushHandler(
            	$this->checkForPrettyHandler($this->getResponseHandler($request))
            );
            $whoops->allowQuit(false);
            $whoops->writeToOutput(false);

            return response($whoops->handleException($e), $whoops->sendHttpCode());
        }

        return parent::render($request, $e);
    }
    
    /**
     * Get response handler.
     * 
     * @param  mixed $request
     * @return mixed
     */
    protected function getResponseHandler($request)
    {
    	return $request->ajax() ? new JsonResponseHandler : new PrettyPageHandler;
    }
    
    /**
     * Check for pretty handler.
     * 
     * @param  mixed $handler
     * @return mixed
     */
    protected function checkForPrettyHandler($handler)
    {
    	if($handler instanceof PrettyPageHandler)
        {
             $handler->addResourcePath(__DIR__ . '/Resources');
        }
        
        return $handler;
    }

}
