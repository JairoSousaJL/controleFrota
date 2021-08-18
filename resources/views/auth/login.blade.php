<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon"  type="image/png"  href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/style.css')}}">
</head>
<body style="background-image:url({{asset('images/bg.png')}}); background-size: 1400px 800px;">
    <div class="container mt-5">
        <div class="alert mx-auto mb-3 bg-darkRed text-white" style="max-width: 30rem;">
            <div align="center">
                <span class="fas fa-car"></span>
                CONTROLE DE FROTA
            </div>
          </div>
        <div class="card mx-auto border-darkRed" style="max-width: 30rem;">
            <div class="card-header bg-darkRed text-white">
                LOGIN
            </div>
            <div class="card-body bg-red">
                <form method="POST" action="{{route('postLogin')}}" autocomplete="off">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-user"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" name="user" id="user" placeholder="Usuário" value="08081048618">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-lock"></span></span>
                        </div>
                        <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Senha" value="12345678">
                    </div>
                    <div align="center">
                        <button type="submit" class="btn bg-darkRed col-md-4 text-white"><span class="fas fa-sign-in-alt"></span>
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
          </div>
        @if ($errors->any())
            <div class="alert alert-danger mx-auto mt-3" style="max-width: 30rem;">
                @foreach ($errors->all() as $error)
                    <label>{{$error}}</label> 
                @endforeach
            </div>
        @endif
    </div>
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
</body>
</html>