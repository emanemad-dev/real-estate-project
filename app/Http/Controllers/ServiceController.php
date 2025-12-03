<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index(){ return Service::orderBy('created_at','desc')->get(); }

    public function store(StoreServiceRequest $request){
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = Storage::disk('public')->put('services', $request->file('image'));
        }
        $service = Service::create($data);
        return response()->json($service,201);
    }

    public function show($id){ return Service::findOrFail($id); }

    public function update(StoreServiceRequest $request, $id){
        $service = Service::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            // delete old if exists
            if ($service->image) Storage::disk('public')->delete($service->image);
            $data['image'] = Storage::disk('public')->put('services', $request->file('image'));
        }
        $service->update($data);
        return response()->json($service);
    }

    public function destroy($id){
        $service = Service::findOrFail($id);
        if ($service->image) Storage::disk('public')->delete($service->image);
        $service->delete();
        return response()->json(null,204);
    }
}
