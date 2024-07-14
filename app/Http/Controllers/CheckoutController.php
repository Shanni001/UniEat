<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function processCheckout(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'collection_time' => 'required|date',
            'payment_method' => 'required|string',
        ]);

        // Process the checkout data
        // Add your logic here to handle the form data, e.g., save to the database, process payment, etc.

        return redirect('/')->with('success', 'Your order has been placed successfully!');
    }
}
