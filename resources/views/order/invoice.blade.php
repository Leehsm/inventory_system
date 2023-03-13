<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Invoice</title>

        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: x-small;
            }
            tfoot tr td{
                font-weight: bold;
                font-size: x-small;
            }
            .gray {
                background-color: lightgray
            }
            .font{
            font-size: 15px;
            }
            .authority {
                /*text-align: center;*/
                float: right
            }
            .authority h5 {
                margin-top: -10px;
                color: rgb(0, 0, 0);
                /*text-align: center;*/
                margin-left: 35px;
            }
            .thanks p {
                color: rgb(0, 0, 0);;
                font-size: 16px;
                font-weight: normal;
                font-family: serif;
                margin-top: 20px;
            }
        </style>

    </head>
    <body>
        <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
        <tr>
            <td valign="top">
                <!-- {{-- <img src="" alt="" width="150"/> --}} -->
                <h2 style="color: rgb(0, 0, 0); font-size: 26px;"><strong>Sahira</strong></h2>
            </td>
            <td align="right">
                <pre class="font" >
                    Sahira
                    +60-197495646
                    support@outfitbysahira.com
                    No. 10, Kampung Baru 25,
                    81500 Pontian, Johor,
                    Malaysia.<br>
                </pre>
            </td>
        </tr>

        </table>
        <table width="100%" style="background:white; padding:2px;"></table>
        <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
            <tr>
                <td>
                <p class="font" style="margin-left: 20px;">
                <strong>Name:</strong> {{ $order->cust_name }} <br>
                
                </p>
                </td>
                <td>
                <p class="font">
                    <h3><span style="color: rgb(0, 0, 0);">Invoice No:</span> #{{ $order->invNo }}</h3>
                    Order Date: {{ $order->date }} <br>
                </p>
                </td>
            </tr>
        </table>
        <br/>
        <h3>Products</h3>
        <table width="100%">
            <thead style="background-color: rgb(134, 125, 128); color:#000000;">
                <tr class="font">
                    <th>Image</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price </th>
                    <th>Total </th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderItem as $item)
                <tr class="font">
                    <td align="center">
                        <img src="{{ public_path($item->image) }}" height="60px;" width="60px;" alt="">
                    </td>
                    <td align="center">
                        {{ $item->name }}
                    </td>
                    <td align="center">
                        {{ $item->quantity }}
                    </td>
                    <td align="center">
                        Rm{{ $item->price }}
                    </td>
                    <td align="center">
                        RM{{ $item->price * $item->qty}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <table width="100%" style=" padding:0 10px 0 10px;">
            <tr>
                <td align="right" >
                    <h2><span style="color: rgb(0, 0, 0);">Subtotal: RM</span> {{ $order->total }}</h2>
                    <h2><span style="color: rgb(0, 0, 0);">Total: RM</span> {{ $order->total }}</h2>
                </td>
            </tr>
        </table>
        <div class="thanks mt-3">
        <p>Thank You </p>
        </div>
        <div class="authority float-right mt-5">
            <p>-----------------------------------</p>
            <h5>Authority Signature:</h5>
        </div>
    </body>
</html>