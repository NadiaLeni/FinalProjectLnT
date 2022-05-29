<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$product->name}}</h1>
    <img src="{{asset('storage/image/'.$product->picture)}}" alt="" style="width: 100px">
    <p>{{$product->price}}</p>
    <p>{{$product->amount}}</p>
</body>
</html>