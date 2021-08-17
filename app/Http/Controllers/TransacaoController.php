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

    public function indexComunicado(){
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
            'nomePropAtual' => mb_strtoupper($request->nomePropAtual, 'UTF-8'),
            'cpfPropAtual' => $request->cpfPropAtual,
            'enderecoPropAtual' => $request->enderecoPropAtual,
            'telefonePropAtual' => $request->telefonePropAtual,
            'nomePropAntigo' => mb_strtoupper($request->nomePropAntigo, 'UTF-8'),
            'enderecoPropAntigo' => $request->enderecoPropAntigo,
            'dataRecibo' => $dataRecibo,
            'dataDespachante' => $dataDespachante,
            'placaVeiculo' => mb_strtoupper($request->placaVeiculo, 'UTF-8'),
            'renavamVeiculo' => $request->renavamVeiculo,
            'modeloVeiculo' => mb_strtoupper($request->modeloVeiculo, 'UTF-8'),
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
            'nomeComprador' => mb_strtoupper($request->nomeComprador, 'UTF-8'),
            'nomeVendedor' => mb_strtoupper($request->nomeVendedor, 'UTF-8'),
            'placaVeiculo' => mb_strtoupper($request->placaVeiculo, 'UTF-8'),
            'modeloVeiculo' => mb_strtoupper($request->modeloVeiculo, 'UTF-8'),
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
            return redirect()->back()->with('error', 'Transfência Não Encontrada!');
        }else{
            return view('admin.veiculo.buscarVeiculo', compact('transferencias'));
        }
    }

    public function searchComunicado(Request $request){
        
        $comunicados = Comunicado::where('placaVeiculo', 'LIKE', "%{$request->consultaComunicado}%")->orderBy('dataEnvio')->paginate(7);

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
                'nomePropAtual' => mb_strtoupper($request->nomePropAtual, 'UTF-8'),
                'cpfPropAtual' => $request->cpfPropAtual,
                'enderecoPropAtual' => $request->enderecoPropAtual,
                'telefonePropAtual' => $request->telefonePropAtual,
                'nomePropAntigo' => mb_strtoupper($request->nomePropAntigo, 'UTF-8'),
                'enderecoPropAntigo' => $request->enderecoPropAntigo,
                'dataRecibo' => $dataRecibo,
                'dataDespachante' => $dataDespachante,
                'placaVeiculo' => mb_strtoupper($request->placaVeiculo, 'UTF-8'),
                'renavamVeiculo' => $request->renavamVeiculo,
                'modeloVeiculo' => mb_strtoupper($request->modeloVeiculo, 'UTF-8'),
                'valorVeiculo' => $request->valorVeiculo,
            ]);
            return redirect()->route('transferencias');
        }
    }

    public function editComunicado(StoreComunicadoRequest $request, $codigo){

        if ($request->dataEnvio != null) {
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
                'nomeComprador' => mb_strtoupper($request->nomeComprador, 'UTF-8'),
                'nomeVendedor' => mb_strtoupper($request->nomeVendedor, 'UTF-8'),
                'placaVeiculo' => mb_strtoupper($request->placaVeiculo, 'UTF-8'),
                'modeloVeiculo' => mb_strtoupper($request->modeloVeiculo, 'UTF-8'),
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
