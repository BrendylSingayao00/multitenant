@extends('dashboard')

@section('content')

<main>
    <div class="head-title">
        <div class="left">
            <h1>Edit Tenant</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active mainTitle" href="{{route('tenants.index')}}">Tenant</a>
                </li>
                <i class="fas fa-chevron-right"></i>
                <li>
                    <a href="{{route('tenants.index')}}" class="active">Edit Tenant</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="form-container">
        <form method="POST" action="{{ route('tenants.update', $tenant->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $tenant->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $tenant->email }}" required>
            </div>

            <!-- Add more fields here for editing other tenant details -->

            <button type="submit">Update Tenant</button>
        </form>
    </div>
</main>

@endsection