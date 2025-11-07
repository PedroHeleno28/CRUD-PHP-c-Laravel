<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carros;
use Illuminate\Support\Facades\DB;

class CarrosController extends Controller
{

    public function index(){
        
        $carros= Carros::all();
        //var_dump($carros);        //Apenas para mostrar os dados
        //compact()                           - Usa somente para o que vem do banco
        return view('carros.index', compact('carros'));
    }

    public function salvarCarros(Request $request)  
    {
        $carro = new Carros();
        $carro->marca = $request->input('marca');   //Para ficar completo, fazer a validação e o redirecionamente de sucesso
        $carro->modelo = $request->input('modelo');
        $carro->cor = $request->input('cor');
        $carro->ano_fabricacao = $request->input('ano_fabricacao');
        $carro->save();

        return redirect()->route('carros.index');

    }

    public function buscarCarro($id){   //o "id" é a chave que passou na rota
            $carro = Carros::Find($id);    //FindOrFail(Procure ou dê o erro), o Find faz a busca direta

            //var_dump($carro);
            if(!$carro)
               echo "Carro não encontrado"; 

            return view('carros.alterar', compact('carro'));
        }  

    public function alterarCarro(Request $request){
        /*
        $carro = Carros::find($request->input('id'));
        $carro->marca = $request->input('marca');
        $carro->modelo = $request->input('modelo');
        $carro->cor = $request->input('cor');
        $carro->ano_fabricacao = $request->input('ano_fabricacao');
        $carro->save();
        */

        //validade
        $carro = Carros::find($request->input('id'));
        $carro->update($request->all());

        return redirect()->route('carros.index');

    }


    public function deletarCarro(Request $req){
        echo 'oi';

        return redirect()->route('carros.index');
    }

}
