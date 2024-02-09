<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Prestamos;
use Illuminate\Http\Request;

class PrestamosController extends Controller
{
    public function index() {
        return Prestamos::all();
    }

    public function store(Request $request)
    {
        $inputs = $request->input();
        $respuesta = Prestamos::create($inputs);
        return $respuesta;
    }

    public function update(Request $request, $id)
    {
        $prestamo = Prestamos::find($id);
        if (isset($prestamo)) {
            $prestamo->libro_id = $request->libro_id;
            $prestamo->cliente_id = $request->cliente_id;
            $prestamo->fecha_prestamo = $request->fecha_prestamo;
            $prestamo->dias_prestamo = $request->dias_prestamo;
            $prestamo->estado = $request->estado;
            $prestamo->save();
            return "Prestamo actualizado exitosamente";
        } else {
            return "No existe el prestamo";
        }
    }

    public function destroy() {
        //
    }

    public function preSemanaMes() {
        return Prestamos::where('fecha_prestamo', '>', '2023-01-01')->get();
    }

    public function cliLibrosVencidos() {
        $consulta = Cliente::select('cliente.id', 'cliente.name', 'cliente.celular', 'cliente.email', 'prestamos.cliente_id', 'prestamos.libro.id', 'prestamos.estado')
                            ->join('prestamos', 'prestamos.cliente_id', '=', 'clientes.id')
                            ->where('prestamos.estado','En Prestamo')->get();
        return $consulta;
    }
}
