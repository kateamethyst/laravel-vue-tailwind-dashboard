<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Models\JobOpening;
use App\Models\JobIndustry;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Responses\ApiJsonResponse;
use App\Http\Requests\Admin\JobOpening\AddRequest;
use App\Http\Requests\Admin\JobOpening\UpdateRequest;
use App\Http\Resources\JobOpening\JobOpeningResource;
use App\Services\Factory\FilterableListingPaginatorFactory;
use App\Http\Resources\JobOpening\JobOpeningCollectionResource;

class JobOpeningController extends Controller
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
        $jobOpenings = FilterableListingPaginatorFactory::create(new JobOpening(), $request);
        
        return (new JobOpeningCollectionResource($jobOpenings))
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
        $jobOpening = new JobOpening($request->validated());
        $jobOpening->industry()->associate(JobIndustry::find($request->industry_id));
        $jobOpening->client()->associate(Client::find($request->client_id));
        $jobOpening->save();

        return (new ApiJsonResponse())
            ->createSuccess(new JobOpeningResource($jobOpening->fresh()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $applicant
     * 
     * @return JsonResponse
     */
    public function show($jobOpening): JsonResponse
    {
        $jobOpening = JobOpening::find($jobOpening);

        return (new JobOpeningResource($jobOpening))
            ->setIncludes(request()->get('includes', ['client', 'industry']))
            ->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, JobOpening $job): JsonResponse
    {
        $job->update($request->validated());

        return (new ApiJsonResponse())
            ->createSuccess(new JobOpeningResource($job->fresh()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobOpening $job)
    {
        $job->delete();

        return (new ApiJsonResponse())
            ->deleteSuccess($job);
    }
}
