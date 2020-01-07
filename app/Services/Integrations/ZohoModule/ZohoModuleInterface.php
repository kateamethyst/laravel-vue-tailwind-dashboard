<?php

declare(strict_types=1);

namespace App\Services\Integrations\ZohoModule;

interface ModuleInterface
{
    public function __construct($model);

    public function toArray(): array;
}