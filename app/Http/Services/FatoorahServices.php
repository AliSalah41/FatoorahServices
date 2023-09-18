<?php

namespace App\Http\Services ;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

class FatoorahServices
{
    private $base_Url;
    private $headers;
    private $request_client;

    public function __construct(Client $request_client)
    {
        $this->request_client = $request_client;

        $this->base_Url = env('fatoorah_base_url');

        $this->headers = [
            'content-Type' => 'application/json',
            'authorization' => 'Bearer ' . env('fatoora_token'),
        ];
    }


    public function buildRequest($uri,$method, $data = [])
    {
        //establish connection
        $request = new Request($method, $this->base_Url . $uri, $this->headers);

        //check data
        // if(!$data)
        // {
        //     return false;
            $response = $this->request_client->send($request,[
                'json' => $data,
            ]);

            if($response->getStatusCode() != 200)
            {
                //return false;
            }
            $response = json_decode($response->getBody(), true);
            return $response;
        // }
    }

    public function sendPayment($data)
    {
       return $response = $this->buildRequest('v2/SendPayment','POST',$data);
    }

 

}


