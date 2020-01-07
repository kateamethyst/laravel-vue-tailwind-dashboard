<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Responses\JSONResourceResponse;
use Illuminate\Http\Resources\Json\ResourceCollection as BaseResourceCollection;

class ResourceCollection extends BaseResourceCollection
{
    public function toResponse($request)
    {
        $response = new JSONResourceResponse($this);

        return $response->response($request);
    }
}
