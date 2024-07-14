<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenusController extends Controller
{
    public function menu()
    {
        $menus = Menu::all();
        return view('menu', compact('menus'));
    }

    public function show($restaurant_id)
    {
        $restaurant = Restaurant::find($restaurant_id);
        $menus = Menu::where('restaurant_id', $restaurant_id)->get();

        return view('menu', compact('restaurant', 'menus'));
    }

    public function cart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('menu')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->menu->price;
        });

        return view('cart', compact('cartItems', 'total'));
    }

    public function addToCart($id)
    {
        if (Auth::check()) {
            $menu = Menu::findOrFail($id);
            $cartItem = Cart::where('menu_id', $id)->where('user_id', Auth::id())->first();

            if ($cartItem) {
                $cartItem->quantity++;
                $cartItem->save();
            } else {
                Cart::create([
                    'menu_id' => $id,
                    'user_id' => Auth::id(),
                    'quantity' => 1,
                ]);
            }

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        } else {
            return redirect('login');
        }
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = Cart::find($request->id);
            if ($cart && $cart->user_id == Auth::id()) {
                $cart->quantity = $request->quantity;
                $cart->save();
                session()->flash('success', 'Cart successfully updated!');
            }
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = Cart::find($request->id);
            if ($cart && $cart->user_id == Auth::id()) {
                $cart->delete();
                session()->flash('success', 'Product successfully removed!');
            }
        }
    }
}

