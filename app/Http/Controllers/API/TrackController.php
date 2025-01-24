<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TrackResource;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tracks = Track::all();
        return $tracks;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $trackdata = $request->all();
        $track = Track::create($trackdata);
        return $track;

    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
        // return $track;
        $trackResourceData =new TrackResource($track);
        return $trackResourceData;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        //
        $track ->delete();
        return "delete track suss";
    }
}
