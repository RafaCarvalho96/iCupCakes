<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iCupCakes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style rel="stylesheet">
        .logo,
        .logo * {
            box-sizing: border-box;
        }
        .logo {
            position: absolute;
            inset: 0;
        }
        .rectangle-1 {
            background: #e42c2c;
            width: 100%;
            height: 127px;
            position: absolute;
            left: 0px;
            top: 0px;
        }
        .i-cup-cakes {
            color: #ffffff;
            text-align: left;
            font: 700 64px "Jura-Bold", sans-serif;
            position: absolute;
            left: 40%;
            top: 26px;
        }
        .carrinho-de-compras-1 {
            width: 70px;
            height: 57px;
            position: absolute;
            left: 90%;
            top: 35px;
        }

    </style>
</head>
<body>
    <div class="logo">
        <div class="rectangle-1"></div>
        <div class="i-cup-cakes"><a href="/" style="text-decoration: none;color: #ffffff;font: 700 64px 'Jura-Bold', sans-serif;">iCupCakes</a></div>
        <a href="{{route('cart.index')}}"><img class="carrinho-de-compras-1" src="{{url('/images/cart.png')}}" /></a>
    </div>

    <div class="container" style="margin-top: 10em">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                {{ session('message') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row" style="justify-content: space-around;">
            @foreach($products as $product)
            <div class="card col-2 mb-4 text-center" style="width: 18rem;background-color: #E3CFD4;">
                <img src="{{url('/storage/product/'.$product->id.'.'.$product->extension)}}" class="card-img-top pt-1 responsive" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">{{$product->nome}}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="background-color: #E3CFD4;">R$ {{number_format($product->preco,2,',','.')}}</li>
                </ul>
                <div class="card-body text-center">
                    <a href="{{route('cart.add',['id'=>$product->id])}}" class="card-link btn btn-danger">Adicionar ao Carrinho</a>
                </div>
            </div>
            @endforeach
        </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
