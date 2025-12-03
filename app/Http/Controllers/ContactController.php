<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        // for admin: list messages
        return Contact::orderBy('created_at','desc')->get();
    }

    public function store(StoreContactRequest $request)
    {
        $msg = Contact::create($request->validated());
        return redirect()->back()->with('success', 'Message sent successfully');
    }

    public function show($id)
    {
        return Contact::findOrFail($id);
    }

    public function markAsRead($id)
    {
        $m = Contact::findOrFail($id);
        $m->read = true;
        $m->save();
        return response()->json($m);
    }
}
