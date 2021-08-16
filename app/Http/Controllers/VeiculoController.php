<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVeiculoRequest;
use App\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VeiculoController extends Controller
{
    public function create()
    {
        return view('admin.veiculo.registroVeiculo');
    }

    public function index()
    {
        $veiculos = DB::table('veiculos')->orderByDesc('statusVeiculo') ->paginate(10);
        return view('admin.veiculo.buscarVeiculo', compact('veiculos'));
    }

    public function store(StoreVeiculoRequest $request)
    {
        $min = 1000;
        $max = 900000;

        do{
            $codigo = rand($min, $max); //gerar um número entre $min e $max;
            $codigoExiste = Veiculo::where('codigoVeiculo', $codigo)->first();
        }while($codigoExiste !== null);

        $veiculo = Veiculo::create([
            'statusVeiculo' => '1',
            'codigoVeiculo' => $codigo,
            'crvVeiculo' => $request->crvVeiculo,
            'renavanVeiculo' => $request->renavanVeiculo,
            'placaVeiculo' => $request->placaVeiculo,
            'chassiVeiculo' => $request->chassiVeiculo,
            'marcaVeiculo' => $request->marcaVeiculo,
            'modeloVeiculo' => $request->modeloVeiculo,
            'anoFabVeiculo' => $request->anoFabVeiculo,
            'anoModVeiculo' => $request->anoModVeiculo,
            'corVeiculo' => $request->corVeiculo,
            'observacaoVeiculo' => $request->observacaoVeiculo,
        ]);

        if ($veiculo) {
            return redirect()->route('painel');
        }else{
            return redirect()->route('createVeiculo');
        }
    }

    public function show($codigo){
        //PESQUISA E MOSTRA O PRIMEIRO CLIENTE
        $veiculo = Veiculo::where('codigoVeiculo', '=', $codigo)->first();
        if ($veiculo) {
            //SE ENCONTRAR
            return view('admin.veiculo.mostrarVeiculo', compact('veiculo'));
        }else{
            //SE NÃO ENCONTRAR
            return redirect()->route('veiculos');
        }
    }

    public function edit(StoreVeiculoRequest $request, $codigo){

        $veiculo = Veiculo::where('codigoVeiculo', $codigo)->where('statusVeiculo', 1);

        if ($veiculo) {
            $veiculo->update([
                'crvVeiculo' => $request->crvVeiculo,
                'renavanVeiculo' => $request->renavanVeiculo,
                'placaVeiculo' => $request->placaVeiculo,
                'chassiVeiculo' => $request->chassiVeiculo,
                'marcaVeiculo' => $request->marcaVeiculo,
                'modeloVeiculo' => $request->modeloVeiculo,
                'anoFabVeiculo' => $request->anoFabVeiculo,
                'anoModVeiculo' => $request->anoModVeiculo,
                'corVeiculo' => $request->corVeiculo,
                'observacaoVeiculo' => $request->observacaoVeiculo,
            ]);
            return redirect()->route('veiculos');
        }
    }

    public function search(Request $request){
        //$filters = $request->all(); (Pega todos os dados)
        $filters = $request->except('_token');
        $veiculos = Veiculo::where('codigoVeiculo', 'LIKE', "%{$request->consultaVeiculo}%")->orWhere('modeloVeiculo', 'LIKE', "%{$request->consultaVeiculo}%")->orderBy('modeloVeiculo')->paginate(3);

        if ($veiculos->isEmpty()) {
            return redirect()->back()->with('error', 'Veículo Não Encontrado!');
        }else{
            return view('admin.veiculo.buscarVeiculo', compact('veiculos', 'filters'));
        }
    }

    public function destroy($codigo){
        $veiculo = Veiculo::where('codigoVeiculo', '=', $codigo)->first();
        $veiculo->delete();
        return redirect()->route('painel');
    }
}
