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
            'cor'=> 'required|min:3|unique:cores',            
        ],
        [
            'cor.required' => "O nome da cor é obrigatório",
            'cor.min' => "O nome da cor deve ter no mínimo 3 caracteres", 
            'cor.unique' => "O nome da cor já existe na nossa base de dados",
        ]
    );        
        $cor = new cor();
        $cor->cor = $request->input('cor');        
        $cor->save();

        return redirect()->route('cores')
            ->with('success', 'Cor cadastrada com sucesso!');
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

        return redirect()->route('cores')
            ->with('success', 'Cor alterada com sucesso!');

    }

    public function deletarCor($id){        
        $cor = cor::find($id);
        $cor->delete();

        return redirect()->route('cores');
    }
}
