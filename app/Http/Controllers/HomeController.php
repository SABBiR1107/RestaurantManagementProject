<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

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
                return view('admin.index');
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
}
