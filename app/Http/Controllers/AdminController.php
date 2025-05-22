<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    function add_food()
    {
        return view('admin.add_food');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    function upload_food(Request $request)
    {
        $data = new Food;
        $data->titile = $request->titile;
        $data->detail = $request->detail;
        $data->price = $request->price;
       
        $image = $request->image;
        $filename = time() . '.' . $image->getClientOriginalExtension();

        // image upload
        $request->image->move('food_img', $filename);

        $data->image = $filename;



        $data->save();
        
        return redirect()->back()->with('message', 'Food Added Successfully');
    }

    function view_food()
    {
        $data = Food::all();
        return view('admin.view_food', compact('data'));
    }

    function delete_food($id)
    {
        $data = Food::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Food Deleted Successfully');
    }
    function update_food($id)
    {
        $data = Food::find($id);
        return view('admin.update_food', compact('data'));
    }
    function edit_food(Request $request, $id)
    {
        $data = Food::find($id);
        $data->titile = $request->titile;
        $data->detail = $request->detail;
        $data->price = $request->price;

        $image = $request->image;
        
        $data->save();
        return redirect()->back()->with('message', 'Food Updated Successfully');    
        }

    function orders()
    {
        $data = Order::all();
        return view('admin.order', compact('data'));
    }
    
    function on_the_way($id)
    {
        $data = Order::find($id);
        $data->delivery_status = 'on the way';
        $data->save();
        return redirect()->back()->with('message', 'Food is on the way');
    }

    function delivered($id)
    {
        $data = Order::find($id);
        $data->delivery_status = 'delivered';
        $data->save();
        return redirect()->back()->with('message', 'Food Delivered Successfully');
    }
    function canceled($id)
    {
        $data = Order::find($id);
        $data->delivery_status = 'canceled';
        $data->save();
        return redirect()->back()->with('message', 'Food Order Canceled');
    }

    public function reservations()
    {
        $data = Book::all();
        return view('admin.reservations', compact('data'));
    }
}