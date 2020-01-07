<?php

declare(strict_types=1);

namespace App\Http\Resources\Permission;

use App\Http\Resources\Resource;

class PermissionResource extends Resource
{
    /**
     * @param Request $request

     * @return array
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}