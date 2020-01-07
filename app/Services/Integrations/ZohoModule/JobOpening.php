<?php

declare(strict_types=1);

namespace App\Services\Integrations\ZohoModule;

use App\Services\Integrations\ZohoModule\ZohoModuleInterface;

class JobOpening implements ZohoModuleInterface
{
    protected $job;

    public function __construct($job)
    {
        $this->job = $job;
    }

    public function toArray(): array
    {
        return [
            'Posting Title',
            'Client Name',
            'Number of Positions',
            'Job Opening Status',
            'Industry',
            'Job Type',
            'State',
            'Country',
            'Work Experience',
            'Salary',
            'Job Description'
        ];
    }
}