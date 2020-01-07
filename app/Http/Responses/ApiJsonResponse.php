<?php

declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Support\Str;
use App\Http\Resources\Resource;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class ApiJsonResponse extends JsonResponse
{
    /**
     * @param Resource $resource
     * 
     * @return JsonResponse
     */
    final public function createSuccess(Resource $resource): JsonResponse
    {
        $model = $resource->resource;

        $response = $resource->additional([
            'code' => strtolower(Str::plural(getModelName($model))) . '.itemCreated',
            'message' => ucfirst(getModelName($model)) . ' created'
        ]  + array_filter([]))->response();

        return $response->setStatusCode(Response::HTTP_CREATED);
    }
    
    /**
     * @param Resource $resource
     * 
     * @return JsonResponse
     */
    final public function updateSuccess(Resource $resource): JsonResponse
    {
        $model = $resource->resource;

        $response = $resource->additional([
            'code' => strtolower(Str::plural(getModelName($model))) . '.itemUpdated',
            'message' => ucfirst(getModelName($model)) . ' updated',
        ] + array_filter([]))->response();

        return $response->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * @param Model $model

     * @return self
     */
    final public function deleteSuccess(Model $model): self
    {
        $this->setData([
            'code' => strtolower(Str::plural(getModelName($model))) . '.itemDeleted',
            'message' => ucfirst(getModelName($model)) . ' deleted'
        ]);

        return $this->setStatusCode(Response::HTTP_OK);
    }
}