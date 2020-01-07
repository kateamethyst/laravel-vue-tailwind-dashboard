<?php

declare(strict_types=1);

namespace App\Services\Integrations\ZohoModule;

use App\Services\Integrations\ZohoModule\ZohoModuleInterface;

class Interview implements ZohoModuleInterface
{
    protected $interview;

    public function __construct($interview)
    {
        $this->interview = $interview;
    }

    public function toArray(): array
    {
        return [
            'Interview Name',
            'Candidate Name',
            'Client Name',
            'Posting Title',
            'Interviewer',
            'Type',
            'Interview Start Time',
            'Schedule Comments',
            'Location',
            'Interview Owner',
            'Others'
        ];
    }
}