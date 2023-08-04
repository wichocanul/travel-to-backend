<?php

namespace App\Http\Controllers;

use App\Models\Places;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
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
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'coordinates.lat' => 'required|numeric',
            'coordinates.lng' => 'required|numeric',
            'images' => 'required|array',
            'type' => 'required|integer',
            'nameEvent' => 'nullable|string',
            'dayEvent' => 'nullable|date_format:d-m-Y',
            'hourEvent' => 'nullable|date_format:H:i',
        ], [
            'name.required' => 'The name field is required',
            'name.string' => 'The name must be a string',
            'description.required' => 'The description field is required',
            'description.string' => 'The description must be a string',
            'coordinates.lat.required' => 'The latitude field is required',
            'coordinates.lat.numeric' => 'The latitude must be a numeric value',
            'coordinates.lng.required' => 'The longitude field is required',
            'coordinates.lng.numeric' => 'The longitude must be a numeric value',
            'images.required' => 'The images field is required',
            'images.array' => 'The images must be an array',
            'images.*.string' => 'Cada elemento del arreglo imágenes debe ser una cadena',
            'type.required' => 'The type field is required',
            'type.numeric' => 'The type must be a numeric value',
            'nameEvent.string' => 'The nameEvent must be a string',
            'dayEvent.date_format' => 'The dayEvent must be a valid date with format DD-MM-YYYY (00-00-0000)',
            'hourEvent.string' => 'The hourEvent must be a string with format HH:MM',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json([
                'errors' => $errors
            ], 422);
        }

        $coordinates = [
            'lat' => $request->input('coordinates')['lat'],
            'lng' => $request->input('coordinates')['lng'],
        ];

        $place = Places::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'coordinates' => json_encode($coordinates),
            'images' => json_encode($request->input('images'), JSON_UNESCAPED_SLASHES),
            'type' => $request->input('type'),
            'nameEvent' => $request->input('nameEvent') ?? '',
            'dayEvent' => $request->input('dayEvent'),
            'hourEvent' => $request->input('hourEvent'),
        ]);

        return response()->json([
            'message' => 'Done!, you just register a new place',
            'data' => $place
        ], 200);
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
