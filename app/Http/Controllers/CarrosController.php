<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carros;
use App\Models\marca;
use App\Models\cor;
use App\Models\modelo;
use Illuminate\Support\Facades\DB;

class CarrosController extends Controller
{

    public function index(){        
        $carros= Carros::all();
        $modelos=modelo::all();
        $marcas= marca::all();

        return view('carros.index', compact('carros', 'modelos', 'marcas'));
    }

    //-----Cadastro de carros

    public function inicio(){
       $carros= Carros::all();
       $marca= marca::all();
       $modelos= modelo::all();
       $cor= cor::all();
       return view('carros.inicio', compact('carros', 'modelos', 'marca', 'cor')); 
    }

    public function incluirCarro(){
       $carros= Carros::all();
       $marca= marca::all();
       $modelos= modelo::all();
       $cor= cor::all();

       return view('carros.cadastrar', compact('carros', 'modelos', 'marca', 'cor')); 
    }

    public function salvarCarros(Request $request)  
    {
    // Validação básica (opcional, mas recomendado)
    $request->validate([
        'marca_id' => 'required|exists:marcas,id',
        'modelo_id' => 'required|exists:modelos,id',
        'cor_id' => 'required|exists:cores,id',
        'preco' => 'required|numeric|min:0',
        'km' => 'required|numeric|min:0',
        'ano_fabricacao' => 'required|min:4',
    ]);
    
    $carro = new Carros();
    $carro->marca_id = $request->input('marca_id');
    $carro->modelo_id = $request->input('modelo_id');
    $carro->cor_id = $request->input('cor_id');
    $carro->preco = $request->input('preco');
    $carro->km = $request->input('km');
    $carro->ano_fabricacao = $request->input('ano_fabricacao');
    $carro->detalhes = $request->input('detalhes');
    $carro->foto1 = $request->input('foto1');
    $carro->foto2 = $request->input('foto2');
    $carro->foto3 = $request->input('foto3');
    $carro->save(); // salva no banco

    return redirect()->route('carros.inicio')
                     ->with('success', 'Carro cadastrado com sucesso!');
}

    public function buscarCarro($id){   
            $carro = Carros::Find($id);
            $marca= marca::all();
            $cor= cor::all();
            $modelo= modelo::all();
            
            if(!$carro)
               echo "Carro não encontrado"; 

            return view('carros.alterar', compact('carro', 'marca', 'cor', 'modelo'));
        }  

    public function alterarCarros(Request $request){        
        $carro = Carros::find($request->input('id'));
        $carro->update($request->all());

        return redirect()->route('carros.inicio');

    }

    public function deletarCarros($id){        
        $carro = Carros::find($id);
        $carro->delete();

        return redirect()->route('carros.inicio');
    }  
        

}
