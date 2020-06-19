<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovie;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        session(['director' => 'director']);
        return view('movie.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movie=true;
        return view('album.create', compact('movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovie $request)
    {
        $validate=$request->validated();
        
        $movie = new Movie();
        $movie->name = $validate['name'];
        $movie->director = $validate['director'];
        $movie->year = $validate['year'];
        $movie->genre = $validate['genre'];
        $movie->quantity = $validate['quantity'];
        $movie->price = $validate['price'];

        
        $file = $validate['image'];
        $extension = $file->getClientOriginalExtension();
        $filename = $movie->name . '.' . $extension; // files are gonna be named '<albumname>.<extension>' typically .jpg .png
        $file->move('uploads/movies/', $filename);
        
        $movie->cover = $filename;
        $movie->save();

        return redirect()->route(' movieIndex')->with('message','La pelicula fue almacenada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie=Movie::findOrFail($id);
        return view('movie.edit',compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMovie $request, $id)
    {
         //the inputs gets validated
         $validate=$request->validated();

         $movie=Movie::findOrFail($id);
         $movie->name = $validate['name'];
         $movie->director = $validate['director'];
         $movie->year = $validate['year'];
         $movie->genre = $validate['genre'];
         $movie->quantity = $validate['quantity'];
         $movie->price = $validate['price'];
 
         $file = $validate['image'];
         $extension = $file->getClientOriginalExtension();
         $filename = $movie->name . '.' . $extension; // files are gonna be named '<albumname>.<extension>' typically .jpg .png
         $file->move('uploads/albums/', $filename);
 
         $movie->cover = $filename;
         $movie->save();
 
         return redirect()->route('movieIndex')->with('message','La pelicula fue editada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
