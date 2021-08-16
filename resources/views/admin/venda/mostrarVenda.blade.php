<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venda</title>
    <link rel="icon"  type="image/png"  href="{{asset('images/icon.png')}}">
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
                <h4>Dados da Venda</h4>
                <label class="labelCard" for="codigoVenda">Codigo: {{$venda->codigoVenda}}</label>
            </div>
            <hr class="bg-white">
            <form method="POST" action="{{route('editVenda', $venda->codigoVenda)}}" autocomplete="off">
                @csrf
                @method('put')
                <div class="form-row mt-4">
                    <div class="col-md-3">
                        <fieldset disabled>
                            <label class="labelCard" for="veiculo">Veículo:</label>
                            <input type="text" class="form-control form-control-sm" value="{{$venda->modeloVeiculo}} - {{$venda->placaVeiculo}}">
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset disabled>
                            <label class="labelCard" for="codigoVenda">Cliente:</label>
                            <input type="text" class="form-control form-control-sm" value="{{$venda->nomeCliente}}">
                        </fieldset>
                    </div>
                    <div class="col-md-2">
                        <label class="labelCard" for="valorVenda">Valor da Venda*:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="fas fa-dollar-sign"></span></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="valorVenda" name="valorVenda" value="{{$venda->valorVenda}}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="labelCard" for="dataVenda">Data da Venda*:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                            </div>
                            <input type="text" class="form-control form-control-sm" id="dataVenda" name="dataVenda" value="{{\Carbon\Carbon::parse($venda->dataVenda)->format('d/m/Y')}}" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <label class="labelCard" for="observacaoVenda">Observações:</label>
                        <textarea class="form-control" id="observacaoVenda" name="observacaoVenda" rows="3">{{$venda->observacaoVenda}}</textarea>
                    </div>
                </div>

                <div class="form-row mt-3 justify-content-center">
                    <div class="mb-2 mr-2">
                        <button type="submit" class="btn btn-success btn-sm"> <span class="fas fa-save"></span> Editar</button>
                    </div>
                    <div class="mb-2 mr-2">
                        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalDeleteVenda"><span class="fas fa-trash-alt"></span> Excluir</button>
                    </div>
                    <div class="mb-2 mr-2">
                        <a class="btn btn-danger btn-sm" href="{{route('vendas')}}"><span class="fas fa-ban"></span> Voltar</a>
                    </div>
                </div>
            </form>

            <!-- Modal -->
            <div class="modal fade" id="modalDeleteVenda" tabindex="-1" role="dialog" aria-labelledby="modalDeleteVendaLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalDeleteVendaLabel">Excluir Venda?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{route('deleteVenda', $venda->codigoVenda)}}">
                            @csrf
                            <div class="modal-body">
                                <h5>Veículo:</h5>
                                <label for="">{{$venda->modeloVeiculo}} - {{$venda->placaVeiculo}}</label>
                                <h5>Nome do Cliente:</h5>
                                <label for="">{{$venda->nomeCliente}}</label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Excluir</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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