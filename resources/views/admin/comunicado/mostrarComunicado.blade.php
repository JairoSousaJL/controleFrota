<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comunicado</title>
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
        <div class="labelCard">
            <h4>Dados do Comunicado</h4>
        </div>
        <hr class="bg-white"> 
        <form method="POST" action="{{route('editComunicado', $comunicado->codigoComunicado)}}" autocomplete="off">
            @csrf
            @method('put')
            <div class="form-row mt-4">
                <div class="col-md-6">
                    <label class="labelCard" for="nomeComprador">Comprador:</label>
                    <input type="text" class="form-control form-control-sm" id="nomeComprador" name="nomeComprador" value="{{$comunicado->nomeComprador}}">
                </div>
                <div class="col-md-6">
                    <label class="labelCard" for="nomeVendedor">Vendedor:</label>
                    <input type="text" class="form-control form-control-sm" id="nomeVendedor" name="nomeVendedor" value="{{$comunicado->nomeVendedor}}">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3">
                    <label class="labelCard" for="placaVeiculo">Placa*:</label>
                    <input type="text" class="form-control form-control-sm @error('placaVeiculo') is-invalid @enderror" id="placaVeiculo" name="placaVeiculo" value="{{$comunicado->placaVeiculo}}">
                    @error('placaVeiculo')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="modeloVeiculo">Modelo:</label>
                    <input type="text" class="form-control form-control-sm" id="modeloVeiculo" name="modeloVeiculo" value="{{$comunicado->modeloVeiculo}}">
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="dataRecibo">Data Recibo*:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm @error('dataRecibo') is-invalid @enderror" id="dataRecibo" name="dataRecibo" value="{{\Carbon\Carbon::parse($comunicado->dataRecibo)->format('d/m/Y')}}">
                         @error('dataRecibo')
                            <div class="invalid-tooltip">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="dataEnvio">Data Envio:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        @if ($comunicado->dataEnvio != null)
                            <input type="text" class="form-control form-control-sm" id="dataEnvio" name="dataEnvio" value="{{\Carbon\Carbon::parse($comunicado->dataEnvio)->format('d/m/Y')}}">
                        @else
                            <input type="text" class="form-control form-control-sm" id="dataEnvio" name="dataEnvio">
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-row mt-3 justify-content-center">
                <div class="mb-2 mr-2">
                    <button type="submit" class="btn btn-success btn-sm"> <span class="fas fa-save"></span> Editar</button>
                </div>
                <div class="mb-2 mr-2">
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalDeleteComunicado"><span class="fas fa-trash-alt"></span> Excluir</button>
                </div>
                <div class="mb-2 mr-2">
                    <a class="btn btn-danger btn-sm" href="{{route('comunicados')}}"><span class="fas fa-ban"></span> Voltar</a>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="modalDeleteComunicado" tabindex="-1" role="dialog" aria-labelledby="modalDeleteComunicadoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalDeleteComunicadoLabel">Excluir Comunicado?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('deleteComunicado', $comunicado->codigoComunicado)}}">
                    @csrf
                    <div class="modal-body">
                        <h5>Veículo:</h5>
                        <label for="">{{$comunicado->modeloVeiculo}} - {{$comunicado->placaVeiculo}}</label>
                        <h5>Data Recibo:</h5>
                        <label for="">{{\Carbon\Carbon::parse($comunicado->dataRecibo)->format('d/m/Y')}}</label>
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
        $('#dataRecibo').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });

        $('#dataEnvio').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });
    </script>
</body>
</html>
