<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Site Metas -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}"/>
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet"/>
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet"/>

    <style>
        .center {
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;
        }

        table, th, td{
            border: 1px solid grey;
        }

        th{
            font-size: 20px;
            padding: 5px;
            background-color: skyblue;
        }

        .total_deg{
            font-size: 20px;
            padding: 40px;
        }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

    @if(Session::has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{Session::get('message')}}
        </div>
    @endif


    <div class="center">
        <table>
            <tr>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment status</th>
                <th>Delivery status</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php $totalPrice = 0 ?>

            @foreach($orders as $item)
                <tr>
                    <td>{{$item->product_title}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->payment_status}}</td>
                    <td>{{$item->delivery_status}}</td>
                    <td><img src="/product/{{$item->image}}" alt="" width="100px" height="100px"></td>
                    @if($item->delivery_status == 'processing')
                        <td>
                            <a onclick="return confirm('Are you sure to remove this cart?')" class="btn btn-danger" href="{{url('/cancel_order', $item->id)}}">Cancel Order</a>
                        </td>
                    @else
                        <td>
                            <p style="color: red;">Not Alow</p>
                        </td>
                    @endif


                </tr>

                    <?php $totalPrice += $item->price ?>
            @endforeach

        </table>

        <div>
            <h1 class="total_deg">Total Price: {{$totalPrice}}</h1>
        </div>

        <div>
            <h1 style="font-size: 24px; padding-bottom: 15px">Proceed to order:</h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
            <a href="{{url('stripe', $totalPrice)}}" class="btn btn-danger">Pay Using Card</a>
        </div>
    </div>



    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>
</html>
