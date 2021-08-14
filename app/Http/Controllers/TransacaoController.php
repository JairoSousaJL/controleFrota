<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransferenciaRequest;
use App\Http\Requests\StoreComunicadoRequest;
use App\Transferencia;
use App\Comunicado;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    public function createTransferencia(){
         return view('admin.transferencia.registroTransferencia');
    }

    public function createComunicado(){
        return view('admin.comunicado.registroComunicado');
    }

    public function storeTransferencia(StoreTransferenciaRequest $request){
        $dataRecibo = str_replace("/", "-", $request->dataRecibo);
        $dataRecibo = date('Y-m-d', strtotime($dataRecibo));

        $dataDespachante = str_replace("/", "-", $request->dataDespachante);
       $dataDespachante = date('Y-m-d', strtotime($dataDespachante));

        $min = 100;
        $max = 900000;

        do{
            $codigo = rand($min, $max); //gerar um número entre $min e $max;
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
        $dataRecibo = str_replace("/", "-", $request->dataRecibo);
        $dataRecibo = date('Y-m-d', strtotime($dataRecibo));

        $dataEnvio = str_replace("/", "-", $request->dataEnvio);
        $dataEnvio = date('Y-m-d', strtotime($dataEnvio));

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

}
