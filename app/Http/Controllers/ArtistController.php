<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Http\Resources\ArtistCollection;
use App\Http\Resources\ArtistResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArtistController extends Controller
{

    //We added a way to display the data for the artist from the database to swagger documentations the can be viewed from either the Website or Insomnia

    /**
    * @OA\Get(
        *     path="/api/artists",
        *     description="Displays all the artist",
        *     tags={"Artists"},
    *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns a list of Galleries in JSON format"
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
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */

     //added a swagger routing for the api to call and display the data within the database using the Get method.

    public function index()
    {
        return new ArtistCollection(Artist::all());
    }

    //This method allows a way to post a new artist into the database through the website.
    //This method can also still be used in the Insomnia as normal

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *      path="/api/artists",

     *      tags={"Artists"},
     *      summary="Create a new artist",
     *      description="Stores the Art in the DB",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"artists"},
     *            @OA\Property(property="artist", type="string", format="string", example="Me"),
     *            @OA\Property(property="bio", type="string", format="string", example="bio testing"),
     *
     *            )
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //the code above shouldn't interfere with being able to post a new artist

    public function store(Request $request)
    {
        $artist = Artist::create($request->only([

            'artist',
            'bio'

        ]));

        return new ArtistResource($artist);
    }

    //this code allows to display an Artist based ont he {id} provided as a parameter or given by a user.

    /**
     * Display the specified resource.
     *
     *  @OA\Get(
    *     path="/api/artists/{id}",
    *     description="Gets an Artist by ID",
    *     tags={"Artists"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Artist id",
        *          required=true,
        *          in="path",
        *          @OA\Schema(
        *              type="integer")
     *          ),
        *      @OA\Response(
        *          response=200,
        *          description="Successful operation"
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
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */

        //

    public function show(Artist $artist)
    {
        return new ArtistResource($artist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        $artist -> update($request->only([

            'artist',
            'bio'

        ]));

        return new ArtistResource($artist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *    path="/api/artists/{id}",
     *    tags={"Artists"},
     *    summary="Delete an Artist",
     *    description="Delete Artist",
     *    @OA\Parameter(name="id", in="path", description="Id of a Artist", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Success",
     *         @OA\JsonContent(
     *         @OA\Property(property="status_code", type="integer", example="204"),
     *         @OA\Property(property="data",type="object")
     *          ),
     *       )
     *      )
     *  )
     *
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $artist -> delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);

   }
}