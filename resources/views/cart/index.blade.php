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

<div class="col-12 text-center" style="background-color: #e42c2c; position: fixed;top: 0;left: 0;width: 100%;height: 127px;">
    <div class="i-cup-cakes"><a href="/" style="text-decoration: none;color: #ffffff;font: 700 64px 'Jura-Bold', sans-serif;">iCupCakes</a></div>
    <a href="{{route('cart.index')}}"><img class="carrinho-de-compras-1" src="{{url('/images/cart.png')}}" /></a>
</div>

<div class="container" style="margin-top: 10em">
    <div>
        @foreach($products as $product)
            <div class="card col-12 mb-4" style="background-color: #E3CFD4;">
                <div class="row p-2" style="justify-content: space-between">
                    <img src="{{url('/storage/product/'.$product->id.'.'.$product->extension)}}" class="card-img-top p-2" style="width: 10rem;"  alt="Product Image">
                    <div class="card-body col-5">
                        <h3>{{$product->nome}}</h3>
                        <h4 class="pt-4">R$ {{number_format($product->preco,2,',','.')}}</h4>
                    </div>
                    <div class="row col-5" style="align-items: center;text-align: center;justify-content: center; text-decoration: none;color: black;">
                        <a href="{{route('cart.subtract',['id'=>$product->id])}}" class="col-1" style="text-decoration: none;color: black;"><h4>-</h4></a>
                        <h4 class="col-2">{{$product->qty}}</h4>
                        <a href="{{route('cart.add',['id'=>$product->id])}}" class="col-1" style="text-decoration: none;color: black;"><h4>+</h4></a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="card col-12 mb-4" style="background-color: #E3CFD4;">
            <div class="row" style="justify-content: space-between">
                <div class="card-body col-5" style="align-items: center;margin-left: 5rem;">
                    <h3>Total:</h3>
                </div>
                <div class="row col-5" style="align-items: center;text-align: center;justify-content: center; text-decoration: none;color: black;">
                    <h4 class="col-5">R$ {{number_format($total,2,',','.')}}</h4>
                </div>
            </div>
        </div>

        <div class="col-12 text-center">
            <a href="{{route('checkout.index')}}" class="btn btn-primary col-4">FINALIZAR COMPRA</a>
        </div>

    </div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
