<?php

namespace App\Http\Controllers\Api\Candidate;

use App\Models\Resume;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Responses\ApiJsonResponse;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\Candidate\Resume\AddRequest;
use App\Http\Resources\Candidate\Resume\ResumeResource;

class ResumeController extends Controller
{
    /**
     * Display the specified user resume
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $user = auth()->user();

        return (new UserResource($user))
            ->setIncludes(request()->input('includes', ['resume']))
            ->response();
    }

    /**
     * Store the resume of a certain user
     *
     * @param AddRequest $request
     * @return JsonResponse
     */
    public function store(AddRequest $request): JsonResponse
    {
        $user = auth()->user();
        $resume = $user->resume()->first();

        if ($resume) {
            $resume->update($request->validated());
        } else {
            $resume = new Resume($request->validated());
        }
    
        $resume->user()->associate($user);
        $resume->save();
        
        return (new ApiJsonResponse())
            ->createSuccess(new ResumeResource($resume));
    }
}
    