<?php

declare(strict_types=1);

namespace App\Http\Resources\Role;

use App\Models\Role;
use App\Http\Resources\Role\RoleResource;
use App\Http\Resources\ResourceCollection;

class RoleCollectionResource extends ResourceCollection
{
    /**
     * @param Request $request
     * 
     * @return array
     */
    public function toArray($request): array
    {
        return $this->collection
            ->map(static function (Role $role) use ($request) {
                return (new RoleResource($role))
                    ->setIncludes($request->input('includes', []))
                    ->toArray($request);
            })
            ->toArray();
    }
}