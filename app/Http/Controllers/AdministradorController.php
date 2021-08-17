<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;
use App\Administrador;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    public function painel()
    {
        return view('painel');
    }
    
    public function create(){
        return view('admin.usuario.registroUsuario');
    }

    public function showPerfil($id)
    {
        $usuario = Administrador::where('id', '=', $id)->first();
        return view('admin.usuario.editarPerfil', compact('usuario'));
    }

    public function store(StoreUsuarioRequest $request)
    {
        $min = 12345;
        $max = 23456;
         
        do{
            $codigo = rand($min, $max); //gerar um número entre $min e $max;
            $codigoExiste = Administrador::where('codigoAdministrador', $codigo)->first();
        }while($codigoExiste !== null);

        $admin = Administrador::create([
            'codigoAdministrador' => $codigo,
            'cpfAdministrador' => $request->cpfAdministrador,
            'nomeAdministrador' => mb_strtoupper($request->nomeAdministrador, 'UTF-8'),
            'user' => $request->cpfAdministrador,
            'password' => Hash::make('12345678'),
            'statusAdministrador' => true,
        ]);

        if ($admin) {
            return redirect()->route('painel');
        }else{
            return redirect()->route('createUsuario');
        }
        
    }

    public function index(){
        $usuarios = DB::table('administradors')->paginate(7);
        return view('admin.usuario.buscarUsuario', compact('usuarios'));
    }

    public function editPerfil(Request $request, $codigo)
    {
        
        $usuario = Administrador::where('codigoAdministrador', '=', $codigo)->first();
        $senha = $usuario->password;

        try {
            if($usuario){
                if (Hash::check($request->senhaAtual, $senha)) {
                    $usuario->update([
                        'user' => $request->user,
                        'nomeAdministrador' => mb_strtoupper($request->nomeAdministrador, 'UTF-8'),
                    ]);
                    return redirect()->route('logoutAdmin');
                }else{
                    $msg = "Senha atual incorreta!";
                    return redirect()->back()->withErrors( $msg )->withInput();
                }
            }else{
                $msg = "Perfil não encontrado!";
                return redirect()->back()->withErrors( $msg )->withInput();
            }
        } catch (\Exception $th) {
            $msg = "Ocorreu um erro. Revise seus dados!";
            return redirect()->back()->withErrors( $msg )->withInput();
        }

        
    }

    public function editSenha(Request $request, $codigo)
    {
        
        $usuario = Administrador::where('codigoAdministrador', '=', $codigo)->first();
        $senha = $usuario->password;

        if (is_null($request->novaSenha) || is_null($request->confirmarNovaSenha)) {
            $msg = "Preencha todos os campos para alterar a senha!";
            return redirect()->back()->withErrors( $msg )->withInput();
        }else{
            if (!strcmp($request->novaSenha, $request->confirmarNovaSenha)) {
                //IGUAIS
                try {
                    if($usuario){
                        if (Hash::check($request->senhaAtual, $senha)) {
                            $usuario->update([
                                'password' => Hash::make($request->novaSenha),
                            ]);
                            return redirect()->route('logoutAdmin');
                        }else{
                            $msg = "Senha atual incorreta!";
                            return redirect()->back()->withErrors( $msg )->withInput();
                        }
                    }else{
                        $msg = "Perfil não encontrado!";
                        return redirect()->back()->withErrors( $msg )->withInput();
                    }
                } catch (\Exception $th) {
                    $msg = "Ocorreu um erro. Revise seus dados!";
                    return redirect()->back()->withErrors( $msg )->withInput();
                }
            }else{
                //DIFERENTES
                $msg = "Nova Senha e Senha de Confirmação não são iguais!";
                return redirect()->back()->withErrors( $msg )->withInput();
            } 
        }       
    }
}
