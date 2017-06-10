<?php

namespace App\Http\Controllers;

class GeoJsonDataController extends Controller
{
    public function index()
    {
        return response()
            ->json(
                json_decode(
                    file_get_contents(database_path(implode(DIRECTORY_SEPARATOR, ['geojson', 'data.geojson'])))
                )
            );
    }
}