<?php

namespace App\Http\Controllers;

use App\Mail\Testing;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class MainController extends Controller




{


    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleHandle()
    {
        try
        {
            $user=Socialite::driver('google')->user();
            $findUser= User::where('email' , $user->email)->first();
            if(!$findUser)
            {
                $findUser = new User();
                $findUser-> fullname=$user->name;
                $findUser-> email=$user->email;
                $findUser-> password=$user->password;
                $findUser-> user_type="Customer";
                $findUser-> save();
            }
            
            session()->put('id', $findUser->id);
            session()->put('user_type', $findUser->user_type);
            return redirect('/index');


        }catch (Exception $e)
        {
            dd($e->getMessage());
        }
        return Socialite::driver('google')->redirect();
    }
    public function registration()
    {
        return view('registration');
    }

    public function login()
    {
        return view('login');
    }

    public function profile()
    {

        if (session()->has('id'))

        {
            $user=User::find(session()->get('id'));
            return view('profile' , compact('user'));
        }
        return view('login');
    }

    public function logout()
    {
        session()->forget('id');
        session()->forget('user_type');


        return redirect('/login');
    }



    public function loginUser(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        // $user = User::where('email', $request->input('email'))->where('password' , $request->input('password'))first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            // if($user){}

            session()->put('id', $user->id);
            session()->put('user_type', $user->user_type);

            if ($user->user_type == 'Customer') {
                return redirect('/index');

            } elseif ($user->user_type == 'Vendor') {
                return redirect('/vendor');
            }
        } else {
            return redirect('login')->with('error', 'Email/Password is incorrect');
        }
    }

    public function cart(Request $data)
    {
        if (session()->has('id')) {
            $details = new Cart();
            $details->quantity = $data->input('quantity');
            $details->menu_id = $data->input('menu_id');
            $details->customer_id = session()->get('id');
            $details->save();

            return redirect()->back()->with('sucsess', 'Congratulations! Item added into cart');
        } else {
            return redirect('login')->with('error', 'Please logi in the system');
        }
    }


    public function registerUser(Request $data)

    {
        $newUser = new User();
        $newUser->fullname = $data->input('fullname');
        $newUser->email = $data->input('email');
        $newUser->password = $data->input('password');
        $newUser->password_confirmation = $data->input('password_confirmation');
        $newUser->phone = $data->input('phone');
        $newUser->user_type = $data->input('user_type');
        // $newUser->user_type = "Customer";
        $newUser->gender = $data->input('gender');
        $newUser->restaurant_id = $data->input('user_type') === 'Vendor' ? $data->input('restaurant_id') : null;

        if ($newUser->save()) {
            return redirect('/login')->with('success', 'Congratulations! Your Account is Ready.');
        }

        return back()->with('error' , 'Registration failed. PLease try again');
    }
    


    public function updateUser(Request $data)

    {
        $user = User::find(session()->get('id'));
        $user->fullname = $data->input('fullname');
    
    
        $user->password_confirmation = $data->input('password_confirmation');
        $user->phone = $data->input('phone');
       
        // $newUser->user_type = "Customer";
        $user->gender = $data->input('gender');
       

        if ($user->save()) {
            return redirect()->back()->with('success' , 'Congratulations! Your Accounr is Updated');
        }

       
    }
    


    public function checkout(Request $data)

    {
        if (session()->has('id')) {
            $order = new Order();
            $order->status = "pending";
            // $order->restaurant_id=$data->input('restaurant_id');
            $order->user_id = session()->get('id');
            // $order->restaurant_id = session()->get('restaurant_id'); // added this line

            // Get the cart for the current user
            $cart = Cart::where('user_id', session()->get('id'))->first();

            // Check if the cart exists
            if ($cart) {
                // Get the restaurant ID from the cart's menu
                $order->restaurant_id = $cart->menu->restaurant_id;
            } else {
                // Handle the case where the cart is null
                // For example, you could redirect the user to the cart page
                return redirect()->route('cart');
            } //assuming the menu belongs to a restaurant

            $order->bill = $data->input('bill');
            $order->phone = $data->input('phone');
            $order->comments = $data->input('comments');
            $order->order_type = $data->input('order_type');
            $order->collection_time = $data->input('collection_time');
            $order->name = $data->input('name');
            $order->payment_method = $data->input('payment_method');

            if ($order->save()) {
                $carts = Cart::where('user_id', session()->get('id'))->get();
                foreach ($carts as $item) {
                    $menu = Menu::find($item->menu_id);

                    $OrderItem = new OrderItem();
                    $OrderItem->menu_id = $item->menu_id;
                    $OrderItem->quantity = $item->quantity;
                    $OrderItem->price = $menu->price;
                    $OrderItem->restaurant_id = $order->restaurant_id; // added this line
                    // $OrderItem->restaurant_id=$restaurant->restaurant_id; 
                    $OrderItem->order_id = $order->id;
                    $OrderItem->save();
                    $item->delete();
                }
            }

            return redirect()->back()->with('sucsess', 'Order Done');
        } else {
            return redirect('/login')->with('success', 'Congratulations! Your Account is Ready.');
        }
    }


    public function myOrders()
    {

        if (session()->has('id'))

        {
            $orders=Order::where('user_id', session()->get('id'))->get();
            $items= DB::table('menus')
            ->join('order_items' , 'order_items.menu_id', 'menus.id')
            ->select('menus.menu_name', 'menus.image', 'order_items.*')
            ->get();


            return view('/myOrders', compact('orders','items'));
        }

        return redirect('login');
    }

    public function testMail()

    {
        $facts=[

            'title'=>"This is a testing email",
            "message"=>"Hello this is a message"
        ];

        Mail::to ("thaaraberakah@gmail.com")->send(new Testing($facts));
        return redirect('/index');
    }


}
