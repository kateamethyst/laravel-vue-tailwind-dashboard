<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollectionResource;
use App\Services\Factory\FilterableListingPaginatorFactory;

class CandidateController extends Controller
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
        if ($request->has('includes') === false) {
            $request->request->add(['includes' => ['resume']]);
        }

        $applicants = FilterableListingPaginatorFactory::create(new User(), $request, [
            'type' => [
                'equals' => User::TYPE_CANDIDATE
            ],
        ]);

        return (new UserCollectionResource($applicants))
            ->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $applicant
     * 
     * @return JsonResponse
     */
    public function show($applicant): JsonResponse
    {
        $applicant = User::find($applicant);

        return (new UserResource($applicant))
            ->setIncludes(request()->get('includes', ['resume']))
            ->response();
    }
}
