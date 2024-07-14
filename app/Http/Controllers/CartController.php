<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = Cart::updateOrCreate(
            [
                'menu_id' => $request->menu_id,
                'customer_id' => Auth::id(),
            ],
            [
                'quantity' => DB::raw('quantity + ' . $request->quantity),
            ]
        );

        return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function updateCart(Request $request)
    {
        $cart = Cart::where('id', $request->id)->where('customer_id', Auth::id())->first();

        if ($cart) {
            $quantity = $request->action == 'increase' ? $cart->quantity + 1 : $cart->quantity - 1;
            $quantity = max($quantity, 1); // Ensure the quantity does not go below 1

            $cart->update(['quantity' => $quantity]);

            return response()->json(['success' => true]);
        }

        return response()->json(['error' => 'Cart item not found'], 404);
    }

    public function removeCart(Request $request)
    {
        $cart = Cart::where('id', $request->id)->where('customer_id', Auth::id())->first();

        if ($cart) {
            $cart->delete();

            return response()->json(['success' => true]);
        }

        return response()->json(['error' => 'Cart item not found'], 404);
    }

    public function viewCart()
    {
        $cartItems = Cart::where('customer_id', Auth::id())->with('menu')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->menu->price;
        });

        return view('cart', compact('cartItems', 'total'));
    }
}
