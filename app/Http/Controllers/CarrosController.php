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

    public function home(){        
        $carros= Carros::all();
        $modelos=modelo::all();
        $marcas= marca::all();

        return view('carros.home', compact('carros', 'modelos', 'marcas'));
    }
    
public function searchCarro(Request $request){        
    $modeloFiltro = $request->input('modelo');
        
    if($modeloFiltro) {
        $carros = Carros::whereHas('modelo', function($query) use ($modeloFiltro) {
            $query->where('modelo', 'like', '%' . $modeloFiltro . '%');
        })->with('modelo', 'marca', 'cor')->get();
    } else {        
        $carros = collect();
    }
    
    $modelos = modelo::all();
    $marcas = marca::all();

    return view('carros.index', compact('carros', 'modelos', 'marcas'));
}

    public function carrosPorModelo($modeloId){
        $modelo = modelo::findOrFail($modeloId);
        $carros = Carros::where('modelo_id', $modeloId)->with('modelo', 'marca', 'cor')->get();
        $modelos = modelo::all();
        $marcas = marca::all();

        return view('carros.index', compact('carros', 'modelos', 'marcas', 'modelo'));
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


    public function detalhes($id)
    {
        $carro = Carros::with('modelo')->findOrFail($id);
        $modelo= modelo::all();
        $cor= cor::all();


        return view('carros.detalhes', compact('carro', 'modelo', 'cor'));
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
    ],
    [
        'marca_id.required' => 'A marca é obrigatória.',
        'marca_id.exists' => 'A marca selecionada é inválida.',
        'modelo_id.required' => 'O modelo é obrigatório.',
        'modelo_id.exists' => 'O modelo selecionado é inválido.',
        'cor_id.required' => 'A cor é obrigatória.',
        'cor_id.exists' => 'A cor selecionada é inválida.',
        'preco.required' => 'O preço é obrigatório.',
        'preco.numeric' => 'O preço deve ser um número válido.',
        'preco.min' => 'O preço deve ser maior ou igual a zero.',
        'km.required' => 'A quilometragem é obrigatória.',
        'km.numeric' => 'A quilometragem deve ser um número válido.',
        'km.min' => 'A quilometragem deve ser maior ou igual a zero.',
        'ano_fabricacao.required' => 'O ano de fabricação é obrigatório.',
        'ano_fabricacao.min' => 'O ano de fabricação deve ter pelo menos 4 caracteres.',
    ]


);
    
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

        return redirect()->route('carros.inicio')
            ->with('success', 'Carro alterado com sucesso!');

    }

    public function deletarCarros($id){        
        $carro = Carros::find($id);
        $carro->delete();

        return redirect()->route('carros.inicio');
    }  
        

}
