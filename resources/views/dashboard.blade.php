@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <p>Welcome to the Laundry Management System</p>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Buat Pesanan</a>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah Member</a>
</div>
@endsection
