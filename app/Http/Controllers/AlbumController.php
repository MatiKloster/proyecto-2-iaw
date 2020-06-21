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
        $albums = Album::paginate(6);
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
    public function store(Request $request)
    {
        $validate=$this->getValidation($request);
        
        $validate=array_merge($request->validate([
            'image'=>'file|image|max:5000',
        ]),$validate);
        dd($validate);
        $this->saveData(null,$validate)->save();

        return redirect()->route('albumIndex')->with('message','El album fue almcenado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album=Album::findOrFail($id);
        return view('album.album',compact('album'));
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
    public function update(Request $request,$id)
    {
        //the inputs gets validated
        $validate=$this->getValidation($request);
        if($request->has('image')){
            $validate=array_merge($request->validate([
                'image'=>'file|image|max:5000',
            ]),$validate);
        }


        $album=Album::findOrFail($id);
        $this->saveData($album,$validate)->save();

        return redirect()->route('albumIndex')->with('message','El album fue editado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $album=Album::findOrFail($id);
        $album->delete();

        return redirect()->route('albumIndex')->with('message','El album fue elminado con exito!');
    }
    private function saveData($album,$validate){
        if(is_null($album)){
            $album=new Album();
        }
        $album->name = $validate['name'];
        $album->artist = $validate['artist'];
        $album->year = $validate['year'];
        $album->genre = $validate['genre'];
        $album->quantity = $validate['quantity'];
        $album->price = $validate['price'];
        
        if(array_key_exists("image",$validate)){
            $album->cover = $validate['image']->store('uploads','public');
        }
        
        return $album;
    }
    private function getValidation(Request $request){
        return $request->validate([
            'name'=>'required|max:50',
            'artist'=>"required|max:50",
            'year'=>'required|numeric|max:'.date('Y').'',
            'genre'=>'required|max:50',
            'quantity'=>'numeric|required',
            'price'=>'numeric|required',
        ]);
    }
}
