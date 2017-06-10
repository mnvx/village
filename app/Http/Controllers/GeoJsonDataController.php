<?php

namespace App\Http\Controllers;

class GeoJsonDataController extends Controller
{
    public function index()
    {
        return response()
            ->json(
                json_decode(
                    file_get_contents(config('app.geojson.prepared_file'))
                )
            );
    }
}