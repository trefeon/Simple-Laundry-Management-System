<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('orders.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_type' => 'required',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => 'required',
            'pickup_date' => 'required|date',
            'delivery_date' => 'required|date',
        ]);

        Order::create($request->except('_token'));
        return redirect()->route('orders.index')
                         ->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        return view('orders.edit', compact('order', 'customers'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_type' => 'required',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => 'required',
            'pickup_date' => 'required|date',
            'delivery_date' => 'required|date',
        ]);

        $order->update($request->except('_token'));
        return redirect()->route('orders.index')
                         ->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')
                         ->with('success', 'Order deleted successfully.');
    }

    public function markAsDone(Request $request, Order $order)
    {
        if ($order) {
            $order->status = 'done';
            $order->save();
            return redirect()->route('orders.index')
                             ->with('success', 'Order marked as done');
        } else {
            return redirect()->route('orders.index')
                             ->with('error', 'Order not found');
        }
    }

    public function markAsUndone(Request $request, Order $order)
    {
        if ($order) {
            $order->status = 'undone';
            $order->save();
            return redirect()->route('orders.index')
                             ->with('success', 'Order marked as undone');
        } else {
            return redirect()->route('orders.index')
                             ->with('error', 'Order not found');
        }
    }
}