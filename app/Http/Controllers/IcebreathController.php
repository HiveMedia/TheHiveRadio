<?php namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Cache;
use Carbon\Carbon;

class IcebreathController extends Controller {

    private $VERSION = "0.1.0";

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return array('status' => 'successful',
                     'result' => array('message' => 'Welcome to the Icebreath API, please check the usage docs for more help',
                                       'version' => $this->VERSION),
                     'timestamp' => time());
	}

    /**
     * Handle modules as they are called and return their response in JSON
     *
     * @return Response
     */
    public function module()
    {
        $CacheKey=\Request::path();
        $requestPath = str_replace('icebreath/', '' , \Request::path());
        $requestMethod = \Request::method();

        $args = trim($requestPath, '/');
        $args = explode('/', $args);

        $moduleName = array_shift($args);
        $moduleView = array_shift($args);
        $moduleClass = "HiveMedia\\Icebreath\\Modules\\$moduleName";

        if(!class_exists($moduleClass)) {
            $resp = array('status' => 'error', 'error' => "Module [$moduleName] was not found", 'timestamp' => time());
            return response($resp, 404);
        }
        if (Cache::has($CacheKey)) {
            $builtResp = Cache::get($CacheKey);
        } else {
            $moduleClass = new $moduleClass();
            $resp = $moduleClass->getModuleResponse($moduleView, $args, $requestMethod);
            if($resp->hasErrored()) {
                return response(
                    array('status' => 'error', 'error' => $resp->getError(), 'timestamp' => time()),
                    $resp->getHTTPCode()
                );
            } else {
                $builtResp = null;

                if($resp->getResponseType() == "application/json") {
                    $builtResp = response(
                        array('status' => 'successful', 'result' => $resp->getOutput(), 'timestamp' => time()),
                        $resp->getHTTPCode()
                    );
                } else {
                    $builtResp = response(
                        $resp->getOutput(),
                        $resp->getHTTPCode()
                    );
                }

                foreach($resp->getHeaders() as $key => $value) {
                    $builtResp->header($key, $value);
                }
                $expiresAt = Carbon::now()->addSeconds(15);
                Cache::put($CacheKey, $builtResp, $expiresAt);
            }

        }
        return $builtResp;
    }

}
