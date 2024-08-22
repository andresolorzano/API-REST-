<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Exception;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        try{
            $cliente = Cliente::all();
            return response()->json([
                'success' => true,
                'data' => $cliente,
                'message' => 'Clientes obtenidos correctamente'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'No se puede obtener los Clientes',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(ClienteRequest $request)
    {
        try{
            $cliente = Cliente::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Cliente guardado correctamente',
                'data' => $cliente
            ], 201);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'No se pudo guardar el cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function show(Cliente $cliente)
    {
        try{

        }catch(Exception $e){

        }
    }


    public function update(Request $request, Cliente $cliente)
    {
        //
    }


    public function destroy(Cliente $cliente)
    {
        //
    }
}
