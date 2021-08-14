<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRelatorioRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class RelatorioController extends Controller
{
    public function relatorio(){
        return view('admin.relatorio.gerarRelatorio');
    }

    public function gererRelatorioVenda(Request $request){
        
        $dataInicial = str_replace("/", "-", $request->dataInicialVenda);
        $dataInicial = date('Y-m-d', strtotime($dataInicial));

        $dataFinal = str_replace("/", "-", $request->dataFinalVenda);
        $dataFinal = date('Y-m-d', strtotime($dataFinal));

        $relatorios = DB::table('vendas')
            ->join('clientes', 'vendas.cliente_id','=', 'clientes.id')
            ->join('veiculos', 'vendas.veiculo_id', '=', 'veiculos.id')
            ->select('vendas.dataVenda', 'veiculos.modeloVeiculo', 'veiculos.placaVeiculo', 'clientes.nomeCliente', 'vendas.valorVenda')
            ->where('dataVenda', '>=', $dataInicial)
            ->where('dataVenda', '<=', $dataFinal)
            ->get();

        $relatorioPDF = PDF::loadView('admin.pdf.relatorioVendaPDF', ['relatorios' => $relatorios]);
        return $relatorioPDF->setPaper('a4')->stream('relatório.pdf');
        
    }

    public function gererRelatorioEntrada(Request $request){
        
        $dataInicial = str_replace("/", "-", $request->dataInicialEntrada);
        $dataInicial = date('Y-m-d', strtotime($dataInicial));

        $dataFinal = str_replace("/", "-", $request->dataFinalEntrada);
        $dataFinal = date('Y-m-d', strtotime($dataFinal));

        $relatorios = DB::table('entradas')
            ->where('dataEntrada', '>=', $dataInicial)
            ->where('dataEntrada', '<=', $dataFinal)
            ->get();

        $relatorioPDF = PDF::loadView('admin.pdf.relatorioEntradaPDF', ['relatorios' => $relatorios]);
        return $relatorioPDF->setPaper('a4')->stream('relatório.pdf');
        
    }

    public function gererRelatorioSaida(Request $request){
        
        $dataInicial = str_replace("/", "-", $request->dataInicialSaida);
        $dataInicial = date('Y-m-d', strtotime($dataInicial));

        $dataFinal = str_replace("/", "-", $request->dataFinalSaida);
        $dataFinal = date('Y-m-d', strtotime($dataFinal));

        $relatorios = DB::table('saidas')
            ->where('dataSaida', '>=', $dataInicial)
            ->where('dataSaida', '<=', $dataFinal)
            ->get();

        $relatorioPDF = PDF::loadView('admin.pdf.relatorioSaidaPDF', ['relatorios' => $relatorios]);
        return $relatorioPDF->setPaper('a4')->stream('relatório.pdf');
        
    }
}
