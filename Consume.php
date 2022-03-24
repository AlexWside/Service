<?php

namespace App\Services;

use App\Services\Traits\TraitRequest;
use App\Http\Utils\DefaultResponse;

class Consume
{
    use TraitRequest;

    protected $defaultResponse;
    protected $token;
    protected $url;

    public function __construct(DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
        $this->url =  config('app.auth_api'); 
    }

    public function login($request)
    {
       return $this->request('post', "ad/login", $request->all() );
    }

    public function usuario($request)
    {
        $response =  $this->request('get', 'ad/buscar/?matricula='.$request->user, []);
        
        return $this->defaultResponse->response($response);
    }

    public function getTasyUsuarios($request)
    {
        $response = $this->request('get', 'tasy/usuario', []);

        return $this->defaultResponse->response($response);
    }
}