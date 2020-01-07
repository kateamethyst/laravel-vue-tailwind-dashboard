<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Responses\ApiJsonResponse;
use App\Http\Resources\Role\RoleResource;
use App\Http\Requests\Admin\Role\AddRequest;
use App\Http\Requests\Admin\Role\UpdateRequest;
use App\Http\Resources\Role\RoleCollectionResource;
use App\Services\Factory\FilterableListingPaginatorFactory;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $roles = FilterableListingPaginatorFactory::create(new Role(), $request);

        return (new RoleCollectionResource($roles))
            ->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $role = new Role($request->validated());
        $role->save();

        return (new ApiJsonResponse())
            ->createSuccess(new RoleResource($role));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return (new RoleResource($role))->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Role $role)
    {
        $role->update($request->validated());

        return (new ApiJsonResponse())
            ->updateSuccess(new RoleResource($role));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return (new ApiJsonResponse())
            ->deleteSuccess($role);

    }
}
