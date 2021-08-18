<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Administradores</title>
    <link rel="icon"  type="image/png"  href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/style.css')}}">
</head>
<body style="background-image:url({{asset('images/bg.png')}}); background-size: 1400px 800px;">
    <x-navbar/>
    <div class="container card bg-redCard mt-5">
        <div class="labelCard">
            <h4>Cadastro de Usuários</h4>
        </div>
        <hr class="bg-white">
        <form method="POST" action="{{route('storeAdmin')}}" autocomplete="off">
            @csrf
            <div class="form-row mt-4">
                <div class="col-md-2">
                    <fieldset disabled>
                        <label class="labelCard" for="codigoAdmin">Código:</label>
                        <input type="text" class="form-control form-control-sm" id="codigoAdmin" name="codigoAdmin" placeholder="CÓDIGO">
                    </fieldset>
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="cpfAdministrador">CPF*:</label>
                    <input type="text" class="form-control form-control-sm  @error('cpfAdministrador') is-invalid @enderror" id="cpfAdministrador" name="cpfAdministrador" placeholder="CPF" value= "{{old('cpfAdministrador')}}">
                    @error('cpfAdministrador')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="nomeAdministrador">Nome*:</label>
                    <input type="text" class="form-control form-control-sm @error('nomeAdministrador') is-invalid @enderror" id="nomeAdministrador" name="nomeAdministrador" placeholder="Somente o primeiro nome" value= "{{old('nomeAdministrador')}}">
                    @error('nomeAdministrador')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-3">
                    <fieldset disabled>
                        <label class="labelCard" for="password">Senha:</label>
                        <input type="text" class="form-control form-control-sm" id="password" name="password" placeholder="********">
                    </fieldset>
                </div>
            </div>                   

            <div class="form-row mt-3 justify-content-center">
                <div class="mb-2 mr-2">
                    <button type="submit" class="btn btn-success btn-sm"> <span class="fas fa-save"></span> Salvar</button>
                </div>
                <div class="mb-2 mr-2">
                    <a class="btn btn-secondary btn-sm" href=""><span class="fas fa-eraser"></span> Limpar</a>
                </div>
                <div class="mb-2 mr-2">
                    <a href="{{route('painel')}}" class="btn btn-danger btn-sm w-100"> <span class="fas fa-eraser"></span> Cancelar</a>
                </div>
            </div>
        </form>    
    </div>
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>
</body>
</html>