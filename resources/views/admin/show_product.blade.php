<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style type="text/css">
    .center{
        margin: auto;
        width: 100%;
        border: 2px solid white;
        text-align: center;
        margin-top: 20px;
    }
    .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;

        }
        table,th,td{
            border: 1px solid white;;
        }
        th{
            padding: 10px;
        }
        .img {
        width: 150px;
        height: 150px;
        }
        .th_color{
            background: skyblue;
            padding: 10px;
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
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->quantity }}</td>
                        <td>{{ $data->category }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->discount_price }}</td>
                        <td >
                            <img class="img" src="/product/{{ $data->image }}" />
                        </td>
                        <td><a class="btn btn-success"
                            href="{{ url('update_product',$data->id) }}">Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete Product ? ')"
                            class="btn btn-danger"
                            href="{{ url('delete_product',$data->id) }}">Delete</a>
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
