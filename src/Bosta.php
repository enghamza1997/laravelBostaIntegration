<?php

declare(strict_types=1);

namespace BiztechEG\laravelBostaIntegration;

use Str;

class Bosta
{
    private $sandbox = false;
    private $BASE_URL;
    private $API_KEY;
    private $headers = [];
    private string $apiPath;

    public function __construct()
    {
        $this->sandbox = config('bosta.sandboxMode', false);
        $this->BASE_URL = $this->sandbox ? config('bosta.sandBoxBaseUrl') : config('bosta.baseUrl');
        $this->API_KEY = $this->sandbox ? config('bosta.sandBoxApiKey') : config('bosta.ApiKey');
        $this->apiPath = config('bosta.apiPath', '/api/v2');
        $this->headers = [
            'Accept: application/json',
            "Authorization: $this->API_KEY",
            'Content-Type: application/json',
            'X-Requested-By: laravel Bosta Integration',
        ];
    }

    /**
     * Send Api Request
     *
     * @param string $method
     * @param string $path
     * @param mixed $body
     * @param array $headerAppends
     * //return ResponseInterface  $promise
     */
    public function send(string $method, string $path, mixed $body = '', $headerAppends = [])
    {
        $url = $this->BASE_URL . $this->apiPath . '/' . $path;
        $method = Str::upper($method);
         
        if (in_array($method, ['PUT', 'POST', 'DELETE', 'GET'])) {

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            if (in_array($method, ['POST', 'PUT'])) {
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
            } elseif ($method == 'DELETE') {
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            }

            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getheaders($headerAppends));

            $response = curl_exec($curl);
            curl_close($curl);
            return $response ? json_decode($response) : throw new \Exception('No resonse from server');
        }
        
        throw new \Exception('404 Method Not Allowed');
    }

    /**
     * @param array $headerAppends
     * @return array $hdders
     */
    private function getheaders(array $headerAppends)
    {
        return array_merge($this->headers, $headerAppends);
    }

    /**
     * @param string $path
     * @return BiztechEG\laravelBostaIntegration\Bosta
     */
    protected function updateApiPath(string $path): Bosta
    {
        $this->apiPath = $path;
        return $this;
    }
}
