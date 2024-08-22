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
            return response()->json([
                'success' => true,
                'message' => 'Cliente encontrado',
                'data' => $cliente
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Cliente no encontrado',
                'error' => $e->getMessage()
            ], 404);
        }
    }


    public function update(ClienteRequest $request, Cliente $cliente)
    {
        try{
            $cliente->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Cliente actualizado correctamente',
                'data' => $cliente

            ], 200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Cliente no encontrado',
                'error' => $e->getMessage()
            ]);
        }
    }


    public function destroy(Cliente $cliente)
    {
        try{

            if(!$cliente){
                return response()->json([
                    'success' => false,
                    'message' => 'Cliente no encontrado'
                ], 404);
            }

            $cliente->delete();
            return response()->json([
                'success' => true,
                'message' => 'Cliente elimando correctamente'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'No se pudo eliminar Cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
