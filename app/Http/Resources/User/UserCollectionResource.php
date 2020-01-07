<?php

declare(strict_types=1);

namespace App\Http\Resources\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\ResourceCollection;

class UserCollectionResource extends ResourceCollection
{
    /**
     * @param Request $request
     * 
     * @return array
     */
    public function toArray($request): array
    {
        return $this->collection
            ->map(static function (User $user) use ($request) {
                return (new UserResource($user))
                    ->setIncludes($request->input('includes', []))
                    ->toArray($request);
            })
            ->toArray();
    }
}
