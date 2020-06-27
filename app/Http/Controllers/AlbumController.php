<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Requests\StoreAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{   
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    const paginateNumber=6;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::paginate(self::paginateNumber);
        return view('album.index',compact('albums'));
    }

    public function create()
    {
        return view('album.create');
    }

    public function store(Request $request)
    {
        $validate=$this->getValidation($request);
        
        $validate=array_merge($request->validate([
            'image'=>'file|image|max:5000',
        ]),$validate);
        $this->saveData(null,$validate)->save();

        return redirect()->route('albumIndex')->with('message','El album fue almcenado con exito!');
    }

    public function show($id)
    {
        $album=Album::findOrFail($id);
        return view('album.album',compact('album'));
    }

    public function edit($id)
    {
        $album=Album::findOrFail($id);
        return view('album.edit',compact('album'));
    }

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

    public function delete($id)
    {
        $album=Album::findOrFail($id);
        $album->delete();

        return redirect()->route('albumIndex')->with('message','El album fue elminado con exito!');
    }
    public function search()
    {
        $name=$_GET['search'];
        if($name!=""){
            $albums=Album::where('name','like','%'.$name.'%')->paginate(self::paginateNumber);
            return view('album.index',compact('albums'));
        }
        else{
            return redirect()->route('albumIndex');
        }
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
            $album->cover=base64_encode(file_get_contents($validate['image']));
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
