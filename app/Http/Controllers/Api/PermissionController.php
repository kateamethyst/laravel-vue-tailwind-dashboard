<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\ApiJsonResponse;
use App\Http\Requests\Admin\Permission\AddRequest;
use App\Http\Requests\Admin\Permission\UpdateRequest;
use App\Http\Resources\Permission\PermissionResource;
use App\Services\Factory\FilterableListingPaginatorFactory;
use App\Http\Resources\Permission\PermissionCollectionResource;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissions = FilterableListingPaginatorFactory::create(new Permission(), $request);

        return (new PermissionCollectionResource($permissions))
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
        $permission = $request->validated();
        unset($permission['role_id']);

        $permission = new Permission($permission);
        $permission->save();
        $permission->roles()->sync([$request->role_id]);

        return (new ApiJsonResponse())
            ->createSuccess(new PermissionResource($permission));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return (new PermissionResource($permission))
            ->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Permission $permission)
    {
        $permission->update($request->validated());

        return (new ApiJsonResponse())
            ->updateSuccess(new PermissionResource($permission));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return (new ApiJsonresponse())
            ->deleteSuccess($permission);
    }
}
