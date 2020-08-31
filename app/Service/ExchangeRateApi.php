<?php


namespace App\Service;


use GuzzleHttp\Client;

class ExchangeRateApi
{
    private $client; // Guzzle Instance
    private $base_url;

    /**
     * sets api baseurl and other arguments
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->client = new Client();
        $this->base_url = $config['base_url'];
    }


    /**
     * return data for the given endpoint
     * @param $endPoint
     * @return mixed
     */
    public function get($endPoint)
    {
        $url = "{$this->base_url}latest?$endPoint";
        try {
            $response = $this->client->get($url);

            $contents = $response->getBody()->getContents();
            if ($response->getStatusCode() == 200) {
                return json_decode($contents);
            }
        } catch (\Exception $e) {
//            var_dump($e);
            echo "Unable to retrieve data";
        }

    }
}
