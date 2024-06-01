<!-- resources/views/orders/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order for {{ $order->customer->name }}</h5>
            <p class="card-text"><strong>Service Type:</strong> {{ $order->service_type }}</p>
            <p class="card-text"><strong>Weight:</strong> {{ $order->weight }} kg</p>
            <p class="card-text"><strong>Price:</strong> ${{ $order->price }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $order->status }}</p>
            <p class="card-text"><strong>Pickup Date:</strong> {{ $order->pickup_date }}</p>
            <p class="card-text"><strong>Delivery Date:</strong> {{ $order->delivery_date }}</p>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
