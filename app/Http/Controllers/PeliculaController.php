<?php

namespace App\Http\Controllers;
use App\Models\Pelicula;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::all(); //el método estático all() devuelve un array con todos los videojuegos que hay en la BBDD
        return view('cartelera', compact('peliculas'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::user();
        $pelicula = new Pelicula();
        $pelicula -> user_id=Auth::user()->id;
        $pelicula->título = $request->get('título');
        $pelicula->descripción = $request->get('descripción');
        $pelicula->entradas_disp = $request->get('entradas_disp');
      
        $pelicula->save();

        return redirect('/peliculas/create')->with('success','Película añadida correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelicula $pelicula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        //
    }

    public function listarDelete(){
        $peliculas = Pelicula::all();
        return view('delete', compact('peliculas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula)
    {
        $pelicula = Pelicula::find($pelicula->id);
        $pelicula->delete();
        return redirect('/peliculas/borrar')->with('success',"¡Película borrada correctamente!");
    }
}
