<?php

namespace App\Http\Controllers;
use Carbon\Doctrine\CarbonDoctrineType;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Book;

use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Cart;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index()
    {
        if (auth::id())
        {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user')
            {
                
                return view('home.index');
            }
            else
            {
                $total_user = User::where('usertype', '=', 'user')->count();
                $total_food = Food::count();
                $total_order = Order::count();
                $total_deliverd = Order::where('delivery_status', '=', 'delivered')->count();
                
                return view('admin.index', compact('total_user', 'total_food', 'total_order', 'total_deliverd'));
               
            }
        }
    
    }

    public function Home()
    {
        $data = Food::all();
        return view('home.index', compact('data'));
       
    }

    public function my_cart()
    {
        if (Auth::id())
        {
            $user_id = Auth::user()->id;

            $data = Cart::where('user_id', $user_id)->get();

            return view('home.my_cart', compact('data'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $data = Cart::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $userid = Auth()->user()->id;
        
        $cart = Cart::where('user_id', '=',$userid)->get();

        foreach ($cart as $cart)
        {
            $order = new Order;

            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;

            $order->titile = $cart->titile;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;
            $order->food_image = $cart->image;
            $order->delivery_status = 'in progress';
            $order->save();
            $cart_id = $cart->id;
            $cart_item = Cart::find($cart_id);
            $cart_item->delete();


        }
        return redirect()->back()->with('message', 'Order Confirmed Successfully');
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id())
        {
            $food = Food::find($id);

            $cart_titile = $food->titile;

            $cart_detail = $food->detail;

            $cart_price = Str::remove('Taka',$food->price);

            $cart_image = $food->image;

            $data = new Cart;

            $data->titile = $cart_titile;

            $data->detail = $cart_detail;

            $data->price = $cart_price * $request->qty;

            $data->image = $cart_image;

            $data->quantity = $request->qty;

            $data->user_id = Auth()->user()->id;

            $data->save();

            return redirect()->back();

            
        }
        else
        {
            
            return redirect('login');

        }
    }
    public function book_table(Request $request)
    {
        $data = new Book;

        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->time = $request->time;
        $data->date = $request->date;

        $data->save();

        return redirect()->back()->with('message', 'Table Booked Successfully');
    }
}
