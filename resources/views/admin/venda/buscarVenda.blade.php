<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesquisar Vendas</title>
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
                Pesquisar Veículos
            </h4>
        </div>
        <hr class="bg-white">
        <form action="" method="POST" autocomplete="off">
            @csrf
            <div class="form-row mt-2">
                <div class="col-md-2">
                    <label class="labelCard" for="consultaVenda">Código ou Modelo</label>
                </div>
                <div class="mb-2 col-md-6">
                    <input type="text" class="form-control form-control-sm" id="consultaVenda" name="consultaVenda" placeholder="Código ou Modelo do Veículo" required>
                </div>
                <div class="mb-2 col-md-2">
                  <button type="submit" class="btn btn-primary btn-sm w-100"> <span class="fas fa-search"></span> Pesquisar</button>
                </div>
                <div class="mb-2 col-md-2">
                    <a href="" class="btn btn-danger btn-sm w-100"> <span class="fas fa-eraser"></span> Limpar Filtros</a>
                </div>
            </div>
        </form>
    </div>
    <div class="container card bg-redCard mt-3">
        <div class="text-white">
            <h4>
                Veículos
            </h4>
        </div>
        <hr class="bg-white">
        <table class="table table-bordered table-sm " id="tabelaSearch">
            <thead class="thead-dark">
              <tr class="table-dark">
                <th style="width: 14%" scope="col">Código</th>
                <th style="width: 30%" scope="col">Véiculo</th>
                <th style="width: 30%"scope="col">Cliente</th>
                <th style="width: 13%"scope="col">Valor</th>
                <th style="width: 13%"scope="col">Data</th>
              </tr>
            </thead>
            @if (session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
            @else
            <tbody>
                @foreach ($vendas as $venda)
                <tr class="table-secondary">
                  <td class="table-secondary">{{$venda->modeloVeiculo}}</td>
                  <td class="table-secondary">{{$venda->modeloVeiculo}}</td>
                  <td class="table-secondary">{{$venda->nomeCliente}}</td>
                  <td class="table-secondary">{{$venda->valorVenda}}</td>
                  <td>{{\Carbon\Carbon::parse($venda->dataVenda)->format('d-m-Y')}}</td>
                </tr>
                @endforeach
             @endif
            </tbody>
          </table>
          @if (session('error'))
          {{--Se tiver o erro (não encontrou nenhuma venda), não mostra a paginação--}}
          @else
            @if (isset($filters))
            {{$vendas->appends($filters)->links()}}             
            @else
            {{$vendas->links()}} 
            @endif
          @endif
          <div class="form-row mt-2 justify-content-center">              
              <div class="mb-2 mr-2">
                <button type="button" class="btn btn-warning btn-sm" id="showVenda"> <span class="fas fa-list"></span> Ver</button>
              </div>
              <div class="mb-2 mr-2">
                <a type="button" class="btn btn-success btn-sm" href="{{route('createVenda')}}"><span class="fas fa-save"></span> Nova</a>
              </div>
              <div class="mb-2 mr-2">
                <a type="button" class="btn btn-danger btn-sm" href="{{route('painel')}}"><span class="fas fa-ban"></span> Cancelar</a>
              </div>
          </div>
    </div>
    <script>
      var tabela = document.getElementById("tabelaSearch");
      var linhas = tabela.getElementsByTagName("tr");
    
    for(var i = 0; i < linhas.length; i++){
      var linha = linhas[i];
      linha.addEventListener("click", function(){
        //Adicionar ao atual
        selLinha(this, false); //Selecione apenas um
        //selLinha(this, true); //Selecione quantos quiser
      });
    }

    function selLinha(linha, multiplos){
      if(!multiplos){
        var linhas = linha.parentElement.getElementsByTagName("tr");
        for(var i = 0; i < linhas.length; i++){
          var linha_ = linhas[i];
          linha_.classList.remove("selecionado");    
        }
      }
      linha.classList.toggle("selecionado");
    }

    var btnShowCliente = document.getElementById("showVenda");

    btnShowCliente.addEventListener("click", function(){
      var selecionados = tabela.getElementsByClassName("selecionado");
      //Verificar se está selecionado
      if(selecionados.length < 1){
        alert("Selecione Uma Venda");
        return false;
      }
      var codigo = "";

      for(var i = 0; i < selecionados.length; i++){
        var selecionado = selecionados[i];
        selecionado = selecionado.getElementsByTagName("td");
        codigo = selecionado[0].innerHTML;
      }

      let route = "{{route('showVenda', ':codigo')}}".replace(":codigo", codigo);
        window.location.href = route;
    });
  </script>
  <script src="{{ asset('systen/js/jquery.min.js') }}"></script>
  <script src="{{asset('frota/js/fontawesome.js')}}"></script>
  <script src="{{asset('frota/js/bootstrap.js')}}"></script>
</body>
</html>

