<?php

declare(strict_types=1);

namespace App\Http\Resources\Client;

use Illuminate\Http\Request;
use App\Http\Resources\Resource;

class ClientResource extends Resource
{
    /**
     * @param Request $request

     * @return array
     */
    public function toArray($request): array
    {
        $data = parent::toArray($request);

        return $data;
    }
}