<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PragmaRX\Countries\Package\Countries;
use App\Http\Resources\Country\CountryCollectionResource;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Countries::all()
            ->filter(static function ($country) use ($request) {
                $query = $request->get('q');

                if (null === $query) {
                    return true;
                }

                return 0 === stripos($country->name['common'], $query);
            })
            ->sortBy('name.common');

        return (new CountryCollectionResource($countries))
            ->response();
    }
}
