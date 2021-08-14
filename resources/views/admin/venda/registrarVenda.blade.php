<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Vendas</title>
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/style.css')}}">

    <script src="{{asset('datepicker/js/jquery-3.3.1.slim.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('datepicker/css/bootstrap-datepicker.css')}}">
    <script src="{{asset('datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('datepicker/locales/bootstrap-datepicker.pt-BR.min.js')}}"></script>
</head>
<body style="background-image:url({{asset('images/bg.png')}}); background-size: 1400px 800px;">
    <x-navbar/>
    <div class="container card bg-redCard mt-5">
        <div class="tab-content" id="nav-tabContent">
            <div class="labelCard">
                <h4>Registrar Nova Venda</h4>
            </div>
            <hr class="bg-white">
            <form method="POST" action="{{route('storeVenda')}}" autocomplete="off">
                @csrf
                <div class="form-row mt-4">
                    <div class="col-md-3">
                        <label class="labelCard" for="codigoVeiculo">Veículo*:</label>
                        <select class="form-control form-control-sm @error('codigoVeiculo') is-invalid @enderror" id="codigoVeiculo" name="codigoVeiculo">
                            @foreach ($veiculos->all() as $veiculo)
                                <option value={{$veiculo->id}}> {{$veiculo->modeloVeiculo}} = {{$veiculo->placaVeiculo}}</option>
                            @endforeach
                        </select>
                        @error('codigoVeiculo')
                            <div class="invalid-tooltip">
                                {{$message}}
                            </div>    
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="labelCard" for="nomeCliente">Cliente*:</label>
                        <select class="form-control form-control-sm @error('nomeCliente') is-invalid @enderror" id="codigoCliente" name="codigoCliente">
                            @foreach ($clientes->all() as $cliente)
                                <option value={{$cliente->id}}> {{$cliente->nomeCliente}}</option>
                            @endforeach
                        </select>
                        @error('nomeCliente')
                            <div class="invalid-tooltip">
                                {{$message}}
                            </div>    
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label class="labelCard" for="valorVenda">Valor da Venda*:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="fas fa-dollar-sign"></span></span>
                            </div>
                            <input type="text" class="form-control form-control-sm @error('valorVenda') is-invalid @enderror" id="valorVenda" name="valorVenda" placeholder="Valor">
                            @error('valorVenda')
                                <div class="invalid-tooltip">
                                    {{$message}}
                                </div>    
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="labelCard" for="dataVenda">Data da Venda*:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                            </div>
                            <input type="text" class="form-control form-control-sm @error('dataVenda') is-invalid @enderror" id="dataVenda" name="dataVenda">
                            @error('dataVenda')
                                <div class="invalid-tooltip">
                                    {{$message}}
                                </div>    
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <label class="labelCard" for="observacaoVenda">Observações:</label>
                        <textarea class="form-control" id="observacaoVenda" name="observacaoVenda" placeholder="Observações" rows="3"></textarea>
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
                        <a type="button" class="btn btn-danger btn-sm" href="{{route('painel')}}"><span class="fas fa-ban"></span> Cancelar</a>
                    </div>
                </div>
                
            </form>
        </div>     
    </div>
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>
    <script type="text/javascript">
        $('#dataVenda').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });
    </script> 
</body>
</html>