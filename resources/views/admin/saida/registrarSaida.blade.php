<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Saídas Diárias</title>
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
                Registrar Saída
            </h4>
        </div>
        <hr class="bg-white">
        <form method="POST" action="{{route('storeSaida')}}" autocomplete="off">
            @csrf
            <div class="form-row mt-4">
                <div class="col-md-4">
                    <fieldset disabled>
                        <label class="labelCard" for="codigoSaida">Código da Saída:</label>
                        <input type="text" class="form-control form-control-sm" id="codigoSaida" name="codigoSaida" placeholder="CÓDIGO">
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="valorSaida">Valor da Saída*:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-dollar-sign"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm @error('valorSaida') is-invalid @enderror" id="valorSaida" name="valorSaida" placeholder="Valor" value= "{{old('valorSaida')}}">
                        @error('valorSaida')
                            <div class="invalid-tooltip">
                                {{$message}}
                            </div>    
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="dataSaida">Data*:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm @error('dataSaida') is-invalid @enderror" id="dataSaida" name="dataSaida">
                        @error('dataSaida')
                            <div class="invalid-tooltip">
                                {{$message}}
                            </div>    
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-12">
                    <label class="labelCard" for="descricaoSaida">Descrição*:</label>
                    <textarea class="form-control @error('descricaoSaida') is-invalid @enderror" id="descricaoEntrada" name="descricaoSaida" placeholder="Descrição da Saida" rows="3"></textarea>
                    @error('descricaoSaida')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>    
                    @enderror
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

    <script type="text/javascript">
        $('#dataSaida').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });
    </script>
</body>
</html>