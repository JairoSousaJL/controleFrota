<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entrada</title>
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
                Dados da Entrada
            </h4>
        </div>
        <hr class="bg-white">
        <form method="POST" action="{{route('editEntrada', $entrada->codigoEntrada)}}" autocomplete="off">
            @csrf
            @method('put')
            <div class="form-row mt-4">
                <div class="col-md-4">
                    <fieldset disabled>
                        <label class="labelCard" for="codigoEntrada">Código da Entrada:</label>
                        <input type="text" class="form-control form-control-sm" id="codigoEntrada" name="codigoEntrada" value="{{$entrada->codigoEntrada}}">
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="valorEntrada">Valor da Entrada*:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-dollar-sign"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="valorEntrada" name="valorEntrada" value="{{$entrada->valorEntrada}}" required>
                    </div>
                </div> 
                <div class="col-md-4">
                    <label class="labelCard" for="dataEntrada">Data*:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="dataEntrada" name="dataEntrada" value="{{\Carbon\Carbon::parse($entrada->dataEntrada)->format('d/m/Y')}}" required>
                    </div>
                </div>
            </div> 
            <div class="form-row">
                <div class="col-md-12">
                    <label class="labelCard" for="descricaoEntrada">Descrição*:</label>
                    <textarea class="form-control" id="descricaoEntrada" name="descricaoEntrada" rows="3" required>{{$entrada->descricaoEntrada}}</textarea>
                </div>
            </div>
            <div class="form-row mt-3 justify-content-center">
                <div class="mb-2 mr-2">
                    <button type="submit" class="btn btn-success btn-sm"> <span class="fas fa-save"></span> Editar</button>
                </div>
                <div class="mb-2 mr-2">
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalDeleteEntrada"><span class="fas fa-trash-alt"></span> Excluir</button>
                </div>
                <div class="mb-2 mr-2">
                    <a class="btn btn-danger btn-sm" href="{{route('painel')}}"><span class="fas fa-ban"></span> Cancelar</a>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="modalDeleteEntrada" tabindex="-1" role="dialog" aria-labelledby="modalDeleteEntradaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalDeleteEntradaLabel">Excluir Entrada?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('deleteEntrada', $entrada->codigoEntrada)}}">
                    @csrf
                    <div class="modal-body">
                        <h5>Data da Entrada:</h5>
                        <label for="">{{\Carbon\Carbon::parse($entrada->dataEntrada)->format('d/m/Y')}}</label>
                        <h5>Descrição da Entrada:</h5>
                        <label for="">{{$entrada->descricaoEntrada}}</label>
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
        $('#dataEntrada').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });
    </script>
</body>
</html>