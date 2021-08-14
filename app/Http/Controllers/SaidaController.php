<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaidaRequest;
use App\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    public function create(){
        return view('admin.saida.registrarSaida');
    }

    public function store(StoreSaidaRequest $request){

        $dataSaida = str_replace("/", "-", $request->dataSaida);
        $dataSaida = date('Y-m-d', strtotime($dataSaida));

        $min = 1000;
        $max = 100000;
        
        do{
            $codigo = rand($min, $max); //gerar um número entre $min e $max;
            $codigoExiste = Saida::where('codigoSaida', $codigo)->first();
        }while($codigoExiste !== null);

        $entrada = Saida::create([
            'codigoSaida' => $codigo,
            'valorSaida' => $request->valorSaida,
            'descricaoSaida' => $request->descricaoSaida,
            'dataSaida' => $dataSaida,
        ]);

        if ($entrada) {
            return redirect()->route('painel');
        }else{
            return redirect()->route('createSaida');
        }

    }
}
