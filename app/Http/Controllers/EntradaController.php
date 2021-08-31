<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Auth;
use DB;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Pelicula::all(); //el método estático all() devuelve un array con todos los videojuegos que hay en la BBD
        $datos1 = Entrada::all();
        return view('aforo', compact('datos', 'datos1'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peliculas = Pelicula::all();
        return view('comprar', compact('peliculas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validación de los campos 
        $request->validate([
            'cantidad' => 'required|integer|between:1,20',
            'pelicula_id' => 'required',
        ]);
        //Creación e instanciación del objeto Entrada
        Auth::user();
        $entrada = new Entrada();
        $entrada-> user_id=Auth::user()->id;
        $entrada-> user_name=Auth::user()->name;
        $entrada->cantidad = $request->get('cantidad');
        $result_explode= explode('|', $request->get('pelicula_id'));
        $entrada->pelicula_id = $result_explode[0];
        $entrada->pelicula_título = $result_explode[1];  
        
        //Consulta para saber el nº de entradas disponibles de una pelicula
        $resultado =  DB::table('peliculas')->select('entradas_disp')->where('id', $entrada->pelicula_id)->first();

        //Comprobamos si quedan entradas disponibles para la película escogida y si la cantidad de entradas escogida por el 
        //usuario está entre 1 y 20.
        if($entrada->cantidad >= 1 && $entrada->cantidad <= 20 && $resultado->entradas_disp > 0) {
            
            Pelicula::find($entrada->pelicula_id)->decrement('entradas_disp',$entrada->cantidad);
            $entrada->save();
            return redirect('/comprar-entradas')->with('success','Compra realizada con éxito!');
        
        } else {
            
            return redirect('/comprar-entradas')->with('warning','Lo sentimos. No quedan entradas disponibles para esta película');
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrada $entrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrada $entrada)
    {
        
    }
}
