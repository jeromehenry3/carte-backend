<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Place;

class PlaceController extends Controller
{
    /**
     * Adds a place.
     *
     * @param  Request  $request
     * @return Response
     */
    public function add(Request $request) {
        $place = new Place;
        $place->longitude = $request->longitude;
        $place->latitude = $request->latitude;
        $place->type = $request->type;
        $place->title = $request->title;
        $place->description = $request->description;
        return $place->save();
    }

    /**
     * Returns all places
     *
     * @return Response
     */
    public function get_all() {
        $places = Place::all();
        return response()->json($places);
    }
}
