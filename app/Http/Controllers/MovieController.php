<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MovieController extends Controller
{   
    const paginateNumber=6;
    
    public function __construct()
    {
        $this->middleware('login');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::paginate(self::paginateNumber);
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
        return view('movie.create', compact('movie'));
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
            'image'=>'required|file|image|max:5000',
        ]),$validate);

        $this->saveData(null,$validate)->save();

        return redirect()->route('movieIndex')->with('message','La pelicula fue almacenada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie=Movie::findOrFail($id);

        return view('movie.movie',compact('movie'));
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
    public function update(Request $request, $id)
    {
         //the inputs gets validated
         $validate=$this->getValidation($request);
         if($request->has('image')){
            $validate=array_merge($request->validate([
                'image'=>'file|image|max:5000',
            ]),$validate);
        }

         $movie=Movie::findOrFail($id);
        
        $this->saveData($movie,$validate)->save();
 
         return redirect()->route('movieIndex')->with('message','La pelicula fue editada con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $movie=Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movieIndex')->with('message','La pelicula fue elminado con exito!');
    }

    private function saveData($movie,$validate){
        if(is_null($movie)){
            $movie = new Movie();
        }

        $movie->name = $validate['name'];
        $movie->director = $validate['director'];
        $movie->year = $validate['year'];
        $movie->genre = $validate['genre'];
        $movie->quantity = $validate['quantity'];
        $movie->price = $validate['price'];

        if(array_key_exists('image',$validate)){
            $movie->cover=base64_encode(file_get_contents($validate['image']));
        }
        
        return $movie;
    }

    private function getValidation(Request $request){
        return $request->validate([
            'name'=>'required|max:50',
            'director'=>"required|max:50",
            'year'=>'required|numeric|max:'.date('Y').'',
            'genre'=>'required|max:50',
            'quantity'=>'numeric|required',
            'price'=>'numeric|required',
        ]);
    }
    public function search(){
        $name=$_GET['search'];
        if($name!=""){
            $movies=Movie::where('name','like','%'.$name.'%')->paginate(self::paginateNumber);
            return view('movie.index',compact('movies'));
        }
        else{
            return redirect()->route('movieIndex');
        }
    }
}
