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
    <div class="row">
        <div class="col-8">
            <form class="form" method="post" action="{{route('checkout.store')}}">
            @csrf
                <div class="card col-12 mb-4" >
                    <div class="card-header">
                        <h2>Dados de Entrega</h2>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Endereço</h4>
                        <div class="row">
                            <div class="col-6">
                                <label for="rua" class="form-label">Rua:</label>
                                <input name="rua" id="rua" class="form-control" required/>
                            </div>
                            <div class="col-6">
                                <label for="bairro" class="form-label">Bairro:</label>
                                <input name="bairro" id="bairro" class="form-control" required/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="numero" class="form-label">Número:</label>
                                <input name="numero" id="numero" class="form-control" required/>
                            </div>
                            <div class="col-6">
                                <label for="complemento" class="form-label">Complemento:</label>
                                <input name="complemento" id="complemento" class="form-control"/>
                            </div>
                        </div>

                        <h4 class="card-title mt-5">Pagamento</h4>
                        <div class="row">
                            <div class="col-6">
                                <label for="formaPagamento" class="form-label">Forma de Pagamento:</label>
                                <select name="formaPagamento" id="formaPagamento" class="form-select">
                                    <option value="Dinheiro">Dinheiro</option>
                                    <option value="Cartão de Crédito">Cartão de Crédito</option>
                                    <option value="Cartão de Débito">Cartão de Débito</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="obs" class="form-label">Oberservações:</label>
                                <input name="obs" id="obs" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success mt-5 form-control" value="Finalizar Compra"/>
                </div>

            </form>
        </div>
        <div class="col-4">
            @foreach($products as $product)
                <div class="card col-12 mb-4">
                    <div class="row p-2" style="justify-content: space-between">
                        <img src="{{url('/storage/product/'.$product->id.'.'.$product->extension)}}" class="card-img-top p-2" style="width: 6rem;"  alt="Product Image">
                        <div class="card-body col-5">
                            <h5>{{$product->nome}}</h5>
                            <div class="row" style="align-items: center">
                                <h6 class="pt-4 col-6">R$ {{number_format($product->preco,2,',','.')}}</h6>
                                <div class="row col-5" style="align-items: center;text-align: center;justify-content: center; text-decoration: none;color: black;">
                                    <a href="{{route('cart.subtract',['id'=>$product->id])}}" class="col-1" style="text-decoration: none;color: black;"><h4>-</h4></a>
                                    <h6 class="col-2">{{$product->qty}}</h6>
                                    <a href="{{route('cart.add',['id'=>$product->id])}}" class="col-1" style="text-decoration: none;color: black;"><h4>+</h4></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="card col-12 mb-4">
                <div class="row" style="justify-content: space-between">
                    <div class="card-body col-5" style="align-items: center;margin-left: 5rem;">
                        <h5>Total:</h5>
                    </div>
                    <div class="row col-5" style="align-items: center;text-align: center;justify-content: center; text-decoration: none;color: black;">
                        <h5 class="col-12">R$ {{number_format($total,2,',','.')}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
