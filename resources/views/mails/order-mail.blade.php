<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmare comanda</title>
</head>
<body>
<p>Buna ziua {{$recent_user->name}}</p>
<p>Comanda dumneavostra a fost creata cu succes.</p>
<tabel style="width: 600px;text-align: right;">
    <thead>
    <tr>
        <th>Imagine</th>
        <th>Denumire</th>
        <th>Cantitate</th>
        <th>Pret</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order_items as $item)
        <tr>
            <td>
                <img src="{{ $message->embed('images/'.$item['image'])}}" width="100" alt="">
            </td>
            <td style="width: 200px;text-align: center;">{{$item['name']}}</td>
            <td style="width: 200px;text-align: center;">{{$item['quantity']}}</td>
            <td style="width: 200px;text-align: center;">{{$item['price']}} MDl
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3"></td>
        <td style="font-size: 22px;font-weight: bold;">Total : {{$order->total_price}} MDL</td>
    </tr>
    </tbody>
</tabel>
</body>
</html>
