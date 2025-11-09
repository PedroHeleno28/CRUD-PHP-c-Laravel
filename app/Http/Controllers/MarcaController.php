<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marca;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
{
    public function marca(Request $req){        
        $marca= marca::all();        
        return view('marca.index', compact('marca'));         
    }

    public function incluirMarca(Request $request)  
    {
        return view('marca.cadastrar');             
    }

    public function salvarMarca(Request $request)  
    {   
        $validador = $request->validate([
            'nome'=> 'required|min:3',            
        ],
        [
            'nome.required' => "O campo Nome é obrigatório",            
        ]
    );        
        $marca = new marca();
        $marca->marca_nome = $request->input('nome');
        $marca->logo = $request->input('logo');
        $marca->save();

        return redirect()->route('marcas')
            ->with('success', 'Marca cadastrada com sucesso!');
    }

    public function buscarMarca($id){               
        $marcas= marca::Find($id);            
            
        if(!$marcas)
            echo "Marca não encontrada"; 

        return view('marca.alterar', compact('marcas'));
    }

    public function alterarMarca(Request $request){        
        $marca = marca::find($request->input('id'));
        $marca->update($request->all());

        return redirect()->route('marcas')
            ->with('success', 'Marca alterada com sucesso!');

    }

    public function deletarMarca($id){        
        $marca = marca::find($id);
        $marca->delete();

        return redirect()->route('marcas');
    }
}
