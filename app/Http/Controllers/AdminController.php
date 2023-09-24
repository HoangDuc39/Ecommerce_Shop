<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use PDF;

class AdminController extends Controller
{
    public function view_category()
    {
        if (Auth::id()) {
            $data = category::all();
            return view('admin.category', compact('data'));
        } else {
            return redirect('login');
        }
    }
    public function add_category(Request $request)
    {
        $data =  new category;
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
    public function view_product()
    {
        if (Auth::id()) {
            $category = category::all();
            return view('admin.product', compact('category'));
        } else {
            return redirect('login');
        }
    }
    public function add_product(Request $request)
    {
        $data =  new product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->discount_price = $request->discount_price;
        $data->category = $request->category;

        $image = $request->image;
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $image_name);
        $data->image = $image_name;
        $data->save();
        return redirect()->back()->with('message', 'Product Added Successfully');
    }
    public function show_product()
    {
        $data = product::all();
        return view('admin.show_product', compact('data'));
    }
    public function delete_product($id)
    {
        $data = product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }
    public function update_product($id)
    {
        $data_product = product::find($id);
        $data_category = category::all();
        return view('admin.update_product', compact('data_product', 'data_category'));
    }
    public function update_product_confirm(Request $request, $id)
    {
        $product = product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;
        $image = $request->image;
        if ($image) {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $image_name);
            $product->image = $image_name;
        }

        $product->save();
        return redirect()->back()->with('message', 'Product Update Successfully');
    }
    public function view_order()
    {
        $order = order::all();
        return view('admin.order', compact('order'));
    }
    public function delivered($id)
    {
        $order = order::find($id);
        $order->delivery_status = 'delivered';
        $order->payment_status = 'Paid';
        $order->save();
        return redirect()->back()->with('message', 'Update Delivery Status Successfully');
    }
    public function print_pdf($id)
    {
        $order = order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('order_details.pdf');
    }
    public function search(Request $request)
    {
        $searchText = $request->search;
        $order = order::where('name', 'LIKE', "%$searchText%")
            ->orWhere('phone', 'LIKE', "%$searchText%")
            ->orWhere('product_title', 'LIKE', "%$searchText%")->get();
        return view('admin.order', compact('order'));
    }
}
