<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
         Blog::orderBy('created_at', 'desc')->get();
    }

    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = Storage::disk('public')->put('blogs', $request->file('image'));
        }
        $blog = Blog::create($data);
        return response()->json($blog, 201);
    }

    public function show($id)
    {
        return Blog::findOrFail($id);
    }

    public function update(StoreBlogRequest $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if ($blog->image) Storage::disk('public')->delete($blog->image);
            $data['image'] = Storage::disk('public')->put('blogs', $request->file('image'));
        }
        $blog->update($data);
        return response()->json($blog);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image) Storage::disk('public')->delete($blog->image);
        $blog->delete();
        return response()->json(null, 204);
    }
}
