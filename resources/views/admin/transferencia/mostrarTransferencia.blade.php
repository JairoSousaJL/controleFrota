<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Transferência</title>
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
            <h4>Transferência</h4>
        </div>
        <hr class="bg-white">
        <form method="POST" action="{{route('editTransferencia', $transferencia->codigoTransferencia)}}" autocomplete="off">
            @csrf
            @method('put')
            <div class="form-row mt-4">
                <div class="col-md-3">
                    <label class="labelCard" for="nomePropAtual">Nome:</label>
                    <input type="text" class="form-control form-control-sm" id="nomePropAtual" name="nomePropAtual" value="{{$transferencia->nomePropAtual}}">
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="cpfPropAtual">CPF:</label>
                    <input type="text" class="form-control form-control-sm @error('cpfPropAtual') is-invalid @enderror" id="cpfPropAtual" name="cpfPropAtual" value="{{$transferencia->cpfPropAtual}}">
                     @error('cpfPropAtual')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="enderecoPropAtual">Novo Endereço:</label>
                    <input type="text" class="form-control form-control-sm" id="enderecoPropAtual" name="enderecoPropAtual" value="{{$transferencia->enderecoPropAtual}}">
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="telefonePropAtual">Telefone:</label>
                    <input type="text" class="form-control form-control-sm" id="telefonePropAtual" name="telefonePropAtual" value="{{$transferencia->telefonePropAtual}}">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3">
                    <label class="labelCard" for="nomePropAntigo">Nome Antigo Proprietário:</label>
                    <input type="text" class="form-control form-control-sm" id="nomePropAntigo" name="nomePropAntigo" value="{{$transferencia->nomePropAntigo}}">
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="enderecoPropAntigo">Antigo Endereço:</label>
                    <input type="text" class="form-control form-control-sm" id="enderecoPropAntigo" name="enderecoPropAntigo" value="{{$transferencia->enderecoPropAntigo}}">
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="dataRecibo">Data Recibo:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        @if ($transferencia->dataRecibo != null)
                        <input type="text" class="form-control form-control-sm" id="dataRecibo" name="dataRecibo"  value="{{\Carbon\Carbon::parse($transferencia->dataRecibo)->format('d/m/Y')}}">
                        @else
                        <input type="text" class="form-control form-control-sm" id="dataRecibo" name="dataRecibo">
                        @endif
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="dataDespachante">Data Despachante*:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm @error('dataDespachante') is-invalid @enderror" id="dataDespachante" name="dataDespachante" value="{{\Carbon\Carbon::parse($transferencia->dataDespachante)->format('d/m/Y')}}">
                        @error('dataDespachante')
                            <div class="invalid-tooltip">
                                {{$message}}
                            </div>    
                        @enderror
                    </div>
                </div>
            </div> 
            <div class="form-row">
                <div class="col-md-3">
                    <label class="labelCard" for="placaVeiculo">Placa*:</label>
                    <input type="text" class="form-control form-control-sm @error('placaVeiculo') is-invalid @enderror" id="placaVeiculo" name="placaVeiculo" value="{{$transferencia->placaVeiculo}}">
                    @error('placaVeiculo')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="renavamVeiculo">RENAVAM:</label>
                    <input type="text" class="form-control form-control-sm @error('renavamVeiculo') is-invalid @enderror" id="renavamVeiculo" name="renavamVeiculo" value="{{$transferencia->renavamVeiculo}}">
                    @error('renavamVeiculo')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="modeloVeiculo">Modelo:</label>
                    <input type="text" class="form-control form-control-sm" id="modeloVeiculo" name="modeloVeiculo" value="{{$transferencia->modeloVeiculo}}">
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="valorVeiculo">Valor:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-dollar-sign"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm @error('valorVeiculo') is-invalid @enderror" id="valorVeiculo" name="valorVeiculo" value="{{$transferencia->valorVeiculo}}">
                        @error('valorVeiculo')
                            <div class="invalid-tooltip">
                                {{$message}}
                            </div>    
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row mt-3 justify-content-center">
                <div class="mb-2 mr-2">
                    <button type="submit" class="btn btn-success btn-sm"> <span class="fas fa-save"></span> Editar</button>
                </div>
                <div class="mb-2 mr-2">
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalDeleteTransferencia"><span class="fas fa-trash-alt"></span> Excluir</button>
                </div>
                <div class="mb-2 mr-2">
                    <a class="btn btn-danger btn-sm" href="{{route('transferencias')}}"><span class="fas fa-ban"></span> Voltar</a>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="modalDeleteTransferencia" tabindex="-1" role="dialog" aria-labelledby="modalDeleteTransferenciaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalDeleteTransferenciaLabel">Excluir Transferência?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('deleteTransferencia', $transferencia->codigoTransferencia)}}">
                    @csrf
                    <div class="modal-body">
                        <h5>Veículo:</h5>
                        <label for="">{{$transferencia->modeloVeiculo}} - {{$transferencia->placaVeiculo}}</label>
                        <h5>Data Despachante:</h5>
                        <label for="">{{\Carbon\Carbon::parse($transferencia->dataDespachante)->format('d/m/Y')}}</label>
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

        $('#dataDespachante').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });
    </script>
</body>
</html>
