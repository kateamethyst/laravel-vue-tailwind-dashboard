<?php

declare(strict_types=1);

namespace App\Http\Resources\Applicant;

use Illuminate\Http\Request;

class ApplicantResource extends Resource
{
    /**
     * @param Request $request
     * 
     * @return array
     */
    public function toArray($request): array
    {
        $data = parent::toArray($request);

        return $data;
    }
}
