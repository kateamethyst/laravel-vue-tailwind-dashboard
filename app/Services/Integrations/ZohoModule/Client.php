<?php

declare(strict_types=1);

namespace App\Services\Integrations\ZohoModule;

use App\Services\Integrations\ZohoModule\ZohoModuleInterface;

class Client implements ZohoModuleInterface
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function toArray(): array
    {
        return [
            'Client Name',
            'Website',
            'Contact Number',
            'Fax',
            'Industry',
            'Source'
        ];
    }
}