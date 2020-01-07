<?php

namespace App\Http\Resources\JobOpening;

use App\Models\JobOpening;
use Illuminate\Http\Request;
use App\Http\Resources\ResourceCollection;

class JobOpeningCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return $this->collection
        ->map(static function(JobOpening $jobOpening) use ($request) {
            return (new JobOpeningResource($jobOpening))
              ->setIncludes($request->input('includes', []))
              ->toArray($request);
        })
        ->toArray();
    }
}
