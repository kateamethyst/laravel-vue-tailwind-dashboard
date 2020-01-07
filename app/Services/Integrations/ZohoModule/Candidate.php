<?php

declare(strict_types=1);

namespace App\Services\Integrations\ZohoModule;

use App\Services\Integrations\ZohoModule\ZohoModuleInterface;

class Candidate implements ZohoModuleInterface
{
    protected $candidate;

    public function __construct($candidate)
    {
        $this->candidate = $candidate;
    }

    public function toArray(): array
    {
        return [
            'CANDIDATEID',
            'First Name',
            'Last Name',
            'Email',
            'Current Job Title',
            'Current Employer',
            'Phone',
            'Mobile',
            'Website',
            'Fax',
            'Skype ID',
            'City',
            'State',
            'Country',
            'Expected Salary',
            'Current Salary',
            'Skill Set'
        ];
    }
}