@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h1 class="display-4">Dashboard</h1>
                <p class="lead">Welcome to the Laundry Management System</p>
            </div>
        </div>

        <div class="row">
            <!-- Card for creating an order -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 text-center">
                            <i class="fas fa-shopping-cart fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title text-center">Buat Pesanan</h5>
                        <p class="card-text text-center">Create a new laundry order for a customer.</p>
                        <a href="{{ route('orders.create') }}" class="btn btn-primary mt-auto">Buat Pesanan</a>
                    </div>
                </div>
            </div>

            <!-- Card for adding a member -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 text-center">
                            <i class="fas fa-user-plus fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title text-center">Tambah Member</h5>
                        <p class="card-text text-center">Add a new member to your laundry service.</p>
                        <a href="{{ route('customers.create') }}" class="btn btn-primary mt-auto">Tambah Member</a>
                    </div>
                </div>
            </div>

            <!-- Card for viewing orders -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 text-center">
                            <i class="fas fa-list-alt fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title text-center">Lihat Pesanan</h5>
                        <p class="card-text text-center">View and manage all laundry orders.</p>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary mt-auto">Lihat Pesanan</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Card for viewing profile -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 text-center">
                            <i class="fas fa-user fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title text-center">Profile</h5>
                        <p class="card-text text-center">View and edit your profile.</p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-auto">Profile</a>
                    </div>
                </div>
            </div>

            <!-- Card for viewing customers -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 text-center">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title text-center">Customers</h5>
                        <p class="card-text text-center">View and manage all customers.</p>
                        <a href="{{ route('customers.index') }}" class="btn btn-primary mt-auto">Customers</a>
                    </div>
                </div>
            </div>

            <!-- Card for logging out -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 text-center">
                            <i class="fas fa-sign-out-alt fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title text-center">Logout</h5>
                        <p class="card-text text-center">Log out from your account.</p>
                        <a href="{{ route('logout') }}" class="btn btn-danger mt-auto"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <div class="alert alert-info text-center" role="alert">
                    <i class="fas fa-info-circle"></i> Stay updated with the latest news and updates from our laundry.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection