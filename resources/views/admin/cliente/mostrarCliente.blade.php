<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente</title>
    <link rel="icon"  type="image/png"  href="{{asset('images/icon.png')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frota/css/style.css')}}">
</head>
<body style="background-image:url({{asset('images/bg.png')}}); background-size: 1400px 800px;">
    <x-navbar/>
    <div class="container card bg-redCard mt-5">
        <div class="labelCard">
            <h4>Dados do Clientes</h4>
        </div>
        <hr class="bg-white">
        <form method="POST" action="{{route('editCliente', $cliente->codigoCliente)}}" autocomplete="off">
            @csrf
            @method('put')
            <div class="form-row mt-4">
                <div class="col-md-2">
                    <fieldset disabled>
                        <label class="labelCard" for="codigoCliente">Código:</label>
                    <input class="form-control form-control-sm" id="codigoCliente" name="codigoCliente" value= "{{$cliente->codigoCliente}}">
                    </fieldset>
                </div>
                <div class="col-md-3">
                    <fieldset disabled>
                        <label class="labelCard" for="cpfCliente">CPF:</label>
                        <input type="text" class="form-control form-control-sm" id="cpfCliente" name="cpfCliente" value= "{{$cliente->cpfCliente}}">
                    </fieldset>
                </div>
                <div class="col-md-3">
                    <label class="labelCard" for="rgCliente">RG:</label>
                    <input type="text" class="form-control form-control-sm" id="rgCliente" name="rgCliente" value= "{{$cliente->rgCliente}}">
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="nomeCliente">Nome*:</label>
                    <input type="text" class="form-control form-control-sm @error('nomeCliente') is-invalid @enderror" id="nomeCliente" name="nomeCliente" value= "{{$cliente->nomeCliente}}" required>
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
                    <input type="text" class="form-control form-control-sm" id="telefoneCliente" name="telefoneCliente" value= "{{$cliente->telefoneCliente}}">
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="celularCliente">Celular:</label>
                    <input type="text" class="form-control form-control-sm" id="celularCliente" name="celularCliente" value= "{{$cliente->celularCliente}}">
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="emailCliente">E-Mail:</label>
                    <input type="text" class="form-control form-control-sm @error('emailCliente') is-invalid @enderror" id="emailCliente" name="emailCliente" value= "{{$cliente->emailCliente}}">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-2">
                    <label class="labelCard" for="estadoCliente">Estado:</label>
                    <input type="text" class="form-control form-control-sm" id="estadoCliente" name="estadoCliente" value= "{{$cliente->estadoCliente}}">
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="cidadeCliente">Cidade:</label>
                    <input type="text" class="form-control form-control-sm" id="cidadeCliente" name="cidadeCliente" value= "{{$cliente->cidadeCliente}}">
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="bairroCliente">Bairro:</label>
                    <input type="text" class="form-control form-control-sm @error('bairroCliente') is-invalid @enderror" id="bairroCliente" name="bairroCliente" value= "{{$cliente->bairroCliente}}" required>
                    @error('bairroCliente')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="labelCard" for="logradouroCliente">Logradouro:</label>
                    <input type="text" class="form-control form-control-sm @error('logradouroCliente') is-invalid @enderror" id="logradouroCliente" name="logradouroCliente" value= "{{$cliente->logradouroCliente}}" required>
                    @error('logradouroCliente')
                        <div class="invalid-tooltip">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label class="labelCard" for="numeroCliente">Numero:</label>
                    <input type="text" class="form-control form-control-sm" id="numeroCliente" name="numeroCliente" value= "{{$cliente->numeroCliente}}">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label class="labelCard" for="observacaoCliente">Observações:</label>
                    <textarea class="form-control" id="observacaoCliente" name="observacaoCliente" rows="3">{{$cliente->observacaoCliente}}</textarea>
                </div>
            </div>

            <div class="form-row mt-3 justify-content-center">
                <div class="mb-2 mr-2">
                    <button type="submit" class="btn btn-success btn-sm"> <span class="fas fa-save"></span> Editar</button>
                </div>
                <div class="mb-2 mr-2">
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalDeleteCliente"><span class="fas fa-trash-alt"></span> Excluir</button>
                </div>
                <div class="mb-2 mr-2">
                    <a class="btn btn-danger btn-sm" href="{{route('clientes')}}"><span class="fas fa-ban"></span> Voltar</a>
                </div>
            </div>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="modalDeleteCliente" tabindex="-1" role="dialog" aria-labelledby="modalDeleteClienteLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalDeleteClienteLabel">Excluir Cliente?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('deleteCliente', $cliente->codigoCliente)}}">
                    @csrf
                    <div class="modal-body">
                        <h5>Nome do Cliente:</h5>
                        <label for="">{{$cliente->nomeCliente}}</label>
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
</body>
</html>
