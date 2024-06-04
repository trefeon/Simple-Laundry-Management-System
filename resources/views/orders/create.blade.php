<!-- resources/views/orders/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add Order</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Customer</label>
                            <select class="form-select" id="customer_id" name="customer_id" required>
                                <option value="" disabled selected>Select a customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="service_type" class="form-label">Service Type</label>
                            <select class="form-select" id="service_type" name="service_type" required>
                                <option value="" disabled selected>Select a service type</option>
                                <option value="Wet Laundry">Wet Laundry - Basic washing and drying service</option>
                                <option value="Dry Laundry">Dry Laundry - Chemical washing without water</option>
                                <option value="Carpet Laundry">Carpet Laundry - Cleaning service for carpets</option>
                                <option value="Quick Laundry">Quick Laundry - Fast service for urgent needs</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="weight" class="form-label">Weight (in kilos)</label>
                            <input type="number" class="form-control" id="weight" name="weight" value="{{ old('weight') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price (Rp)</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('weight') * 10000 }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="undone" selected>Undone</option>
                                <option value="washing">Washing</option>
                                <option value="drying">Drying</option>
                                <option value="folding">Folding</option>
                                <option value="done">Done</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pickup_date" class="form-label">Pickup Date</label>
                            <input type="date" class="form-control" id="pickup_date" name="pickup_date" value="{{ old('pickup_date') ? old('pickup_date') : date('Y-m-d') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="delivery_date" class="form-label">Delivery Date</label>
                            <input type="date" class="form-control" id="delivery_date" name="delivery_date" value="{{ old('delivery_date') ? old('delivery_date') : date('Y-m-d') }}" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">Add Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#weight').on('input', function() {
            let weight = $(this).val();
            let price = weight * 10000;
            $('#price').val(price);
        });
    });
</script>
@endsection