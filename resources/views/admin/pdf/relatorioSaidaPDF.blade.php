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
  <h4>Relatório Saídas</h4>
    <div class="container card bg-redCard mt-3">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 15%" scope="col">Código Saída</th>
                <th style="width: 15%" scope="col">Data Saída</th>
                <th style="width: 15%"scope="col">Valor Saída</th>
                <th style="width: 55%"scope="col">Descrição Saída</th>
              </tr>
            </thead>
            <tbody>
              {{$total = 0}}
              @foreach ($relatorios as $relatorio)
              {{$total = $total + $relatorio->valorSaida}}
              <tr>
                <td>{{$relatorio->codigoSaida}}</td>
                <td>{{\Carbon\Carbon::parse($relatorio->dataSaida)->format('d/m/Y')}}</td>
                <td>{{$relatorio->valorSaida}}</td>
                <td>{{$relatorio->descricaoSaida}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <h5>
      Total = R$ {{$total}}
    </h5>
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>
</body>
</html>

