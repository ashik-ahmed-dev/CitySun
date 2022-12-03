<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>
<body class="login-page" style="background: white">

<div>
    <div class="row">
        <div class="col-xs-7">
            <h4>From:</h4>
            <strong>Citysun Inc.</strong><br>
            Ka-21/F, South Kuril, <br>
            Vatara,1229, Dhaka, Bangladesh<br>
            Phone: (880) 1400-868830 <br>
            Email: citysun.xyz@gmail.com <br>
            <br>
        </div>

        <div class="col-xs-4">
            <img src="{{ asset(get_path('logo.png')) }}" alt="logo">
        </div>
    </div>

    <div style="margin-bottom: 0px">&nbsp;</div>

    <div class="row">
        <div class="col-xs-6">
            <h4>To:</h4>
            <address>
                <strong>{{ $order->name }}</strong><br>
                <span>{{ $order->email }}</span> <br>
                <span>{{ $order->phone }}</span> <br>
                <span>{{ $order->address }}</span>
            </address>
        </div>

        <div class="col-xs-5">
            <table style="width: 100%">
                <tbody>
                <tr>
                    <th>Invoice Num:</th>
                    <td class="text-right">{{ $order->id }}</td>
                </tr>
                <tr>
                    <th> Invoice Date: </th>
                    <td class="text-right">{{ $order->created_at->format('d F, Y') }}</td>
                </tr>
                </tbody>
            </table>

            <div style="margin-bottom: 0px">&nbsp;</div>

            <table style="width: 100%; margin-bottom: 20px">
                <tbody>
                <tr class="well" style="padding: 5px">
                    <th style="padding: 5px"><div> Total Amount (BDT) </div></th>
                    <td style="padding: 5px" class="text-right"><strong> {{ $order->service_price }} </strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <table class="table">
        <thead style="background: #F5F5F5;">
        <tr>
            <th>Item List</th>
            <th></th>
            <th class="text-right">Price</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><div><strong>{{ $order->service->name }}</strong></div>
                <p>{{ $order->note }}</p></td>
            <td></td>
            <td class="text-right">BDT: {{ $order->service_price }}</td>
        </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-xs-6"></div>
        <div class="col-xs-5">
            <table style="width: 100%">
                <tbody>
                <tr class="well" style="padding: 5px">
                    <th style="padding: 5px"><div> Total Amount (BDT) </div></th>
                    <td style="padding: 5px" class="text-right"><strong> {{ $order->service_price }} </strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-bottom: 0px">&nbsp;</div>

    <div class="row">
        <div class="col-xs-8 invbody-terms">
            Thank you for your business. <br>
            <br>
            <h4>Payment Terms</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eius quia, aut doloremque, voluptatibus quam ipsa sit sed enim nam dicta. Soluta eaque rem necessitatibus commodi, autem facilis iusto impedit!</p>
        </div>
    </div>
</div>

</body>
</html>
