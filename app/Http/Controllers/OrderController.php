<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    
        // Display the checkout page with cart items
        public function showCheckout()
        {
            $cartItems = Cart::where('user_id', auth()->id())->get();
            $total = $cartItems->sum(function($item) {
                return $item->menu->price * $item->quantity;
            });
    
            return view('checkout', compact('cartItems', 'total'));
        }

    
    
    public function checkout(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'comments' => 'nullable|string',
            'collection_time' => 'required|date',
            'payment_method' => 'required|string|in:mpesa,cash',
        ]);

        $order = Order::create([
            'restaurant_id' => $request->restaurant_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'comments' => $request->comments,
            'collection_time' => $request->collection_time,
            'payment_method' => $request->payment_method,
            'status' => 'pending', // Default status
            'items' => session('cart'),
        ]);

        // Clear the cart
        session()->forget('cart');

        // Trigger event for real-time updates (will be covered later)
        //broadcast(new OrderPlaced($order));

        return redirect()->route('orders')->with('success', 'Order placed successfully!');
    }
}


