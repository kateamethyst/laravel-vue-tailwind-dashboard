<?php

declare(strict_types=1);

namespace App\Http\Resources\Permission;

use App\Models\Permission;
use App\Http\Resources\ResourceCollection;
use App\Http\Resources\Permission\PermissionResource;

class PermissionCollectionResource extends ResourceCollection
{
    /**
     * @param Request $request
     * 
     * @return array
     */
    public function toArray($request): array
    {
        return $this->collection
            ->map(static function (Permission $permission) use ($request) {
                return (new PermissionResource($permission))
                    ->setIncludes($request->input('includes', []))
                    ->toArray($request);
            })
            ->toArray();
    }
}