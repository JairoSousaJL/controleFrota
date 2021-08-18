<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administradores</title>
    <link rel="icon"  type="image/png"  href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.min.css')}}">
</head>
<body style="background-image:url({{asset('images/bg.png')}}); background-size: 1400px 800px;">
    <x-navbar/>
    <div class="container card bg-redCard mt-5">
        <div class="text-white">
            <h4>
                Administradores
            </h4>
        </div>
        <hr class="bg-white">
        <table class="table table-bordered table-sm " id="tabelaSearch">
            <thead class="thead-dark">
              <tr class="table-dark">
                <th style="width: 25%" scope="col">Código</th>
                <th style="width: 50%"scope="col">Nome do Administrador</th>
                <th style="width: 25%"scope="col">Status</th>
              </tr>
            </thead>
            @if (session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
            @else
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr class="table-secondary">
                  <td class="table-secondary" scope="row">{{$usuario->cpfAdministrador}}</td>
                  <td class="table-secondary">{{$usuario->nomeAdministrador}}</td>
                  <td class="table-secondary">Ativo/inativo</td>
                </tr>
                @endforeach
             @endif
            </tbody>
          </table>
          @if (session('error'))
          {{--Se tiver o erro (não encontrou nenhum Admin), não mostra a paginação--}}
          @else
            @if (isset($filters))
            {{$usuarios->appends($filters)->links()}}             
            @else
            {{$usuarios->links()}} 
            @endif
          @endif
          <div class="form-row mt-2 justify-content-center">
            <div class="mb-2 mr-2">
              <a type="button" class="btn btn-danger btn-sm" href="{{route('painel')}}"><span class="fas fa-ban"></span> Voltar</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('systen/js/jquery.min.js') }}"></script>
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>
</body>
</html>