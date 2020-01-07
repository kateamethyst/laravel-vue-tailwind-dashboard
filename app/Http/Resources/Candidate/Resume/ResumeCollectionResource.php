<?php

declare(strict_types=1);

namespace App\Http\Resources\Candidate\Resume;

use App\Http\Resources\ResourceCollection;
use App\Models\Resume;

class ResumeCollectionResource extends ResourceCollection
{
    public function toArray($request): array
    {
        return $this->collection
            ->map(static function (Resume $resume) use ($request) {
                return (new ResumeResource($resume))
                    ->setIncludes($request->input('includes', []))
                    ->toArray($request);
            })
            ->toArray();
    }
}