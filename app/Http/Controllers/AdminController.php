<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    function add_food()
    {
        return view('admin.add_food');
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
}