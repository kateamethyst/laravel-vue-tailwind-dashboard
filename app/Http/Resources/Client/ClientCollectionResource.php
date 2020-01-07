<?php

declare(strict_types=1);

namespace App\Http\Resources\Client;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ResourceCollection;

class ClientCollectionResource extends ResourceCollection
{
    /**
     * @param Request $request
     * 
     * @return array
     */
    public function toArray($request): array
    {
        return $this->collection
            ->map(static function (Client $client) use ($request) {
                return (new ClientResource($client))
                    ->setIncludes($request->input('includes', []))
                    ->toArray($request);
            })
            ->toArray() ;
    }
}