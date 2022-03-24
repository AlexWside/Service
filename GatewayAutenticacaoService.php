<?php

namespace App\Services;

use App\Http\Utils\DefaultResponse;
use Illuminate\Support\Facades\Http;

class GatewayAutenticacaoService
{
    protected $defaultResponse;
    protected $url;
    protected $http;

    public function __construct(DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
        $this->url = 'url';
        $this->http = Http::acceptJson();
    }

    public function getRequest(array $params = [])
    {
        $response = $this->http->get($this->url, $params);
        
        return $this->defaultResponse->response($response);
    }
 }