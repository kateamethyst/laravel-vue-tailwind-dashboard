<?php

declare(strict_types=1);

namespace App\Http\Resources\Applicant;

use Illuminate\Http\Request;
use App\Http\Resources\ResourceCollection;

class ApplicantCollectionResource extends ResourceCollection
{
    /**
     * @param Request $request
     * 
     * @return array
     */
    public function toArray($request): array
    {
        return $this->collection
            ->map(static function (Applicant $applicant) use ($request) {
                return (new ApplicantResource($applicant))
                    ->setIncludes($request->input('includes', []))
                    ->toArray($request);
            })
            ->toArray();
    }
}
