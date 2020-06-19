<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Requests\StoreAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        return view('album.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbum $request)
    {
        $validate=$request->validated();
        
        $album = new Album();
        $album->name = $validate['name'];
        $album->artist = $validate['artist'];
        $album->year = $validate['year'];
        $album->genre = $validate['genre'];
        $album->quantity = $validate['quantity'];
        $album->price = $validate['price'];

        
        $file = $validate['image'];
        $extension = $file->getClientOriginalExtension();
        $filename = $album->name . '.' . $extension; // files are gonna be named '<albumname>.<extension>' typically .jpg .png
        $file->move('uploads/albums/', $filename);
        
        $album->cover = $filename;
        $album->save();

        return redirect()->route('albumIndex')->with('message','El album fue almcenado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album=Album::findOrFail($id);
        return view('album.edit',compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $validate
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAlbum $request,$id)
    {
        //the inputs gets validated
        $validate=$request->validated();

        $album=Album::findOrFail($id);
        $album->name = $validate['name'];
        $album->artist = $validate['artist'];
        $album->year = $validate['year'];
        $album->genre = $validate['genre'];
        $album->quantity = $validate['quantity'];
        $album->price = $validate['price'];

        $file = $validate['image'];
        $extension = $file->getClientOriginalExtension();
        $filename = $album->name . '.' . $extension; // files are gonna be named '<albumname>.<extension>' typically .jpg .png
        $file->move('uploads/albums/', $filename);

        $album->cover = $filename;
        $album->save();

        return redirect()->route('albumIndex')->with('message','El album fue editado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}
