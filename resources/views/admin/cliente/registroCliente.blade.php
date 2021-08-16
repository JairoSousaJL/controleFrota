<!DOCTYPE html>
<html lang="pt-br">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Clientes</title>
    <link rel="icon"  type="image/png"  href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/style.css')}}">
</head>
<body style="background-image:url({{asset('images/bg.png')}}); background-size: 1400px 800px;">
    <x-navbar/>
    <div class="container card bg-redCard mt-5">
        <div class="labelCard">
            <h4>Cadastro de Clientes</h4>
        </div>
        <hr class="bg-white">
        <form method="POST" action="{{route('storeCliente')}}" autocomplete="off">
            @csrf
            <div class="form-row mt-4"> 
                <div class="col-md-2">
                    <label class="labelCard" for="codigoCliente">Código*:</label>
                    <input type="text" class="form-control form-control-sm @error('codigoCliente') is-invalid @enderror" id="codigoCliente" name="codigoCliente" placeholder="Código do Cliente" value= "{{old('codigoCliente')}}">
                    @error('codigoCliente')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="cpfCliente">CPF:</label>
                    <input type="text" class="form-control form-control-sm @error('cpfCliente') is-invalid @enderror" id="cpfCliente" name="cpfCliente" placeholder="CPF" value= "{{old('cpfCliente')}}">
                    @error('cpfCliente')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="rgCliente">RG:</label>
                    <input type="text" class="form-control form-control-sm" id="rgCliente" name="rgCliente" placeholder="RG" value= "{{old('rgCliente')}}">
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="nomeCliente">Nome*:</label>
                    <input type="text" class="form-control form-control-sm @error('nomeCliente') is-invalid @enderror" id="nomeCliente" name="nomeCliente" placeholder="Nome do Cliente" value= "{{old('nomeCliente')}}">
                    @error('nomeCliente')
                    <div class="invalid-tooltip">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4">
                    <label class="labelCard" for="telefoneCliente">Telefone:</label>
                    <input type="text" class="form-control form-control-sm" id="telefoneCliente" name="telefoneCliente" placeholder="Telefone" value= "{{old('telefoneCliente')}}">
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="celularCliente">Celular:</label>
                    <input type="text" class="form-control form-control-sm" id="celularCliente" name="celularCliente" placeholder="Celular" value= "{{old('celularCliente')}}">
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="emailCliente">E-Mail:</label>
                    <input type="email" class="form-control form-control-sm" id="emailCliente" name="emailCliente" placeholder="E-Mail do Cliente" value= "{{old('emailCliente')}}">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-2">
                    <label class="labelCard" for="estadoCliente">Estado:</label>
                    <input type="text" class="form-control form-control-sm" id="estadoCliente" name="estadoCliente" placeholder="Estado" value= "{{old('estadoCliente')}}">
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="cidadeCliente">Cidade:</label>
                    <input type="text" class="form-control form-control-sm" id="cidadeCliente" name="cidadeCliente" placeholder="Cidade" value= "{{old('cidadeCliente')}}">
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="bairroCliente">Bairro*:</label>
                    <input type="text" class="form-control form-control-sm @error('bairroCliente') is-invalid @enderror" id="bairroCliente" name="bairroCliente" placeholder="Bairro" value= "{{old('bairroCliente')}}">
                     @error('bairroCliente')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="logradouroCliente">Logradouro*:</label>
                    <input type="text" class="form-control form-control-sm @error('logradouroCliente') is-invalid @enderror" id="logradouroCliente" name="logradouroCliente" placeholder="Nome do Logradouro" value= "{{old('logradouroCliente')}}">
                    @error('logradouroCliente')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="numeroCliente">Numero:</label>
                    <input type="text" class="form-control form-control-sm" id="numeroCliente" name="numeroCliente" placeholder="Número" value= "{{old('numeroCliente')}}">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label class="labelCard" for="observacaoCliente">Observações:</label>
                    <textarea class="form-control" id="observacaoCliente" name="observacaoCliente" placeholder="Observações" rows="3"></textarea>
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
                    <a class="btn btn-danger btn-sm" href="{{route('painel')}}"><span class="fas fa-ban"></span> Cancelar</a>
                </div>
            </div>
        </form>
        <div class="container">
            @if ($errors->any())
            <div class="alert alert-danger mx-auto mt-3">
                @foreach ($errors->all() as $error)
                    <label>{{$error}}</label> 
                @endforeach
            </div>
         @endif
        </div>
        
    </div>
    <script src="{{asset('frota/js/fontawesome.js')}}"></script>
    <script src="{{asset('frota/js/bootstrap.js')}}"></script>
</body>
</html>
