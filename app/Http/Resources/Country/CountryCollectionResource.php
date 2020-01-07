<?php

declare(strict_types=1);

namespace App\Http\Resources\Country;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\Country\CountryResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryCollectionResource extends ResourceCollection
{
    /**
     * @param Request $request
     * 
     * @return array
     */
    public function toArray($request): array
    {
        $cacheKey = md5('countries-' . serialize($request->all()));

        return Cache::remember($cacheKey, 84600, function () use ($request) {
            return $this->collection
                ->map(static function ($country) use ($request) {
                    return (new CountryResource($country))
                        ->toArray($request);
                })
                ->values()
                ->toArray();
        });
    }
}
