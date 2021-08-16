<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Comunicado</title>
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
            <h4>Registrar Comunicado</h4>
        </div>
        <hr class="bg-white"> 
        <form method="POST" action="{{route('storeComunicado')}}" autocomplete="off">
            @csrf
            <div class="form-row mt-4">
                <div class="col-md-6">
                    <label class="labelCard" for="nomeComprador">Comprador:</label>
                    <input type="text" class="form-control form-control-sm" id="nomeComprador" name="nomeComprador" placeholder="Nome do Comprador" value= "{{old('nomeComprador')}}">
                </div>
                <div class="col-md-6">
                    <label class="labelCard" for="nomeVendedor">Vendedor:</label>
                    <input type="text" class="form-control form-control-sm" id="nomeVendedor" name="nomeVendedor" placeholder="Nome do Vendedor" value= "{{old('nomeVendedor')}}">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3">
                    <label class="labelCard" for="placaVeiculo">Placa*:</label>
                    <input type="text" class="form-control form-control-sm @error('placaVeiculo') is-invalid @enderror" id="placaVeiculo" name="placaVeiculo" placeholder="Placa do Veículo" value= "{{old('placaVeiculo')}}">
                    @error('placaVeiculo')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="modeloVeiculo">Modelo:</label>
                    <input type="text" class="form-control form-control-sm" id="modeloVeiculo" name="modeloVeiculo" placeholder="Modelo do Veículo" value= "{{old('modeloVeiculo')}}">
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="dataRecibo">Data Recibo*:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm @error('dataRecibo') is-invalid @enderror" id="dataRecibo" name="dataRecibo">
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
                        <input type="text" class="form-control form-control-sm @error('dataEnvio') is-invalid @enderror" id="dataEnvio" name="dataEnvio">
                        @error('dataEnvio')
                            <div class="invalid-tooltip">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row mt-3 justify-content-center">
                <div class="mb-2 mr-2">
                    <button type="submit" class="btn btn-success btn-sm"> <span class="fas fa-save"></span> Salvar</button>
                </div>
                <div class="mb-2 mr-2">
                    <button type="reset" class="btn btn-secondary btn-sm"> <span class="fas fa-eraser"></span> Limpar</button>
                </div>
                <div class="mb-2 mr-2">
                    <a href="{{route('painel')}}" class="btn btn-danger btn-sm w-100"> <span class="fas fa-eraser"></span> Cancelar</a>
                </div>
            </div>
        </form>
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
