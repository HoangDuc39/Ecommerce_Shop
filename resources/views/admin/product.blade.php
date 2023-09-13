<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;
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
                <div class="div_center">
                    <h2 class="h2_font">Add Product</h2>
                    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="div_design">
                        <label>Product Title:</label>
                        <input class="input_color" type="text" name="title" placeholder="Write a title" required>
                    </div>
                    <div class="div_design">
                        <label>Product Description:</label>
                        <input class="input_color" type="text" name="description" placeholder="Write a description" required>
                    </div>
                    <div class="div_design">
                        <label>Product Price:</label>
                        <input class="input_color" type="number" name="price" placeholder="Write a price" required>
                    </div>
                    <div class="div_design">
                        <label>Discount Price:</label>
                        <input class="input_color" type="number" name="discount_price" placeholder="Write a discount price">
                    </div>
                    <div class="div_design">
                        <label>Product Quantity:</label>
                        <input class="input_color" type="number" name="quantity" min="0" placeholder="Write a quantity" required>
                    </div>

                    <div class="div_design">
                        <label>Product Category:</label>
                        <select class="input_color" name="category" required>
                            <option value="" selected>--Add Category--</option>
                            @foreach ($category as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="div_design">
                        <label>Product Image:</label>
                        <input  type="file" name="image" required>
                    </div>
                    <div class="div_design">
                        <input  type="submit" value="Add Product" class="btn btn-primary" >
                    </div>
                </form>
                </div>
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
