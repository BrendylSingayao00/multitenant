@extends('app.dashboardTenant')

@section('content')
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>

            </ul>
        </div>
        <!-- <div class="download-btn ">
            <x-btn-link href="{{  route('tenants.index')}}">
                <i class="fas fa-cloud-download-alt"></i>Tenants
            </x-btn-link>
        </div> -->
    </div>

    <div class="box-info">

        <li>
            <i class="fas fa-people-group"></i>
            <span class="text">
                <h3>{{ $tenantCount }}</h3>
                <p>Tenants</p>
            </span>
        </li>
        <li>
            <i class="fas fa-dollar-sign"></i>
            <span class="text">
                <h3>{{ $userCount }}</h3>
                <p>Users</p>
            </span>
        </li>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Tenant Monthly</h3>
                <i class="fas fa-filter"></i>
            </div>

            <div>

            </div>

        </div>


    </div>
</main>



@endsection