<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $chirps = [
        //     [
        //         'author' => 'Jane Doe',
        //         'message' => 'Just deployed my first Laravel app! 🚀',
        //         'time' => '5 minutes ago'
        //     ],
        //     [
        //         'author' => 'John Smith',
        //         'message' => 'Laravel makes web development fun again!',
        //         'time' => '1 hour ago'
        //     ],
        //     [
        //         'author' => 'Alice Johnson',
        //         'message' => 'Working on something cool with Chirper...',
        //         'time' => '3 hours ago'
        //     ]
        // ];
        $chirps = Chirp::with('user')->latest()->take(10)->get();

        return view('home', ['chirps' => $chirps]);
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
        //validate the request
        $validated = $request->validate(['message' => 'required|string|max:255'], ['message.required' => 'Please write something to chirp!', 'message.max' => 'Chirps must be 255 characters or less.']);

        //create chirp
        Chirp::create(['message' => $validated['message'], 'user_id' => null]);

        //redirect to feed
        return redirect('/')->with('success', 'Chirp created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        return view('chirps.edit', compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        //validate
        $validated = $request->validate(['message' => 'required|string|max:255'], ['message.required' => 'Please write something to chirp!', 'message.max' => 'Chirps must be 255 characters or less.']);

        //update
        $chirp->update($validated);

        //redirect
        return redirect('/')->with('success', 'Chirp updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        $chirp->delete();

        return redirect('/')->with('success', 'Chirp deleted!');
    }
}
