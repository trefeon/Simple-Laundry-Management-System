<!-- resources/views/orders/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Orders</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Add Order</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Service Type</th>
                <th>Weight</th>
                <th>Price</th>
                <th>Status</th>
                <th>Pickup Date</th>
                <th>Delivery Date</th>
                <th>Action</th>
                <th>Mark as</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->service_type }}</td>
                    <td>{{ $order->weight }} kg</td>
                    <td>${{ $order->price }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->pickup_date }}</td>
                    <td>{{ $order->delivery_date }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        @if ($order->status == 'undone')
                            <form action="{{ route('orders.markAsDone', $order) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Mark as Done</button>
                            </form>
                        @else
                            <form action="{{ route('orders.markAsUndone', $order) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">Mark as Undone</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection