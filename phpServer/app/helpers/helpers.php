<?php


use GuzzleHttp\Client as HTTPClient;
use GuzzleHttp\Psr7\Request as HTTPRequest;

if(!function_exists('getToken')){
    function getToken(){
        $client = new HTTPClient();
        $httpRequest = new HTTPRequest('get', 'http://' . env('ACCOUNT_SERVER_IP') . '/getToken',
            ['body' => 'application/json'],'{"username":"'.env('ACCOUNT_SERVER_USERNAME').'","password":"'.env('ACCOUNT_SERVER_KEY').'"}'
        );
        return $client->send($httpRequest)->getBody()->getContents();
    }
}

if(!function_exists('httpRequest')){
    function httpRequest($method,$uri,$body='{}'){
        $client = new HTTPClient();
        $httpRequest = new HTTPRequest($method, 'http://' . env('ACCOUNT_SERVER_IP') . $uri,
            ['body' => 'application/json','Authorization' => getToken()],$body);
        return json_decode($client->send($httpRequest)->getBody()->getContents());
    }
}
