<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório</title>
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/style.css')}}">
    <style>
      @page{ margin: 10px; }
    </style>
</head>
<body>
  <h4>Relatório Vendas</h4>
    <div class="container card bg-redCard mt-3">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 20%" scope="col">Data Venda</th>
                <th style="width: 30%"scope="col">Veículo</th>
                <th style="width: 30%"scope="col">Cliente</th>
                <th style="width: 20%"scope="col">Valor</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($relatorios as $relatorio)
              <tr>
                <td>{{\Carbon\Carbon::parse($relatorio->dataVenda)->format('d/m/Y')}}</td>
                <td>{{$relatorio->modeloVeiculo}}</td>
                <td>{{$relatorio->nomeCliente}}</td>
                <td>R$ {{$relatorio->valorVenda}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>
</body>
</html>

