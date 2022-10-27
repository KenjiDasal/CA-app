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
     *
     *  @OA\Get(
        *     path="/api/Gallery",
        *     description="Displays all the Art pieces",
        *     tags={"Gallery"},
        *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns a list of Gallery in JSON format"
        *       ),
        *      @OA\Response(
        *          response=401,
        *          description="Unauthenticated",
        *      ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
     * )
     */
    public function index()
    {

        return new ArtCollection(Art::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     *  @OA\Post(
     *      path="/api/gallery",
     *      operationId="store",
     *      tags={"Gallery"},
     *      summary="Create a new art piece",
     *      description="Stores the Art in the DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"title", "category", "description", "artists", "likes"},
     *            @OA\Property(property="title", type="string", format="string", example="Sample Title"),
     *            @OA\Property(property="category", type="string", format="string", example="Autobiography"),
     *            @OA\Property(property="description", type="string", format="string", example="A long description about this great A"),
     *            @OA\Property(property="artist", type="string", format="string", example="Me"),
     *             @OA\Property(property="likes", type="integer", format="integer", example="1")
     *          )
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *     )
     * )
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