<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::all();
        return view('order_items.index', compact('orderItems'));
    }

    public function create()
    {
        return view('order_items.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'checkout_id' => 'required|exists:checkouts,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        OrderItem::create($validatedData);

        return redirect()->route('order-items.index');
    }

    public function show($id)
    {
        $order = Checkout::with(['orderItems.product', 'shippingAddress'])->findOrFail($id);
        return view('pages.order-detail', compact('order'));
    }

    public function edit(OrderItem $orderItem)
    {
        return view('order_items.edit', compact('orderItem'));
    }

    public function update(Request $request, OrderItem $orderItem)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        $orderItem->update($validatedData);

        return redirect()->route('order-items.index');
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return redirect()->route('order-items.index');
    }
}

