<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatórios</title>
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
        <div class="labelCard form-row">
            <h4><span class="fas fa-money-check-alt"></span> Relatórios Vendas</h4>
        </div>
        <form method="POST" action="{{route('relatorioVenda')}}" autocomplete="off" target="_blank">
            @csrf
            <div class="form-row">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="dataInicialVenda" name="dataInicialVenda"  placeholder="Data Final">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="dataFinalVenda" name="dataFinalVenda" placeholder="Data Final">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-row justify-content-center">
                        <div class="mb-2 mr-2">
                            <button type="submit" class="btn btn-success btn-sm" > <span class="fas fa-search-dollar"></span> Buscar</button>
                        </div>
                        <div class="mb-2 mr-2">
                            <button type="reset" class="btn btn-secondary btn-sm"> <span class="fas fa-eraser"></span> Limpar</button>
                        </div>
                        <div class="mb-2 mr-2">
                            <a class="btn btn-danger btn-sm" href="{{route('painel')}}"><span class="fas fa-ban"></span> Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr class="bg-white">
        <div class="labelCard">
            <h4><span class="fas fa-money-bill-alt"></span> Relatórios Entradas</h4>
        </div>
        <form method="POST" action="{{route('relatorioEntrada')}}" autocomplete="off" target="_blank">
            @csrf
            <div class="form-row">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="dataInicialEntrada" name="dataInicialEntrada"  placeholder="Data Final">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="dataFinalEntrada" name="dataFinalEntrada" placeholder="Data Final">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-row justify-content-center">
                        <div class="mb-2 mr-2">
                            <button type="submit" class="btn btn-success btn-sm" > <span class="fas fa-search-dollar"></span> Buscar</button>
                        </div>
                        <div class="mb-2 mr-2">
                            <button type="reset" class="btn btn-secondary btn-sm"> <span class="fas fa-eraser"></span> Limpar</button>
                        </div>
                        <div class="mb-2 mr-2">
                            <a class="btn btn-danger btn-sm" href="{{route('painel')}}"><span class="fas fa-ban"></span> Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form> 
        <hr class="bg-white">
        <div class="labelCard">
            <h4><span class="fas fa-file-invoice-dollar"></span> Relatórios Saídas</h4>
        </div>
        <form method="POST" action="{{route('relatorioSaida')}}" autocomplete="off" target="_blank">
            @csrf
            <div class="form-row">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="dataInicialSaida" name="dataInicialSaida"  placeholder="Data Final">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="fas fa-calendar-day"></span></span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="dataFinalSaida" name="dataFinalSaida" placeholder="Data Final">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-row justify-content-center">
                        <div class="mb-2 mr-2">
                            <button type="submit" class="btn btn-success btn-sm" > <span class="fas fa-search-dollar"></span> Buscar</button>
                        </div>
                        <div class="mb-2 mr-2">
                            <button type="reset" class="btn btn-secondary btn-sm"> <span class="fas fa-eraser"></span> Limpar</button>
                        </div>
                        <div class="mb-2 mr-2">
                            <a class="btn btn-danger btn-sm" href="{{route('painel')}}"><span class="fas fa-ban"></span> Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div> 
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>
    <script type="text/javascript">
        $('#dataInicialVenda').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });

        $('#dataFinalVenda').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });

        $('#dataInicialEntrada').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });

        $('#dataFinalEntrada').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });

        $('#dataInicialSaida').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });

        $('#dataFinalSaida').datepicker({	
            format: "dd/mm/yyyy",	
            language: "pt-BR",
            
        });
    </script>
</body>
</html>