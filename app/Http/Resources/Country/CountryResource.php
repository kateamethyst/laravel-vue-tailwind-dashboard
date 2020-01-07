<?php

declare(strict_types=1);

namespace App\Http\Resources\Country;

use Illuminate\Http\Resources\Json\Resource;

class CountryResource extends Resource
{
    /**
     * @param Request $request
     * 
     * @return array
     */
    public function toArray($request): array
    {
        $data['id'] = $this->cca3;
        $data['name'] = $this->name['common'];
        $data['cca2'] = $this->cca2;
        $data['cca3'] = $this->cca3;

        return $data;
    }
}
