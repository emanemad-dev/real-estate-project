<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEstateRequest;
use App\Http\Requests\UpdateEstateRequest;
use Illuminate\Support\Facades\Storage;

class EstateController extends Controller
{
    public function index()
    {
        return Estate::orderBy('created_at','desc')->get();
    }

    public function store(StoreEstateRequest $request)
    {
        $data = $request->validated();

        // handle multiple images (array input name images[])
        if ($request->hasFile('images')) {
            $paths = [];
            foreach ($request->file('images') as $file) {
                $paths[] = Storage::disk('public')->put('estates', $file);
            }
            $data['images'] = $paths;
        }

        $estate = Estate::create($data);
        return response()->json($estate, 201);
    }

   public function show($id)
{
    $estate = Estate::findOrFail($id);
    return view('estates.show', compact('estate'));
}


    public function update(UpdateEstateRequest $request, $id)
    {
        $estate = Estate::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('images')) {
            // optional: delete old images if you want
            $paths = [];
            foreach ($request->file('images') as $file) {
                $paths[] = Storage::disk('public')->put('estates', $file);
            }
            $data['images'] = $paths;
        }

        $estate->update($data);
        return response()->json($estate);
    }

    public function destroy($id)
    {
        $estate = Estate::findOrFail($id);
        // optional: delete images from storage
        if ($estate->images && is_array($estate->images)) {
            foreach ($estate->images as $p) {
                Storage::disk('public')->delete($p);
            }
        }
        $estate->delete();
        return response()->json(null, 204);
    }
}
