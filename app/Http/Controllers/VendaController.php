<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\StoreVendaRequest;
use App\Veiculo;
use App\Venda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function create(){
        //BUSCANDO VEICULO PARA MOSTRAR NO SELECT DA VIEW
        $veiculos = new Veiculo();
        $veiculos = $veiculos->select('id', 'modeloVeiculo', 'placaVeiculo')->whereIn('statusVeiculo', [1])->get();

        //BUSCANDO CLIENTE PARA MOSTRAR NO SELECT DA VIEW
        $clientes = new Cliente();
        $clientes = $clientes->select('id','nomeCliente')->orderBy('nomeCliente')->get();

        return view('admin.venda.registrarVenda', compact('veiculos', 'clientes'));
    }
 
    public function index(){
        $vendas = DB::table('vendas')
                ->join('clientes', 'vendas.cliente_id','=', 'clientes.id')
                ->join('veiculos', 'vendas.veiculo_id', '=', 'veiculos.id')
                ->select('vendas.codigoVenda', 'clientes.nomeCliente', 'veiculos.modeloVeiculo', 'veiculos.placaVeiculo', 'vendas.valorVenda', 'vendas.dataVenda')
                ->paginate(7);

        return view('admin.venda.buscarVenda', compact('vendas'));
    }

    public function store(StoreVendaRequest $request){
        
        $dataVenda = str_replace("/", "-", $request->dataVenda);
        $dataVenda = date('Y-m-d', strtotime($dataVenda));

        $min = 10;
        $max = 900000;

        do{
            $codigo = rand($min, $max); //gerar um número entre $min e $max;
            $codigoExiste = Venda::where('codigoVenda', $codigo)->first();
        }while($codigoExiste !== null);

        $venda = Venda::create([
            'codigoVenda' => $codigo,
            'veiculo_id' => $request->codigoVeiculo,
            'cliente_id' => $request->codigoCliente,
            'valorVenda' => $request->valorVenda,
            'dataVenda' => $dataVenda,
            'observacaoVenda' => $request->observacaoVenda,
        ]);

        $editStatusVeiculo = Veiculo::where('id',  $request->codigoVeiculo)->first();
        if ($editStatusVeiculo) {
            $editStatusVeiculo->update([
                //status 0 = veículo vendido
                //status 1 = veículo disponível
                'statusVeiculo' => '0',
            ]);
        }
        if ($venda) {
            return redirect()->route('painel');
        }else{
            return redirect()->route('createVenda');
        }
    }

    public function search(Request $request)
    {
        $vendas = Venda::join('clientes', 'vendas.cliente_id','=', 'clientes.id')
                ->join('veiculos', 'vendas.veiculo_id', '=', 'veiculos.id')
                ->select('vendas.codigoVenda', 'clientes.nomeCliente', 'veiculos.modeloVeiculo', 'veiculos.placaVeiculo', 'vendas.valorVenda', 'vendas.dataVenda')
                ->where('veiculos.placaVeiculo', 'LIKE', "%{$request->consultaVenda}%")
                ->paginate(7);

        if ($vendas->isEmpty()) {
            return redirect()->back()->with('error', 'Venda Não Encontrada!');
        }else{
            return view('admin.venda.buscarVenda', compact('vendas'));
        }
    }

    public function show($codigo){
        //PESQUISA E MOSTRA A PRIMEIRA VENDA
        $venda = DB::table('vendas')
        ->join('clientes', 'vendas.cliente_id','=', 'clientes.id')
        ->join('veiculos', 'vendas.veiculo_id', '=', 'veiculos.id')
        ->select('vendas.codigoVenda', 'clientes.nomeCliente', 'veiculos.modeloVeiculo', 'veiculos.placaVeiculo', 'vendas.valorVenda', 'vendas.dataVenda', 'vendas.observacaoVenda')
        ->where('vendas.codigoVenda', '=', $codigo)
        ->first();
        
        if ($venda) {
            //SE ENCONTRAR
            return view('admin.venda.mostrarVenda', compact('venda'));
        }else{
            //SE NÃO ENCONTRAR
            return redirect()->route('vendas');
        }
    }

    public function edit(Request $request, $codigo){

        $dataVenda = str_replace("/", "-", $request->dataVenda);
        $dataVenda = date('Y-m-d', strtotime($dataVenda));

        $venda = Venda::where('codigoVenda', '=', $codigo)->first();

        if ($venda) {
            $venda->update([
                'valorVenda' => $request->valorVenda,
                'dataVenda' => $dataVenda,
                'observacaoVenda' => $request->observacaoVenda,
            ]);
            return redirect()->route('vendas');
        }
    }

    public function destroy($codigo){
        $venda = Venda::where('codigoVenda', '=', $codigo)->first();
        
        $veiculo = Veiculo::where('id', '=', $venda->veiculo_id)->first();

        if ($veiculo) {
            $veiculo->update([
                'statusVeiculo' => '1',
            ]);
        }
        $venda->delete();
        return redirect()->route('painel');
    }
}
