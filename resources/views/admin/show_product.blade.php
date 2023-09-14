<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style type="text/css">
    .center{
        margin: auto;
        width: 80%;
        border: 2px solid white;
        text-align: center;
        margin-top: 20px;
    }
    .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;

        }
        .img {
        width: 20%;
        height: 20%;
        }
        .th_color{
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
                <h2 class="h2_font">All Product</h2>
                <table class="center">
                    <tr class="th_color">
                        <th>Product title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Product Image</th>
                    </tr>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->quantity }}</td>
                        <td>{{ $data->category }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->discount_price }}</td>
                        <td class="img">
                            <img  src="/product/{{ $data->image }}" />
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
