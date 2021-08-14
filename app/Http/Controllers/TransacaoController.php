<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransferenciaRequest;
use App\Http\Requests\StoreComunicadoRequest;
use App\Transferencia;
use App\Comunicado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransacaoController extends Controller
{
    public function createTransferencia(){
         return view('admin.transferencia.registroTransferencia');
    }

    public function createComunicado(){
        return view('admin.comunicado.registroComunicado');
    }

    public function indexTransferencia(){
        $transferencias = DB::table('transferencias')->orderBy('dataDespachante')->paginate(7);
        return view('admin.transferencia.buscarTransferencia', compact('transferencias'));
    }

    public function indexComunicados(){
        $comunicados = DB::table('comunicados')->orderBy('dataEnvio')->paginate(7);
        return view('admin.comunicado.buscarComunicado', compact('comunicados'));
    }

    public function storeTransferencia(StoreTransferenciaRequest $request){

        if ($request->dataRecibo != null) {
            $dataRecibo = str_replace("/", "-", $request->dataRecibo);
            $dataRecibo = date('Y-m-d', strtotime($dataRecibo));
        }else{
            $dataRecibo = null;
        }

        $dataDespachante = str_replace("/", "-", $request->dataDespachante);
        $dataDespachante = date('Y-m-d', strtotime($dataDespachante));

        $min = 100;
        $max = 900000;

        do{
            $codigo = rand($min, $max);
            $codigoExiste = Transferencia::where('codigoTransferencia', $codigo)->first();
        }while($codigoExiste !== null);

        $transferencia = Transferencia::create([
            'codigoTransferencia' => $codigo,
            'nomePropAtual' => $request->nomePropAtual,
            'cpfPropAtual' => $request->cpfPropAtual,
            'enderecoPropAtual' => $request->enderecoPropAtual,
            'telefonePropAtual' => $request->telefonePropAtual,
            'nomePropAntigo' => $request->nomePropAntigo,
            'enderecoPropAntigo' => $request->enderecoPropAntigo,
            'dataRecibo' => $dataRecibo,
            'dataDespachante' => $dataDespachante,
            'placaVeiculo' => $request->placaVeiculo,
            'renavamVeiculo' => $request->renavamVeiculo,
            'modeloVeiculo' => $request->modeloVeiculo,
            'valorVeiculo' => $request->valorVeiculo,
        ]);
        
        if ($transferencia) {
            return redirect()->route('painel');
        }else{
            return redirect()->route('createTransferencia');
        }
    }

    public function storeComunicado(StoreComunicadoRequest $request)
    {

        if ($request->dataRecibo != null) {
            $dataEnvio = str_replace("/", "-", $request->dataEnvio);
            $dataEnvio = date('Y-m-d', strtotime($dataEnvio));
        }else{
            $dataEnvio = null;
        }

        $dataRecibo = str_replace("/", "-", $request->dataRecibo);
        $dataRecibo = date('Y-m-d', strtotime($dataRecibo));

        $min = 100;
        $max = 900000;

        do{
            $codigo = rand($min, $max); //gerar um número entre $min e $max;
            $codigoExiste = Comunicado::where('codigoComunicado', $codigo)->first();
        }while($codigoExiste !== null);

        $transferencia = Comunicado::create([
            'codigoComunicado' => $codigo,
            'nomeComprador' => $request->nomeComprador,
            'nomeVendedor' => $request->nomeVendedor,
            'placaVeiculo' => $request->placaVeiculo,
            'modeloVeiculo' => $request->modeloVeiculo,
            'dataRecibo' => $dataRecibo,
            'dataEnvio' => $dataEnvio,
        ]);
        
        if ($transferencia) {
            return redirect()->route('painel');
        }else{
            return redirect()->route('createComunicado');
        }
    }

    public function searchTransferencia(Request $request){
        
        $transferencias = Transferencia::where('placaVeiculo', 'LIKE', "%{$request->consultaTransferencia}%")->orderBy('dataDespachante')->paginate(7);

        if ($transferencias->isEmpty()) {
            return redirect()->back()->with('error', 'Transfência Não Encontrado!');
        }else{
            return view('admin.veiculo.buscarVeiculo', compact('transferencias'));
        }
    }

    public function searchComunicado(Request $request){
        
        $comunicados = Comunicado::where('codigoComunicado', 'LIKE', "%{$request->consultaComunicado}%")->orWhere('placaVeiculo', 'LIKE', "%{$request->placaVeiculo}%")->orderBy('dataEnvio')->paginate(7);

        if ($comunicados->isEmpty()) {
            return redirect()->back()->with('error', 'Comunicado Não Encontrado!');
        }else{
            return view('admin.comunicado.buscarComunicado', compact('comunicados'));
        }
    }

    public function showTransferencia($codigo){
        
        $transferencia = Transferencia::where('codigoTransferencia', '=', $codigo)->first();

        if ($transferencia) {
            return view('admin.transferencia.mostrarTransferencia', compact('transferencia'));
        }else{
            return redirect()->route('transferencias');
        }
    }

    public function showComunicado($codigo){

        $comunicado = Comunicado::where('codigoComunicado', '=', $codigo)->first();

        if ($comunicado) {
            return view('admin.comunicado.mostrarComunicado', compact('comunicado'));
        }else{
            return redirect()->route('transferencias');
        }
    }

    public function editTransferencia(StoreTransferenciaRequest $request, $codigo){

        if ($request->dataRecibo != null) {
            $dataRecibo = str_replace("/", "-", $request->dataRecibo);
            $dataRecibo = date('Y-m-d', strtotime($dataRecibo));
        }else{
            $dataRecibo = null;
        }

        $dataDespachante = str_replace("/", "-", $request->dataDespachante);
        $dataDespachante = date('Y-m-d', strtotime($dataDespachante));
        
        $transferencia = Transferencia::where('codigoTransferencia', $codigo)->first();
        
        if($transferencia){
            $transferencia->update([
                'nomePropAtual' => $request->nomePropAtual,
                'cpfPropAtual' => $request->cpfPropAtual,
                'enderecoPropAtual' => $request->enderecoPropAtual,
                'telefonePropAtual' => $request->telefonePropAtual,
                'nomePropAntigo' => $request->nomePropAntigo,
                'enderecoPropAntigo' => $request->enderecoPropAntigo,
                'dataRecibo' => $dataRecibo,
                'dataDespachante' => $dataDespachante,
                'placaVeiculo' => $request->placaVeiculo,
                'renavamVeiculo' => $request->renavamVeiculo,
                'modeloVeiculo' => $request->modeloVeiculo,
                'valorVeiculo' => $request->valorVeiculo,
            ]);
            return redirect()->route('transferencias');
        }
    }

    public function edit(StoreComunicadoRequest $request, $codigo){

        if ($request->dataRecibo != null) {
            $dataEnvio = str_replace("/", "-", $request->dataEnvio);
            $dataEnvio = date('Y-m-d', strtotime($dataEnvio));
        }else{
            $dataEnvio = null;
        }

        $dataRecibo = str_replace("/", "-", $request->dataRecibo);
        $dataRecibo = date('Y-m-d', strtotime($dataRecibo));

        $comunicado = Comunicado::where('codigoComunicado', $codigo)->first();
        
        if($comunicado){
            $comunicado->update([
                'nomeComprador' => $request->nomeComprador,
                'nomeVendedor' => $request->nomeVendedor,
                'placaVeiculo' => $request->placaVeiculo,
                'modeloVeiculo' => $request->modeloVeiculo,
                'dataRecibo' => $dataRecibo,
                'dataEnvio' => $dataEnvio,
            ]);
            return redirect()->route('comunicados');
        }

    }

    public function destroyTransferencia($codigo){
        $transferencia = Transferencia::where('codigoTransferencia', '=', $codigo)->first();
        $transferencia->delete();
        return redirect()->route('painel');
    }

    public function destroyComunicado($codigo){
        $comunicado = Comunicado::where('codigoComunicado', '=', $codigo)->first();
        $comunicado->delete();
        return redirect()->route('painel');
    }

}
