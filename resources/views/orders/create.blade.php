@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Order</h1>
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
            <select class="form-select" id="customer_id" name="customer_id">
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="service_type" class="form-label">Service Type</label>
            <select class="form-select" id="service_type" name="service_type">
                <option value="Wet Laundry" selected>Wet Laundry - This is a basic service where your clothes are washed and dried.</option>
                <option value="Dry Laundry">Dry Laundry - Your clothes will be washed using special chemicals that do not require water.</option>
                <option value="Carpet Laundry">Carpet Laundry - If you have dirty carpets, you can also use a laundry service to clean them.</option>
                <option value="Quick Laundry">Quick Laundry</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Weight (in kilos)</label>
            <input type="number" class="form-control" id="weight" name="weight" value="{{ old('weight') }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price (Rp)</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('weight') * 10000 }}" readonly>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="undone" selected>Undone</option>
                <option value="washing">Washing</option>
                <option value="drying">Drying</option>
                <option value="folding">Folding</option>
                <option value="done">Done</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="pickup_date" class="form-label">Pickup Date</label>
            <input type="date" class="form-control" id="pickup_date" name="pickup_date" inputmode="numeric" value="{{ old('pickup_date') ? old('pickup_date') : date('Y-m-d') }}">
        </div>
        <div class="mb-3">
            <label for="delivery_date" class="form-label">Delivery Date</label>
            <input type="date" class="form-control" id="delivery_date" name="delivery_date" inputmode="numeric" value="{{ old('delivery_date')? old('delivery_date') : date('Y-m-d') }}">
        </div>
        <button type="submit" class="btn btn-primary">Add Order</button>
    </form>
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
</div>
@endsection