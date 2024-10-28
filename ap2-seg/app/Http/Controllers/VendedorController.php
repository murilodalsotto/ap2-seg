<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendedorController extends Controller
{
    public function criar()
    {
        $customers = Vendedor::all();
        return response()->json([
            'status' => true,
            'message' => 'Customers retrieved successfully',
            'data' => $customers
        ], 200);
    }

    public function listar($id)
    {
        $customer = Vendedor::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Customer found successfully',
            'data' => $customer
        ], 200);
    }

    public function salvar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'cpf' => 'required|string|max:15',
            'ano' => 'required|string|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $customer = Vendedor::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Customer created successfully',
            'data' => $customer
        ], 201);
    }

    public function editar(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'cpf' => 'required|string|max:15' . $id,
            'ano' => 'required|string|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $customer = Vendedor::findOrFail($id);
        $customer->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Customer updated successfully',
            'data' => $customer
        ], 200);
    }

    public function remover($id)
    {
        $customer = Vendedor::findOrFail($id);
        $customer->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Customer deleted successfully'
        ], 204);
    }
}