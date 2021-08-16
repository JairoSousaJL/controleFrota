<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saída</title>
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
        <div class="text-white">
            <h4>
                Dados da Saída
            </h4>
        </div>
        <hr class="bg-white">
        <form method="POST" action="{{route('editSaida', $saida->codigoSaida)}}" autocomplete="off">
            @csrf
            @method('put')
            <div class="form-row mt-4">
                <div class="col-md-4">
                    <fieldset disabled>
                        <label class="labelCard" for="codigoSaida">Código da Saída:</label>
                        <input type="text" class="form-control form-control-sm" id="codigoSaida" name="codigoSaida" value="{{$saida->codigoSaida}}">
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="valorSaida">Valor da Saída*:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-dollar-sign"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="valorSaida" name="valorSaida" value="{{$saida->valorSaida}}" required>
                    </div>
                </div> 
                <div class="col-md-4">
                    <label class="labelCard" for="dataSaida">Data*:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="dataSaida" name="dataSaida" value="{{\Carbon\Carbon::parse($saida->dataSaida)->format('d/m/Y')}}" required>
                    </div>
                </div>
            </div> 
            <div class="form-row">
                <div class="col-md-12">
                    <label class="labelCard" for="descricaoSaida">Descrição*:</label>
                    <textarea class="form-control" id="descricaoSaida" name="descricaoSaida" rows="3" required>{{$saida->descricaoSaida}}</textarea>
                </div>
            </div>
            <div class="form-row mt-3 justify-content-center">
                <div class="mb-2 mr-2">
                    <button type="submit" class="btn btn-success btn-sm"> <span class="fas fa-save"></span> Editar</button>
                </div>
                <div class="mb-2 mr-2">
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalDeleteSaida"><span class="fas fa-trash-alt"></span> Excluir</button>
                </div>
                <div class="mb-2 mr-2">
                    <a class="btn btn-danger btn-sm" href="{{route('painel')}}"><span class="fas fa-ban"></span> Cancelar</a>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="modalDeleteSaida" tabindex="-1" role="dialog" aria-labelledby="modalDeleteSaidaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalDeleteSaidaLabel">Excluir Saída?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('deleteSaida', $saida->codigoSaida)}}">
                    @csrf
                    <div class="modal-body">
                        <h5>Data da Saída:</h5>
                        <label for="">{{\Carbon\Carbon::parse($saida->dataSaida)->format('d/m/Y')}}</label>
                        <h5>Descrição da Saída:</h5>
                        <label for="">{{$saida->descricaoSaida}}</label>
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
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>

    <script type="text/javascript">
        $('#dataSaida').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });
    </script>
</body>
</html>