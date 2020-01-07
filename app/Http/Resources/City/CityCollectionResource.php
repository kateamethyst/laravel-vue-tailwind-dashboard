<?php

declare(strict_types=1);

namespace App\Http\Resources\City;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\City\CityResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CityCollectionResource extends ResourceCollection
{
    /**
     * @param Request $request
     * 
     * @return array
     */
    public function toArray($request): array
    {
        $cacheKey = md5('cities-' . serialize($request->all()));

        return Cache::remember($cacheKey, 84600, function () use ($request) {
            return $this->collection
                ->map(static function ($city) use ($request) {
                    return (new CityResource($city))
                        ->toArray($request);
                })
                ->values()
                ->toArray();
        });
    }
}
