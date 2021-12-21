<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{



    public function __construct()
    {

    }

    // get
    public function index() {
        return response()->json([
            //'success' => true,
            'data' => Produto::with('cidade')->get()

        ], 200);

    }

    // get/{id}
    public function show($id) {
        $model = Produto::find($id);
        if(is_null($model)) {
            return response()->json([
                //'success' => false,
                'message' => 'Registro não existe'
            ], 404);
        }


        return response()->json([
            //'success' => true,
            'data' => $model
        ], 200);
    }

    // Post
    public function store(Request $request) {

        $request_data = $request->all();
        $model = Produto::create($request_data);

        return response()->json([
            'success' => true,
            'data' => $request_data
        ], 201);


    }

    // Put
    public function update(Request $request, $id) {

        $request_data = $request->all();
        $model = Produto::find($id);

        if(is_null($model)) {
            return response()->json([
                'success' => false,
                'message' => 'Registro não existe'
            ], 404);
        }

        $model->update($request_data);

        return response()->json([
            'success' => true,
            'data' => $model
        ], 200);
    }

    // Delete
    public function destroy($id) {

        $model = Produto::find($id);

        if(is_null($model)) {
            return response()->json([
                'success' => false,
                'message' => 'Registro não existe'
            ], 404);
        }

        $model->delete();

        return response()->json([
            'success' => true,
            'message ' => 'Deletado!'
        ], 200);
    }
}
