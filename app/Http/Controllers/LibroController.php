<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index() {
        return Libro::all();
    }

    public function store(Request $request) {
        $inputs = $request->input();
        $respuesta = Libro::create($inputs);
        return $respuesta;
    }

    public function show($id) {
        $libro = Libro::find($id);
        if (isset($libro)) {
            return $libro;
        } else {
            return "No existe el libro";
        }
    }

    public function update(Request $request, $id) {
        $libro = Libro::find($id);
        if (isset($libro)) {
            $libro->titulo = $request->titulo;
            $libro->autor_id = $request->autor_id;
            $libro->lote = $request->lote;
            $libro->description = $request->description;
            $libro->save();
            return "Libro actualizado exitosamente";
        } else {
            return "No existe el libro";
        }
    }

    public function destroy($id) {
        $libro = Libro::find($id);
        if (isset($libro)) {
            $eliminado = Libro::destroy($id);
            if ($eliminado) {
                return 'Libro eliminado exitosamente';
            } else{
                return "No se pudo eliminar";
            }

            return $libro;
        } else {
            return "No existe el libro";
        }
    }

}
