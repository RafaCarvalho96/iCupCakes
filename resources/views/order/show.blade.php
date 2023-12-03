<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iCupCakes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">iCupCakes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('admin.order.index')}}">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.product.index')}}">Produtos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('admin.index')}}">Administradores</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>


    <div class="container" style="margin-top: 5em;">
        <div class="card">
            <div class="card-header">
                    <h3 class="float-start">Pedido nº {{$order->id}}</h3>
                    <h4 class="float-end">Valor total: R$ {{number_format($order->valor_total,2,',','.')}}</h4>
            </div>
            <div class="card-body">
                <h4 class="card-title">Dados</h4>


                <div class="row mt-4">
                    <div class="col-6">
                        <label for="rua" class="form-label">Rua:</label>
                        <input name="rua" id="rua" value="{{$order->rua}}" class="form-control" disabled required/>
                    </div>
                    <div class="col-6">
                        <label for="bairro" class="form-label">Bairro:</label>
                        <input name="bairro" id="bairro" value="{{$order->bairro}}" class="form-control" disabled required/>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-6">
                        <label for="numero" class="form-label">Número:</label>
                        <input name="numero" id="numero" value="{{$order->numero}}" class="form-control" disabled required/>
                    </div>
                    <div class="col-6">
                        <label for="complemento" class="form-label">Complemento:</label>
                        <input name="complemento" id="complemento" value="{{$order->complemento}}" class="form-control" disabled/>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-6">
                        <label for="formaPagamento" class="form-label">Forma de Pagamento:</label>
                        <select name="formaPagamento" id="formaPagamento" disabled class="form-select">
                            <option value="Dinheiro" @if($order->pagamento == "Dinheiro") selected @endif>Dinheiro</option>
                            <option value="Cartão de Crédito" @if($order->pagamento == "Cartão de Crédito") selected @endif>Cartão de Crédito</option>
                            <option value="Cartão de Débito" @if($order->pagamento == "Cartão de Débito") selected @endif>Cartão de Débito</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="obs" class="form-label">Oberservações:</label>
                        <input name="obs" id="obs" value="{{$order->obs}}" class="form-control" disabled/>
                    </div>
                </div>


                <h4 class="card-title" style="margin-top: 5rem">Produtos</h4>
                <table class="table">
                    <thead>
                        <th>Nº</th>
                        <th>Nome</th>
                        <th>Valor Unitário</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                    </thead>
                    <tbody>
                        @foreach ($order->lines as $line)
                        <tr>
                            <td>{{$line->line_nbr}}</td>
                            <td>{{$line->product->nome}}</td>
                            <td>R$ {{number_format($line->unit_price,2,',','.')}}</td>
                            <td>{{$line->qty}}</td>
                            <td>R$ {{number_format($line->qty*$line->unit_price,2,',','.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
