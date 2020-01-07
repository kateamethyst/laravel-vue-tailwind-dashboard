<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Responses\ApiJsonResponse;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\UpdateMeRequest;
use App\Http\Requests\Admin\User\AddRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Http\Resources\User\UserCollectionResource;
use App\Services\Factory\FilterableListingPaginatorFactory;

class UserController extends Controller
{
    /**
     * @group User Management
     * 
     * Display a listing of the resource.
     *  
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $users = FilterableListingPaginatorFactory::create(new User(), $request, [
            'type' => [
                'in' => [User::TYPE_ADMIN, USER::TYPE_SUPERADMIN]
            ]
        ]);

        return (new UserCollectionResource($users))
            ->response();
    }

    /**
     * @group User Management
     * 
     * Store a newly created resource in storage.
     *
     * @param  AddRequest  $request
     * 
     * @return JsonResponse
     */
    public function store(AddRequest $request): JsonResponse
    {
        $input = $request->validated();

        $user = new User([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'type' => $input['type'] ?? User::TYPE_SUPERADMIN
        ]);
        $user->save();

        return (new ApiJsonResponse())
            ->createSuccess(new UserResource($user->fresh()));
    }

    /**
     * @group User Management
     * 
     * Display the specified resource.
     *
     * @param  User  $user
     * 
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return (new UserResource($user))
            ->setIncludes(request()->input('includes', []))
            ->response();
    }

    /**
     * @group User Management
     * 
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  User  $user
     * 
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());

        return (new ApiJsonResponse())
            ->updateSuccess(new UserResource($user->fresh()));
    }

    /**
     * @group User Management
     * 
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * 
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return (new ApiJsonResponse())
            ->deleteSuccess($user);
    }

    /**
     * @group User Management
     * 
     * Returns the information of the logged in user
     *
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        $user = Auth::user();

        return (new UserResource($user))
            ->setIncludes(request()->input('includes', []))
            ->response();
    }

    /**
     * @group User Management
     * 
     * Update the current logged in user
     * 
     * @param UpdateMeRequest $request
     *
     * @return JsonResponse
     */
    public function updateMe(UpdateMeRequest $request): JsonResponse
    {
        $user = Auth::user();

        $user->update($request->validated());

        return (new UserResource($user))
            ->response();
    }
}
