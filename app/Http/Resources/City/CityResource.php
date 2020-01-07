<?php

declare(strict_types=1);

namespace App\Http\Resources\City;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;

class CityResource extends Resource
{
    /**
     * @param Request $request
     * 
     * @return array
     */
    public function toArray($request): array
    {
        $data['name'] = $this->nameascii;

        return $data;
    }
}
