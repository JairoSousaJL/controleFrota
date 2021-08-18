<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Perfil</title>
    <link rel="icon"  type="image/png"  href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/style.css')}}">
</head>
<body style="background-image:url({{asset('images/bg.png')}}); background-size: 1400px 800px;">
    <x-navbar/>
    <div class="container card bg-redCard mt-5">
        <div class="labelCard">
            <h4>Editar dados</h4>
        </div>
        <form method="POST" action="{{route('editPerfil', $usuario->codigoAdministrador)}}" autocomplete="off">
            @csrf
            @method('put')
            <div class="form-row mt-4">
                <div class="col-md-2">
                    <fieldset disabled>
                        <label class="labelCard" for="cpfAdministrador">CPF:</label>
                    <input type="text" class="form-control form-control-sm" id="cpfAdministrador" name="cpfAdministrador"  value= "{{$usuario->cpfAdministrador}}">
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="user">Usuário*:</label>
                    <input type="text" class="form-control form-control-sm " id="user" name="user" value= "{{$usuario->user}}">
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="nomeAdministrador">Nome*:</label>
                    <input type="text" class="form-control form-control-sm " id="nomeAdministrador" name="nomeAdministrador" value= "{{$usuario->nomeAdministrador}}">
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="senhaAtual">Senha Atual*:</label>
                    <input type="password" class="form-control form-control-sm" id="senhaAtual" name="senhaAtual" placeholder="********">
                </div>
            </div>                   
            <div class="form-row mt-3 justify-content-center">
                <div class="mb-2 mr-2">
                    <button type="submit" class="btn btn-success btn-sm"> <span class="fas fa-save"></span> Editar</button>
                </div>
                <div class="mb-2 mr-2">
                    <a class="btn btn-secondary btn-sm" href=""><span class="fas fa-eraser"></span> Limpar</a>
                </div>
                <div class="mb-2 mr-2">
                    <a type="button" class="btn btn-danger btn-sm" href="{{route('painel')}}"><span class="fas fa-ban"></span> Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <div class="container card bg-redCard mt-3">
        <div class="labelCard">
            <h4>Editar Senha</h4>
        </div>
        <form method="POST" action="{{route('editSenha', $usuario->codigoAdministrador)}}" autocomplete="off">
            @csrf
            @method('put')
            <div class="form-row mt-4">
                <div class="col-md-4">
                    <label class="labelCard" for="novaSenha">Nova Senha*:</label>
                    <input type="password" class="form-control form-control-sm" id="novaSenha" name="novaSenha" placeholder="********">
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="confirmarNovaSenha">Confirmar Nova Senha*:</label>
                    <input type="password" class="form-control form-control-sm" id="confirmarNovaSenha" name="confirmarNovaSenha" placeholder="********">
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="password">Senha Atual*:</label>
                    <input type="password" class="form-control form-control-sm" id="senhaAtual" name="senhaAtual" placeholder="********">
                </div>
            </div>                   
            <div class="form-row mt-3 justify-content-center">
                <div class="mb-2 mr-2">
                    <button type="submit" class="btn btn-success btn-sm"> <span class="fas fa-save"></span> Editar</button>
                </div>
                <div class="mb-2 mr-2">
                    <a class="btn btn-secondary btn-sm" href=""><span class="fas fa-eraser"></span> Limpar</a>
                </div>
                <div class="mb-2 mr-2">
                    <a type="button" class="btn btn-danger btn-sm" href="{{route('painel')}}"><span class="fas fa-ban"></span> Cancelar</a>
                </div>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger mx-auto mt-3">
                @foreach ($errors->all() as $error)
                    <label>{{$error}}</label> 
                @endforeach
            </div>
        @endif
    </div>
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>
</body>
</html>