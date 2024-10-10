<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    // Return the cart for the authenticated user
    public function index()
    {
        // Get the cart for the authenticated user, along with its items and products
        $cart = Cart::with('items.product')->where('user_id', Auth::id())->first();

        // If the cart is not found, return an empty structure
        if (!$cart) {
            $cart = [
                'id' => null,
                'user_id' => Auth::id(),
                'items' => [],
                'total_price' => 0.00, // Total price is 0 for an empty cart
            ];
        } else {
            $totalPrice = 0;

            // Loop through the items and compute subtotal and total price
            foreach ($cart->items as $item) {
                // Compute subtotal for each item (price * quantity)
                $item->subtotal = round($item->product->price * $item->quantity, 2);
                // Accumulate total price
                $totalPrice += $item->subtotal;
            }

            // Add the total price of the cart to the response
            $cart->total_price = round($totalPrice, 2);
        }

        return response()->json($cart);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
