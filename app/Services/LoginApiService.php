<?php

namespace App\Services;

class LoginApiService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
    }

    public function login($identity, $password)
    {
        $url = $this->baseUrl . '/xxloginxx';

        $data = [
            'identity' => $identity,
            'password' => $password,
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new \Exception("Error in cURL: $error");
        }

        curl_close($ch);

        return json_decode($response, true);
    }
}
