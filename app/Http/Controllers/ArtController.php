<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArtCollection;
use App\Models\Art;
use App\Http\Resources\ArtResource;
use Illuminate\Http\Request;


class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return new ArtCollection(Art::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $art = Art::create($request->only([

            'title',
            'artist',
            'category',
            'description',
            'likes'

        ]));

        return new ArtResource($art);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function show(Art $art)
    {
        return new ArtResource($art);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Art $art)
    {
        $art -> update($request->only([

            'title',
            'artist',
            'category',
            'description',
            'likes'

        ]));

        return new ArtResource($art);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Art  $art
     * @return \Illuminate\Http\Response
     */
    public function destroy(Art $art)
    {
        $art -> delete();
        // return response() -> json(null, Response::HTTP_NOT_CONTENT);
    }
}