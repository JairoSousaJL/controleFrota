<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesquisar Comunicados</title>
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
                Pesquisar Comunicados
            </h4>
        </div>
        <hr class="bg-white">
        <form action="{{route('pesquisarComunicado')}}" method="POST" autocomplete="off">
            @csrf
            <div class="form-row mt-2">
                <div class="col-md-2">
                    <label class="labelCard" for="consultaComunicado">Placa do Veículo:</label>
                </div>
                <div class="mb-2 col-md-6">
                    <input type="text" class="form-control form-control-sm" id="consultaComunicado" name="consultaComunicado" placeholder="Plava do Veículo" required>
                </div>
                <div class="mb-2 col-md-2">
                  <button type="submit" class="btn btn-primary btn-sm w-100"> <span class="fas fa-search"></span> Pesquisar</button>
                </div>
                <div class="mb-2 col-md-2">
                    <a href="{{route('comunicados')}}" class="btn btn-danger btn-sm w-100"> <span class="fas fa-eraser"></span> Limpar Filtros</a>
                </div>
            </div>
        </form>
    </div>
    <div class="container card bg-redCard mt-3">
        <div class="text-white">
            <h4>
                Transferências
            </h4>
        </div>
        <hr class="bg-white">
        <table class="table table-bordered table-sm " id="tabelaSearch">
            <thead class="thead-dark">
              <tr class="table-dark">
                <th style="width: 15%" scope="col">Código</th>
                <th style="width: 25%"scope="col">Nome do Comprador</th>
                <th style="width: 25%"scope="col">Nome do Vendedor</th>
                <th style="width: 20%"scope="col">Véiculo</th>
                <th style="width: 15%"scope="col">Data Recibo</th>
              </tr>
            </thead>
            @if (session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
            @else
            <tbody>
                @foreach ($comunicados as $comunicado)
                <tr class="table-secondary">
                  <td class="table-secondary" scope="row">{{$comunicado->codigoComunicado}}</td>
                  <td class="table-secondary">{{$comunicado->nomeComprador}}</td>
                  <td class="table-secondary">{{$comunicado->nomeVendedor}}</td>
                  <td class="table-secondary">{{$comunicado->modeloVeiculo}} - {{$comunicado->placaVeiculo}}</td>
                  <td class="table-secondary">{{\Carbon\Carbon::parse($comunicado->dataRecibo)->format('d/m/Y')}}</td>
                </tr>
                @endforeach
             @endif
            </tbody>
          </table>
          @if (session('error'))
          @else
            @if (isset($filters))
            {{$comunicados->appends($filters)->links()}}             
            @else
            {{$comunicados->links()}} 
            @endif
          @endif
          <div class="form-row mt-2 justify-content-center">              
              <div class="mb-2 mr-2">
                <button type="button" class="btn btn-warning btn-sm" id="showComunicado"> <span class="fas fa-list"></span> Ver</button>
              </div>
              <div class="mb-2 mr-2">
                <a type="button" class="btn btn-success btn-sm" href="{{route('createComunicado')}}"><span class="fas fa-save"></span> Novo</a>
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

      var btnShowCliente = document.getElementById("showComunicado");

      btnShowCliente.addEventListener("click", function(){
        var selecionados = tabela.getElementsByClassName("selecionado");
        //Verificar se está selecionado
        if(selecionados.length < 1){
          alert("Selecione Uma Transferência");
          return false;
        }
        var codigo = "";

        for(var i = 0; i < selecionados.length; i++){
          var selecionado = selecionados[i];
          selecionado = selecionado.getElementsByTagName("td");
          //dados += "Código: " + selecionado[0].innerHTML + " - Nome: " + selecionado[1].innerHTML + " - Mãe: " + selecionado[2].innerHTML + "\n";
          codigo = selecionado[0].innerHTML;
        }

        let route = "{{route('showComunicado', ':codigo')}}".replace(":codigo", codigo);
          window.location.href = route;
      });
    </script>
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>
</body>
</html>

