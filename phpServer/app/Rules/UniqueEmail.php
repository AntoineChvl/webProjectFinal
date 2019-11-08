<?php

namespace App\Rules;

use GuzzleHttp\Client as HTTPClient;
use GuzzleHttp\Psr7\Request as HTTPRequest;
use Illuminate\Contracts\Validation\Rule;

class UniqueEmail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function passes($attribute, $value)
    {
        $client = new HTTPClient();
        $httpRequest = new HTTPRequest('get', 'http://127.0.0.1:8080/users',
            ['body' => 'application/json'],'{"email":"'.$value.'"}'
        );
        $response = json_decode($client->send($httpRequest)->getBody()->getContents());
        return count($response->result)==0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This :attribute already exist';
    }
}
