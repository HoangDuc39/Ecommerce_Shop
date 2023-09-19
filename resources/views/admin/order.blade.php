<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        table,th,td{
            border: 1px solid white;;
        }
        .center {
            margin: auto;
            width: 100%;

            text-align: center;
            margin-top: 20px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;

        }

        .img {
            width: 100px;
            height: 100px;
        }

        .th_color {
            background: skyblue;

        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss='alert'
                    aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
                <h2 class="h2_font">All Order</h2>
                <table class="center">
                    <tr class="th_color">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product_title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                    </tr>
                    @foreach ($order as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product_title}}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td>
                                <img class="img" src="/product/{{ $order->image }}" />
                            </td>
                            <td>
                                @if($order->delivery_status == 'processing')
                                <a
                                onclick="return confirm('Are you sure this Product is delivered ?')"
                                href="{{ url('delivered',$order->id) }}"
                                class="btn btn-primary">Delivered</a>
                               @else
                               <p style="color: green;">Delivered</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
