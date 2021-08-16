<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesquisar Entrada</title>
    <link rel="icon"  type="image/png"  href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/style.css')}}">
</head>
<body style="background-image:url({{asset('images/bg.png')}}); background-size: 1400px 800px;">
    <x-navbar/>
    <div class="container card bg-redCard mt-5">
        <div class="text-white">
            <h4>
                Pesquisar Entrada
            </h4>
        </div>
        <hr class="bg-white">
        <form action="{{route('pesquisarEntradas')}}" method="POST" autocomplete="off">
            @csrf
            <div class="form-row mt-2">
                <div class="col-md-2">
                    <label class="labelCard" for="consultaEntrada">Código da Entrada:</label>
                </div>
                <div class="mb-2 col-md-6">
                    <input type="text" class="form-control form-control-sm" id="consultaEntrada" name="consultaEntrada" placeholder="Código da Entrada" required>
                </div>
                <div class="mb-2 col-md-2">
                  <button type="submit" class="btn btn-primary btn-sm w-100"> <span class="fas fa-search"></span> Pesquisar</button>
                </div>
                <div class="mb-2 col-md-2">
                    <a href="{{route('painel')}}" class="btn btn-danger btn-sm w-100"> <span class="fas fa-eraser"></span> Cancelar</a>
                </div>
            </div>
        </form>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>
</body>
</html>

