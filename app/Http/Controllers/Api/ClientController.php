<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Responses\ApiJsonResponse;
use App\Http\Resources\Client\ClientResource;
use App\Http\Requests\Admin\Client\AddRequest;
use App\Http\Requests\Admin\Client\UpdateRequest;
use App\Http\Resources\Client\ClientCollectionResource;
use App\Services\Factory\FilterableListingPaginatorFactory;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $clients = FilterableListingPaginatorFactory::create(new Client(), $request);

        return (new ClientCollectionResource($clients))
            ->response();
    }

    /**
     * Store a newly created resource in storage
     *
     * @param AddRequest $request
     * 
     * @return JsonResponse
     */
    public function store(AddRequest $request): JsonResponse
    {
        $client = new Client($request->validated());
        $client->save();

        return (new ApiJsonResponse())
            ->createSuccess(new ClientResource($client->fresh()));
    }

    /**
     * Display the specified resource
     *
     * @param Client $client
     * 
     * @return JsonResponse
     */
    public function show(Client $client): JsonResponse
    {
        return (new ClientResource($client))
            ->setIncludes(request()->get('includes', ['resume']))
            ->response();
    }

    /**
     * Update the specified resourCe in storage
     *
     * @param UpdateRequest $request
     * 
     * @param Client $client
     * @return void
     */
    public function update(UpdateRequest $request, Client $client): JsonResponse
    {
        $client->update($request->validated());

        return (new ApiJsonResponse())
            ->updateSuccess(new ClientResource($client->fresh()));
    }

    /**
     * Remove the specified resource from storage
     *
     * @param Client $client
     * 
     * @return JsonResponse
     */
    public function destroy(Client $client): JsonResponse
    {
        $client->delete();

        return (new ApiJsonResponse())
            ->deleteSuccess($client);
    }
}
