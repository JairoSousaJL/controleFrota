<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Veículos</title>
    <link rel="icon"  type="image/png"  href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/style.css')}}">
</head>
<body style="background-image:url({{asset('images/bg.png')}}); background-size: 1400px 800px;">
    <x-navbar/>
    <div class="container card bg-redCard mt-5">
        <div class="labelCard">
            <h4>Cadastro de Veículos</h4>
        </div>
        <hr class="bg-white">
        <form method="POST" action="{{route('storeVeiculo')}}" autocomplete="off">
            @csrf
            <div class="form-row mt-4">
                <div class="col-md-2">
                    <fieldset disabled>
                        <label class="labelCard" for="codigoVeiculo">Código:</label>
                        <input type="text" class="form-control form-control-sm" id="codigoVeiculo" name="codigoVeiculo" placeholder="CÓDIGO">
                    </fieldset>
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="crvVeiculo">CRV:</label>
                    <input type="text" class="form-control form-control-sm @error('crvVeiculo') is-invalid @enderror" id="crvVeiculo" name="crvVeiculo" placeholder="CRV" value= "{{old('crvVeiculo')}}">
                    @error('crvVeiculo')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="renavanVeiculo">RENAVAM:</label>
                    <input type="text" class="form-control form-control-sm @error('renavanVeiculo') is-invalid @enderror" id="renavanVeiculo" name="renavanVeiculo" placeholder="RENAVAM" value= "{{old('renavanVeiculo')}}">
                    @error('renavanVeiculo')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="placaVeiculo">Placa*:</label>
                    <input type="text" class="form-control form-control-sm @error('placaVeiculo') is-invalid @enderror" id="placaVeiculo" name="placaVeiculo" placeholder="Placa do Veículo" value= "{{old('placaVeiculo')}}">
                    @error('placaVeiculo')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="chassiVeiculo">Chassi:</label>
                    <input type="text" class="form-control form-control-sm" id="chassiVeiculo" name="chassiVeiculo" placeholder="Chassi do Veículo" value= "{{old('chassiVeiculo')}}">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3">
                    <label class="labelCard" for="marcaVeiculo">Marca:</label>
                    <input type="text" class="form-control form-control-sm" id="marcaVeiculo" name="marcaVeiculo" placeholder="Marca" value= "{{old('marcaVeiculo')}}">
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="modeloVeiculo">Modelo*:</label>
                    <input type="text" class="form-control form-control-sm @error('modeloVeiculo') is-invalid @enderror" id="modeloVeiculo" name="modeloVeiculo" placeholder="Modelo" value= "{{old('modeloVeiculo')}}">
                    @error('modeloVeiculo')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="anoFabVeiculo">Ano Fabricação:</label>
                    <input type="text" class="form-control form-control-sm @error('anoFabVeiculo') is-invalid @enderror" id="anoFabVeiculo" name="anoFabVeiculo" placeholder="Ano Fabricação" value= "{{old('anoFabVeiculo')}}">
                    @error('anoFabVeiculo')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="anoModVeiculo">Ano Modelo:</label>
                    <input type="text" class="form-control form-control-sm @error('anoModVeiculo') is-invalid @enderror" id="anoModVeiculo" name="anoModVeiculo" placeholder="Ano Modelo" value= "{{old('anoModVeiculo')}}">
                    @error('anoModVeiculo')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="corVeiculo">Cor:</label>
                    <input type="text" class="form-control form-control-sm" id="corVeiculo" name="corVeiculo" placeholder="Cor" value= "{{old('corVeiculo')}}">
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-12">
                    <label class="labelCard" for="observacaoVeiculo">Observações:</label>
                    <textarea class="form-control" id="observacaoVeiculo" name="observacaoVeiculo" placeholder="Observações" rows="3">{{old('observacaoVeiculo')}}</textarea>
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
                    <a href="{{route('painel')}}" class="btn btn-danger btn-sm w-100"> <span class="fas fa-eraser"></span> Cancelar</a>
                </div>
            </div>
            
        </form>    
    </div>
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>
</body>
</html>