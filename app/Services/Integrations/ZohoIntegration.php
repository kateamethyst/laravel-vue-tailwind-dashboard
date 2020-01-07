<?php

declare(strict_types=1);

namespace App\Services\Integrations;

use App\Models\Client;
use Apora\ZohoRecruitClient\ZohoRecruitClient;

class ZohoIntegration
{
    /**
     * @var mixed
     */
    protected $module;

    /**
     * @var mixed
     */
    protected $request;

    /**
     * @var mixed
     */
    protected $zohoRecruitClient;

    /**
     * Set the module to be used by the zoho integration
     *
     * @param mixed $module
     * @return mixed
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Set the array request for the zoho integration
     *
     * @param mixed $request
     * @return Request
     */
    public function setRequest($request)
    {
        $this->request = $request->toArray();

        return $this;
    }

    /**
     * Prepare zoho integration
     */
    public function make()
    {
        $authToken = config('services.zoho.auth_token');

        $this->zohoRecruitClient = new ZohoRecruitClient($this->module, $authToken);

        return $this;
    }

    /**
     * Add Records to zoho recruit
     */
    public function addRecord()
    {
        return $this->zohoRecruitClient->addRecords()
            ->addRecord($this->request)
            ->onDuplicateUpdate()
            ->request();
    }

    /**
     * Custom call for zoho recruit
     *
     * @param string $uri
     * @param array $params
     * @param string $method
     * @return mixed
     */
    public static function customCall(string $uri, array $params, string $method = 'GET')
    {
        $baseUri= 'https://recruit.zoho.com/recruit/private/json/';

        $client = new Client([
            'base_uri' => $baseUri,
            'timeout' => 2.0
        ]);

        $response = $client->request($method, $uri, [
            'query' => $request
        ]);

        return json_decode($response->getBody()->getContents());
    }
}