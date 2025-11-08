<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cor;
use Illuminate\Support\Facades\DB;

class CorController extends Controller
{
    public function cores(Request $req){        
        $cor= cor::all();        
        return view('cor.index', compact('cor'));         
    }

    public function incluirCor(Request $request)  
    {
        return view('cor.cadastrar');             
    }

    public function salvarCor(Request $request)  
    {   
        $validador = $request->validate([
            'nome'=> 'required|min:3',            
        ],
        [
            'nome.required' => "O campo Nome é obrigatório",            
        ]
    );        
        $cor = new cor();
        $cor->cor = $request->input('nome');        
        $cor->save();

        return redirect()->route('cores');
    }

    public function buscarCor($id){               
        $cor= cor::Find($id);            
            
        if(!$cor)
            echo "Cor não encontrada"; 

        return view('cor.alterar', compact('cor'));
    }

    public function alterarCor(Request $request){        
        $cor = cor::find($request->input('id'));
        $cor->update($request->all());

        return redirect()->route('cores');

    }

    public function deletarCor($id){        
        $cor = cor::find($id);
        $cor->delete();

        return redirect()->route('cores');
    }
}
