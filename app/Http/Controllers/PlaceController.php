<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PlaceRequest;

class PlaceController extends Controller
{

    public function index()
    {
        $places = Place::all();
        return view('home', compact('places'));
    }


    public function create()
    {
        return view('create_place_form');
    }


    public function store(PlaceRequest $request)
    {
        dd($request->file('image'));
        $imageName = $request->file('image')->hashName();
        $place = Place::create($request->only('title', 'link', 'type'));
        if ($place){
            $path = $request->file('image')->store('uploads', 'public');
            Picture::create([
                'place_id' => $place->id,
                'picture' => $path,
            ]);
        }

        return redirect('/places/' . $place->id);
    }


    public function show($id)
    {
        $place = Place::find($id);
        $picture = Picture::getPictureByPlaceId($id);
        return view('view', compact("place", "picture"));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Picture::deleteAllPictureByPlaceId($id);
        Place::deletePlaceById($id);
        return redirect('/places');


    }
    public function addPhoto(Request $request, $id){
        $place = Place::find($id);
        if ($request->post()){
            $this->validate($request, [
                'image' => 'required'
            ]);
            $path = $request->file('image')->store('uploads', 'public');
            $picture = Picture::create([
                'place_id' => $id,
                'picture' => $path,
            ]);
            if ($picture){
                return redirect('/places/' . $id);
            }
        }
        return view('add_photo_in_place', compact('place'));
    }
}
