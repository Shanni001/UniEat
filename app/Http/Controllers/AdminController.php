<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function AddNewProduct(Request $request)
    {
        // if (session()->get('type') !== 'Admin') {
        //     return back()->with('error', 'Unauthorized access. Only admins can add new products.');
        // }
        // Validate the request
        $request->validate([
            'restaurant_id' => 'required|integer',
            'menu_name' => 'required|string|max:255',
            'menu_description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|file|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // Use the original file name
            $file->move(public_path('images'), $filename);

            // Save the file path to the database
            $imagePath =  $filename;
        } else {
            return back()->withErrors(['image' => 'Image upload failed.']);
        }

        // Insert into the database
        DB::table('menus')->insert([
            'restaurant_id' => $request->restaurant_id,
            'menu_name' => $request->menu_name,
            'menu_description' => $request->menu_description,
            'price' => $request->price,
            'image' => $imagePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Product added successfully.');
    }

    public function index3()
    {

        // if( session()->get ('type')=='Admin')
        // {
            return view('Dashboard.index3');

        // }
        // return redirect()->back();
    }

    public function profile()
    {

        //if( session()->get ('type')=='Admin')
        //{
            $user=User::find(session()->get('id'));
            return view('Dashboard.profile', compact('user'));

       // }
       // return redirect()->back();
    }


    public function products()
    {
        $menus = Menu::all();
        return view('dashboard.products', compact('menus'));
    }

    
    public function foods()
    {

        //if (session()->has('id'))
        //if (session()->get('user_type')=='Vendor')
        
            $orderItems= DB:: table('order_items')
         
            ->join('menus' , 'order_items.menu_id', 'menus.id')
            ->select('menus.menu_name', 'menus.image', 'order_items.*')
            ->get();
            
            $orders= DB:: table('users')
         
            ->join('orders' , 'orders.user_id', 'users.id')
            ->select('orders.*', 'users.fullname', 'users.email')
            ->get();



            return view('dashboard.foods', compact('orders' ,'orderItems'));
        

       
    }


    public function changeOrderStatus( $status , $id )

    //if (session()->has('id'))
        //if (session()->get('user_type')=='Vendor')
        // {
    {
    
        $order = Order::find($id);
        $order->status=$status;
        $order ->save();
        
        return redirect()->back()->with('success', 'Congratulations! User Status Updated SuccessFully');
    }

        // return redirect ()->back(); }



    public function deleteProduct($id)
    {
        // $menus = Menu::find($id);
        $menus= Menu::find($id);
        $menus -> delete();
 
        return redirect()->back()->with('success', 'Product Listing Deleted Successfully.');
    }


    public function UpdateProduct(Request $request)
    {
        // if (session()->get('type') !== 'Admin') {
        //     return back()->with('error', 'Unauthorized access. Only admins can add new products.');
        //     // return redirect()->back();
        // }
        // Validate the request
        $request->validate([
            'id' => 'required|integer', // Assuming 'id' is passed as a hidden field in your form
            'restaurant_id' => 'required|integer',
            'menu_name' => 'required|string|max:255',
            'menu_description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048', // 'image' can be nullable for updates
        ]);
    
        // Find the menu item by ID
        $menus = Menu::find($request->input('id'));
        if (!$menus) {
            return back()->withErrors(['error' => 'Menu item not found.']);
        }
    
        // Update menu item fields
        $menus->menu_name = $request->input('menu_name');
        $menus->menu_description = $request->input('menu_description');
        $menus->price = $request->input('price');
        $menus->restaurant_id = $request->input('restaurant_id');
    
        // Handle file upload if a new image is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // Use the original file name or generate a unique name
            $file->move(public_path('images'), $filename);
    
            // Update the image path in the database
            $menus->image = $filename;
        }
    
        // Save the updated menu item
        $menus->save();
    
        return redirect()->back()->with('success', 'Product updated successfully.');
    }

  

    public function users()

    {
        if(session()->get ('user_type')=='Vendor')

        {
            $user=User::where('user_type','user')->get();
            return view('dashboard.user', compact('customers'));
        }

        return redirect()->back();
    }

    
 
    public function loginUser(Request $request)
{
    $user = User::where('email', $request->input('email'))->first();

    if ($user && Hash::check($request->input('password'), $user->password)) {
        Auth::login($user);

        session()->put('id', $user->id);
        session()->put('user_type', $user->user_type);

        // Debugging output
        Log::info('user_type: ' . $user->user_type);

        if ($user->user_type == 'Customer') {
            return redirect('/index');

        } elseif ($user->user_type == 'Vendor') {
            return redirect('vendor');
        } else {
            return redirect('login')->with('error', 'User type is not recognized');
        }
    } else {
        return redirect('login')->with('error', 'Email/Password is incorrect');
    }
}

}
