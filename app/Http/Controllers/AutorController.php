<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Autor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $respuesta = Autor::create($inputs);
        return $respuesta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autor = Autor::find($id);
        if (isset($autor)) {
            return $autor;
        } else {
            return "No existe el autor";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $autor = Autor::find($id);
        if (isset($autor)) {
            $autor->name = $request->name;
            $autor->save();
            return "Autor actualizado exitosamente";
        } else {
            return "No existe el autor";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autor = Autor::find($id);
        if (isset($autor)) {
            $eliminado = Autor::destroy($id);
            if ($eliminado) {
                return 'Autor eliminado exitosamente';
            } else{
                return "No existe el autor";
            }

            return $autor;
        } else {
            return "No existe el autor";
        }
    }
}
