<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <style>
        .center{
            width: 100%;
            text-align: center;
            padding: 30px;
        }
        table,th,td,tr{
            table-layout: fixed;
            margin: auto;
            border: 1px solid black;
            width:60%;
        }
        .th_deg
        {
            font-size: 23px;
            padding: 10px;
            background: skyblue;
        }
        .img_deg{
            height: 150px;
            width: 150px;
        }
        .total_deg
        {
            font-size: 20px;
            padding: 40px;
        }
        th:nth-child(4), td:nth-child(4) {
            width: 150px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         @if(session()->has('message'))
         <div class="alert alert-success">
             <button type="button" class="close" data-dismiss='alert'
             aria-hidden="true">x</button>
             {{ session()->get('message') }}
         </div>
         @endif

      <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product title</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>
            <?php $total_price=0; ?>
            @forelse ($cart as $cart)
            <tr>
                <th>{{ $cart->product_title}}</th>
                <th>{{ $cart->quantity}}</th>
                <th>${{ $cart->price}}</th>
                <th><img class="img_deg" src="/product/{{ $cart->image }}"></th>
                <th>
                    <a
                    onclick="return confirm('Are you sure to remove this Product?')"
                    class="btn btn-danger"
                    href="{{ url('remove_cart', $cart->id) }}">Remove</a>
                </th>
            </tr>
            <?php $total_price=$total_price + $cart->price ?>
            @empty
                        <tr>
                            <td colspan="12">
                                <p style="color: red;padding:20px;">No Product in your Cart</p>
                            </td>
                        </tr>
            @endforelse

        </table>
        <div>
            <h1 class="total_deg">Total Price: ${{ $total_price }}</h1>
        </div>
        <div>
            <h1 style="font-size: 23px;padding-bottom:15px;">Proceed to Order</h1>
            <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash On Delivery</a>
            <a href="{{ url('stripe',$total_price) }}" class="btn btn-danger">Pay Using Card</a>
        </div>
      </div>
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
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
