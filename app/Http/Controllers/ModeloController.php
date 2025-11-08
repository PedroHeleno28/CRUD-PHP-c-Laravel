<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelo;
use App\Models\marca;
use Illuminate\Support\Facades\DB;

class ModeloController extends Controller
{
    public function modelo(Request $req){        
        $modelo= modelo::all();
        $marca= marca::all();
        return view('modelo.index', compact('modelo', 'marca'));         
    }

    public function incluirModelo(Request $request)  
    {
        $modelo= modelo::all();
        $marca= marca::all();
        return view('modelo.cadastrar',compact('modelo', 'marca') );             
    }

    public function salvarModelo(Request $request)  
    {   
        $validador = $request->validate([
            'modelo'=> 'required|min:2',            
        ],
        [
            'modelo.required' => "O campo Nome é obrigatório",            
        ]
    );        
        $modelo = new modelo();
        $modelo->modelo = $request->input('modelo');
        $modelo->marca_id = $request->input('marca_id');
        $modelo->save();

        return redirect()->route('modelos');
    }

    public function buscarModelo($id){               
        $modelo= modelo::Find($id);
        $marca= marca::all();
            
        if(!$modelo)
            echo "Modelo não encontrado"; 

        return view('modelo.alterar', compact('modelo', 'marca'));
    }

    public function alterarModelo(Request $request){        
        $modelo = modelo::find($request->input('id'));        
        $modelo->update([
            'modelo' => $request->input('modelo'),
            'marca_id' => $request->input('marca_id')]);

        return redirect()->route('modelos');

    }

    public function deletarModelo($id){        
        $modelo = modelo::find($id);
        $modelo->delete();

        return redirect()->route('modelos');
    }
}
