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

    public function index()
    {
         return view('admin.saida.buscarSaida');
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

    public function search(Request $request){

        $saida = Saida::where('codigoSaida', '=', $request->consultaSaida)->first();

        if (empty($saida)) {
            return redirect()->back()->with('error', 'Saída Não Encontrada!');
        }else{
            return view('admin.saida.mostrarSaida', compact('saida'));
        }
    }

    public function edit(Request $request, $codigo){
        
        $dataSaida = str_replace("/", "-", $request->dataSaida);
        $dataSaida = date('Y-m-d', strtotime($dataSaida));

        $saida = Saida::where('codigoSaida', '=', $codigo)->first();
        
        if ($saida) {
            $saida->update([
                'valorSaida' => $request->valorSaida,
                'descricaoSaida' => $request->descricaoSaida,
                'dataSaida' => $dataSaida,
            ]);
            return redirect()->route('painel');
        }
    }

    public function destroy($codigo){
        $saida = Saida::where('codigoSaida', '=', $codigo)->first();
        $saida->delete();
        return redirect()->route('painel');
    }

}
