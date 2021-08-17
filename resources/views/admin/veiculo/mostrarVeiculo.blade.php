<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Veículo</title>
    <link rel="icon"  type="image/png"  href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/style.css')}}">
</head>
<body style="background-image:url({{asset('images/bg.png')}}); background-size: 1400px 800px;">
    <x-navbar/>
    <div class="container card bg-redCard mt-5">
        <div class="labelCard">
            <h4>Dados do Veículos</h4>
        </div>
        <hr class="bg-white">
        <form method="POST" action="{{route('editVeiculo', $veiculo->codigoVeiculo)}}" autocomplete="off">
            @csrf
            @method('put')
            <div class="form-row mt-4">
                <div class="col-md-2">
                    <fieldset disabled>
                        <label class="labelCard" for="codigoVeiculo">Código:</label>
                        <input type="text" class="form-control form-control-sm" id="codigoVeiculo" name="codigoVeiculo" value="{{$veiculo->codigoVeiculo}}">
                    </fieldset>
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="crvVeiculo">CRV:</label>
                    <input type="text" class="form-control form-control-sm @error('crvVeiculo') is-invalid @enderror" id="crvVeiculo" name="crvVeiculo" value="{{$veiculo->crvVeiculo}}">
                    @error('crvVeiculo')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="renavanVeiculo">RENAVAN:</label>
                    <input type="text" class="form-control form-control-sm @error('renavanVeiculo') is-invalid @enderror" id="renavanVeiculo" name="renavanVeiculo" value="{{$veiculo->renavanVeiculo}}">
                    @error('renavanVeiculo')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="placaVeiculo">Placa*:</label>
                    <input type="text" class="form-control form-control-sm @error('placaVeiculo') is-invalid @enderror" id="placaVeiculo" name="placaVeiculo" value="{{$veiculo->placaVeiculo}}">
                    @error('placaVeiculo')
                    <div class="invalid-tooltip">
                            {{$message}} 
                        </div>    
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="chassiVeiculo">Chassi:</label>
                    <input type="text" class="form-control form-control-sm" id="chassiVeiculo" name="chassiVeiculo" value="{{$veiculo->chassiVeiculo}}">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3">
                    <label class="labelCard" for="marcaVeiculo">Marca:</label>
                    <input type="text" class="form-control form-control-sm" id="marcaVeiculo" name="marcaVeiculo" value="{{$veiculo->marcaVeiculo}}">
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="modeloVeiculo">Modelo*:</label>
                    <input type="text" class="form-control form-control-sm @error('modeloVeiculo') is-invalid @enderror" id="modeloVeiculo" name="modeloVeiculo" value="{{$veiculo->modeloVeiculo}}">
                    @error('modeloVeiculo')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="anoFabVeiculo">Ano Fabricação:</label>
                    <input type="text" class="form-control form-control-sm @error('anoFabVeiculo') is-invalid @enderror" id="anoFabVeiculo" name="anoFabVeiculo" value="{{$veiculo->anoFabVeiculo}}">
                    @error('anoFabVeiculo')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="anoModVeiculo">Ano Modelo:</label>
                    <input type="text" class="form-control form-control-sm @error('anoModVeiculo') is-invalid @enderror" id="anoModVeiculo" name="anoModVeiculo" value="{{$veiculo->anoModVeiculo}}">
                    @error('anoModVeiculo')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="corVeiculo">Cor:</label>
                    <input type="text" class="form-control form-control-sm" id="corVeiculo" name="corVeiculo" value="{{$veiculo->corVeiculo}}">
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-12">
                    <label class="labelCard" for="observacaoVeiculo">Observações:</label>
                    <textarea class="form-control" id="observacaoVeiculo" name="observacaoVeiculo" rows="3">{{$veiculo->observacaoVeiculo}}</textarea>
                </div>
            </div>

            <div class="form-row mt-3 justify-content-center">
                <div class="mb-2 mr-2">
                    <button type="submit" class="btn btn-success btn-sm"> <span class="fas fa-save"></span> Editar</button>
                </div>
                <div class="mb-2 mr-2">
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalDeleteVeiculo"><span class="fas fa-trash-alt"></span> Excluir</button>
                </div>
                <div class="mb-2 mr-2">
                    <a class="btn btn-danger btn-sm" href="{{route('veiculos')}}"><span class="fas fa-ban"></span> Voltar</a>
                </div>
            </div>
        </form>  

        <!-- Modal -->
        <div class="modal fade" id="modalDeleteVeiculo" tabindex="-1" role="dialog" aria-labelledby="modalDeleteVeiculoLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalDeleteVeiculoLabel">Excluir Veículo?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('deleteVeiculo', $veiculo->codigoVeiculo)}}">
                    @csrf
                    <div class="modal-body">
                        <h5>Nome do Veículo:</h5>
                        <label for="">{{$veiculo->modeloVeiculo}}</label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Excluir</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger mx-auto mt-3">
                @foreach ($errors->all() as $error)
                    <label>{{$error}}</label> 
                @endforeach
            </div>
        @endif 
    </div>
   
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>
</body>
</html>