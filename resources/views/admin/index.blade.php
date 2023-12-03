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
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
        }

    </style>
</head>
<body>
    <div class="logo">
        <div class="rectangle-1"></div>
        <div class="i-cup-cakes">iCupCakes</div>
    </div>


    <div class="container" style="margin-top: 20em;">
        <div class="row" style="justify-content: space-around">
            <a href="{{route('admin.product.index')}}" class="col-3 btn btn-primary" >PRODUTOS</a>
            <a href="{{route('admin.order.index')}}" class="col-3 btn btn-primary">PEDIDOS</a>
            <a href="{{route('admin.index')}}" class="col-3 btn btn-primary">ADMINISTRADORES</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>