<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Prestamos;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index() {
        return Cliente::all();
    }

    public function store(Request $request) {
        $inputs = $request->input();
        $respuesta = Cliente::create($inputs);
        return $respuesta;
    }

    public function show($id) {
        $cliente = Cliente::find($id);
        if (isset($cliente)) {
            return $cliente;
        } else {
            return "No existe el cliente";
        }
    }

    public function update(Request $request, $id) {
        $cliente = Cliente::find($id);
        if (isset($cliente)) {
            $cliente->name = $request->name;
            $cliente->email = $request->email;
            $cliente->celular = $request->celular;
            $cliente->save();
            return "Cliente actualizado exitosamente";
        } else {
            return "No existe el cliente";
        }
    }

    public function destroy($id) {
        $cliente = Cliente::find($id);
        if (isset($cliente)) {
            $eliminado = Cliente::destroy($id);
            if ($eliminado) {
                return 'Cliente eliminado exitosamente';
            } else{
                return "No existe el cliente";
            }

            return $cliente;
        } else {
            return "No existe el cliente";
        }
    }

    public function cliLibrosVencidos() {
        return Prestamos::where('cliente_id', 1)->get();
    }
}
