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
                    <h3 class="float-start">Adicionar Produto</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.product.store')}}" class="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="form-group col-8">
                            <label for="nome" class="form-label">Nome do Produto</label>
                            <input type="text" name="nome" class="form-control" id="nome">
                        </div>

                        <div class="form-group col-4">
                            <label for="preco" class="form-label">Preço</label>
                            <input type="number" step='0.01' value='0.00' placeholder='0.00' name="preco" class="form-control" id="preco">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="form-group col-12">
                            <label for="imagem" class="form-label">Imagem do Produto</label>
                            <input type="file" name="imagem" class="form-control" id="imagem">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary form-control">Adicionar</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>