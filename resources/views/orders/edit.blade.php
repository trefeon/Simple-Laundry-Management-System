<!-- resources/views/orders/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select class="form-select" id="customer_id" name="customer_id">
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="service_type" class="form-label">Service Type</label>
            <input type="text" class="form-control" id="service_type" name="service_type" value="{{ $order->service_type }}">
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Weight</label>
            <input type="number" class="form-control" id="weight" name="weight" value="{{ $order->weight }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $order->price }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $order->status }}">
        </div>
        <div class="mb-3">
            <label for="pickup_date" class="form-label">Pickup Date</label>
            <input type="date" class="form-control" id="pickup_date" name="pickup_date" value="{{ $order->pickup_date }}">
        </div>
        <div class="mb-3">
            <label for="delivery_date" class="form-label">Delivery Date</label>
            <input type="date" class="form-control" id="delivery_date" name="delivery_date" value="{{ $order->delivery_date }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
