<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PragmaRX\Countries\Package\Countries;
use App\Http\Resources\City\CityCollectionResource;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->has('country')) {
            throw new BadRequestHttpException('Request has no "country" parameter');
        }

        $country = Countries::where('cca3', $request->get('country'))->first();

        if ($country->isEmpty()) {
            $country = Countries::where('cca2', $request->get('country'))->first();
        }

        if ($country->isEmpty()) {
            throw new NotFoundHttpException('Country ' . $request->get('country') . ' does not exists');
        }

        $cities = $country->hydrate('cities')->cities->filter(static function ($city) use ($request) {
            if (!isset($city['name'])) {
                return false;
            }

            $state = $request->get('state');
            $query = $request->get('q');

            if (null === $query && null === $state) {
                return true;
            }
            
            return 0 === stripos($city['name'], $query) || 0 === stripos($city['adm1name'], $state);
        });

        return (new CityCollectionResource($cities))
            ->response();
    }
}
