<?php

namespace App\Http\Responses;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ResourceCollection;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;

class JSONResourceResponse extends \Illuminate\Http\Resources\Json\ResourceCollection
{
    /**
     * @var ResourceCollection
     */
    private $resourceCollection;

    public function __construct(ResourceCollection $resourceCollection)
    {
        parent::__construct($resourceCollection);

        $this->resourceCollection = $resourceCollection;
    }

    /**
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function response($request = null)
    {
        return $this->resourceCollection->resource instanceof AbstractPaginator ? (new PaginatedResourceResponse($this->resourceCollection))->toResponse($request) : $this->toResponse($request);
    }
}