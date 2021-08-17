<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\StoreClienteRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function create()
    {
        return view('admin.cliente.registroCliente');
    }

    public function store(StoreClienteRequest $request){

        $codigo = $request->codigoCliente;
        $cpf = $request->cpfCliente;

        $codigoExiste = Cliente::where('codigoCliente', $codigo)->first();

        if ($codigoExiste) {
            $msg = "Código do cliente ja existe!";
            return redirect()->back()->withErrors( $msg )->withInput();
        }else{
            if ($cpf != null) {
                $cpfExiste = Cliente::where('cpfCliente', $cpf)->first();
                if ($cpfExiste) {
                    $msg = "CPF do cliente ja existe!";
                    return redirect()->back()->withErrors( $msg )->withInput();
                }else{
                    $cliente = Cliente::create([
                        'codigoCliente' => $request->codigoCliente,
                        'cpfCliente' => $request->cpfCliente,
                        'rgCliente' => $request->rgCliente,
                        'nomeCliente' => mb_strtoupper($request->nomeCliente, 'UTF-8'),
                        'telefoneCliente' => $request->telefoneCliente,
                        'celularCliente' => $request->celularCliente,
                        'emailCliente' => $request->emailCliente,
                        'estadoCliente' => mb_strtoupper($request->estadoCliente, 'UTF-8'),
                        'cidadeCliente' => mb_strtoupper($request->cidadeCliente, 'UTF-8'),
                        'bairroCliente' => mb_strtoupper($request->bairroCliente, 'UTF-8'),
                        'logradouroCliente' => mb_strtoupper($request->logradouroCliente, 'UTF-8'),
                        'numeroCliente' => $request->numeroCliente,
                        'observacaoCliente' => $request->observacaoCliente,
                    ]);
                    return redirect()->route('painel');
                }
            }else{
                $cliente = Cliente::create([
                    'codigoCliente' => $request->codigoCliente,
                    'cpfCliente' => $request->cpfCliente,
                    'rgCliente' => $request->rgCliente,
                    'nomeCliente' => mb_strtoupper($request->nomeCliente, 'UTF-8'),
                    'telefoneCliente' => $request->telefoneCliente,
                    'celularCliente' => $request->celularCliente,
                    'emailCliente' => $request->emailCliente,
                    'estadoCliente' => mb_strtoupper($request->estadoCliente, 'UTF-8'),
                    'cidadeCliente' => mb_strtoupper($request->cidadeCliente, 'UTF-8'),
                    'bairroCliente' => mb_strtoupper($request->bairroCliente, 'UTF-8'),
                    'logradouroCliente' => mb_strtoupper($request->logradouroCliente, 'UTF-8'),
                    'numeroCliente' => $request->numeroCliente,
                    'observacaoCliente' => $request->observacaoCliente,
                ]);
                return redirect()->route('painel');
            }
        }
    }

    public function index(){
        $clientes = DB::table('clientes')->orderBy('nomeCliente')->paginate(7);
        return view('admin.cliente.buscarCliente', compact('clientes'));
    }

    public function show($codigo){
        //PESQUISA E MOSTRA Q PRIMEIRO CLIENTE
        $cliente = Cliente::where('codigoCliente', '=', $codigo)->first();
        if ($cliente) {
            //SE ENCONTRAR
            return view('admin.cliente.mostrarCliente', compact('cliente'));
        }else{
            //SE NÃO ENCONTRAR
            return redirect()->route('clientes');
        }
    }

    public function edit(Request $request, $codigo){
        
        $cliente = Cliente::where('codigoCliente', $codigo)->first();
        
        if($cliente){
            $cliente->update([
                'rgCliente' => $request->rgCliente,
                'nomeCliente' => mb_strtoupper($request->nomeCliente, 'UTF-8'),
                'telefoneCliente' => $request->telefoneCliente,
                'celularCliente' => $request->celularCliente,
                'emailCliente' => $request->emailCliente,
                'estadoCliente' => mb_strtoupper($request->estadoCliente, 'UTF-8'),
                'cidadeCliente' => mb_strtoupper($request->cidadeCliente, 'UTF-8'),
                'bairroCliente' => mb_strtoupper($request->bairroCliente, 'UTF-8'),
                'logradouroCliente' => mb_strtoupper($request->logradouroCliente, 'UTF-8'),
                'numeroCliente' => $request->numeroCliente,
                'observacaoCliente' => $request->observacaoCliente,
            ]);
            return redirect()->route('clientes');
        }
    }

    public function search(Request $request)
    {

        $clientes = Cliente::where('nomeCliente', 'LIKE', "%{$request->consultaCliente}%")->orWhere('codigoCliente', 'LIKE', "%{$request->consultaCliente}%")->orWhere('cpfCliente', 'LIKE', "%{$request->consultaCliente}%")->orderBy('nomeCliente')->paginate(7);
        
        if ($clientes->isEmpty()) {
            return redirect()->back()->with('error', 'Cliente Não Encontrado!');
        }else{
            return view('admin.cliente.buscarCliente', compact('clientes'));
        }
    }

    public function destroy($codigo){
        $cliente = Cliente::where('codigoCliente', '=', $codigo)->first();
        $cliente->delete();
        return redirect()->route('painel');
    }
}
