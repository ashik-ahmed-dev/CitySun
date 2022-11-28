@php
    $general = json_decode(settings('general'), true);
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>
    <style type="text/css">
        * {font-family: Verdana, Arial, sans-serif;}
        table{font-size: x-small;}
        tfoot tr td{font-weight: bold;font-size: x-small;}
        .gray {background-color: lightgray}
        .font{font-size: 15px;}
        .authority {float: right}
        .authority h5 {margin-top: -10px;color: green;margin-left: 35px;}
        .thanks p {color: green;;font-size: 16px;font-weight: normal;font-family: serif;margin-top: 20px;}
    </style>
</head>
<body>

<table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
            <img src="{{ asset('storage/logo.webp') }}" alt="logo">
        </td>
        <td align="right">
            <pre class="font" >
               {{ $general['site_name'] }}
               Email:{{ $general['email'] }} <br>
               Mobile: {{ $general['phone'] }} <br>
               {{ $general['address'] }} <br>
            </pre>
        </td>
    </tr>

</table>


<table width="100%" style="background:white; padding:2px;"></table>
<table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
            <p class="font" style="margin-left: 20px;">
                <strong>Name:</strong> {{ $order->name }} <br>
                <strong>Email:</strong> {{ $order->email }} <br>
                <strong>Phone:</strong> {{ $order->phone }} <br>
                <strong>Address:</strong> {{ $order->address }} <br>
            </p>
        </td>
        <td style="text-align: right;">
            <p class="font">
            <h3><span style="color: green;">Invoice:</span> #{{ $order->id }}</h3>
            Order Date: {{ $order->created_at->format('d F, Y') }} <br>
            Delivery Date: {{ $order->updated_at->format('d F, Y') }} <br>
            Payment Type : {{ $order->type }} </span>
            </p>
        </td>
    </tr>
</table>
<br/>
<h3>Service information</h3>
<table width="100%">
    <thead style="background-color: #F7F7F7; color:#292a29;">
    <tr class="font">
        <th>Image</th>
        <th>Product Name</th>
        <th>Note</th>
        <th>Price </th>
    </tr>
    </thead>
    <tbody>

    <tr class="font">
        <td align="center">
            <img src="{{ asset($order->service->thumbnail) }}" height="60px;" width="60px;" alt="">
        </td>
        <td align="center">{{ $order->service->name }}</td>
        <td align="center">{{ $order->note }}</td>
        <td align="center">price ৳ {{ $order->service_price }}</td>
    </tr>
    </tbody>
</table>
<br>
<table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;">Total Amount: </span>৳ {{ $order->service_price }} </h2>
        </td>
    </tr>
</table>
<div class="thanks mt-3">
    <strong style="border-bottom: 1px solid #ddd;">Note</strong>
    <p style="width: 50%; color: #f15922;">If you’re looking for different formats and invoice layouts be sure to check out our invoice templates page.</p>
    <p>Thanks For Buying Products..!!</p>
</div>
<div class="authority float-right mt-5">
    <p>-----------------------------------</p>
    <h5>Authority Signature:</h5>
</div>
</body>
</html>
