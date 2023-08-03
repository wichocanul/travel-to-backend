<?php

namespace App\Http\Controllers;

use App\Models\Places;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Places::all();

        $transformPlaces = $places->map(function($place) {
            $coordinates = json_decode($place->coordinates);
            $images = json_decode($place->images);

            return [
                'id' => $place->id,
                'name' => $place->name,
                'description' => $place->description,
                'coordinates' => [
                    'lat' => $coordinates->lat,
                    'lng' => $coordinates->lng,
                ],
                'images' => $images,
                'type' => $place->category->name,
                'nameEvent' => $place->nameEvent,
                'dayEvent' => $place->dayEvent,
                'hourEvent' => $place->hourEvent,
                'created_at' => $place->created_at,
                'updated_at' => $place->updated_at,
            ];
        });

        return $transformPlaces;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Places $places)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Places $places)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Places $places)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Places $places)
    {
        //
    }
}
