<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Http\Requests\StoreEntradaRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function create()
    {
         return view('admin.entrada.registrarEntrada');
    }

    public function store(StoreEntradaRequest $request){

        $dataEntrada = str_replace("/", "-", $request->dataEntrada);
        $dataEntrada = date('Y-m-d', strtotime($dataEntrada));

        $min = 1000;
        $max = 900000;

        do{
            $codigo = rand($min, $max); //gerar um número entre $min e $max;
            $codigoExiste = Entrada::where('codigoEntrada', $codigo)->first();
        }while($codigoExiste !== null);

        $entrada = Entrada::create([
            'codigoEntrada' => $codigo,
            'valorEntrada' => $request->valorEntrada,
            'descricaoEntrada' => $request->descricaoEntrada,
            'dataEntrada' => $dataEntrada,
        ]);

        if ($entrada) {
            return redirect()->route('painel');
        }else{
            return redirect()->route('createEntrada');
        }
    }

}
