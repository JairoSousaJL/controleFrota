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

    public function index()
    {
         return view('admin.entrada.buscarEntrada');
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

    public function search(Request $request){

        $entrada = Entrada::where('codigoEntrada', '=', $request->consultaEntrada)->first();

        if (empty($entrada)) {
            return redirect()->back()->with('error', 'Entrada Não Encontrada!');
        }else{
            return view('admin.entrada.mostrarEntrada', compact('entrada'));
        }
    }

    public function edit(Request $request, $codigo){
        
        $dataEntrada = str_replace("/", "-", $request->dataEntrada);
        $dataEntrada = date('Y-m-d', strtotime($dataEntrada));

        $entrada = Entrada::where('codigoEntrada', '=', $codigo)->first();
        
        if ($entrada) {
            $entrada->update([
                'valorEntrada' => $request->valorEntrada,
                'descricaoEntrada' => $request->descricaoEntrada,
                'dataEntrada' => $dataEntrada,
            ]);
            return redirect()->route('painel');
        }
    }

    public function destroy($codigo){
        $entrada = Entrada::where('codigoEntrada', '=', $codigo)->first();
        $entrada->delete();
        return redirect()->route('painel');
    }

}
