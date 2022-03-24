<?php

namespace App\Services\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

trait TraitRequest
{
    public function headers(array $headers = [])
    {
        $headers = [ 
            'Accept' => 'application/json',
            'Authorization' => session('secret_token')
        ];

        return $headers;
    }

    public function request(string $method,string $endPoint,array $params = [],array $headers = [])
    {
        if($method == 'get'){
            return Http::withHeaders($this->headers())->$method($this->url . $endPoint);
        }

        return Http::withHeaders($this->headers())->$method($this->url . $endPoint, $params);
    }

}

