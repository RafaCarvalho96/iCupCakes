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
                    <a class="nav-link" aria-current="page" href="{{route('admin.order.index')}}">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('admin.product.index')}}">Produtos</a>
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
                    <h3 class="float-start">Produtos</h3>
                    <a href="{{route('admin.product.create')}}" class="btn btn-success float-end"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->nome}}</td>
                            <td>R$ {{$product->preco}}</td>
                            <td style="text-align: right">
                                <a href="{{route('admin.product.edit', ['id' => $product->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                <a href="{{route('admin.product.delete', ['id' => $product->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
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