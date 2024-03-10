@extends('dashboard')

@section('content')
<style>
input {
    padding: 6px 12px;
    font-size: 16px;
    font-weight: 400;
    width: 800px;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    appearance: none;
    border-radius: 4px;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    display: block;

    :focus {
        color: #212529;
        background-color: #fff;
        border-color: #86b7fe;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 25%);
    }
}

.addTenant {
    padding-right: 30px;
}

.formaddTenant {
    margin-left: 50px;
}
</style>
<main>
    <div class="head-title">
        <div class="left">
            <h1>Tenant</h1>
            <ul class="breadcrumb">
                <li>
                    <a>Tenant</a>
                </li>
                <i class="fas fa-chevron-right"></i>
                <li>
                    <a href="#" class="active">Tenant's Information </a>
                </li>
            </ul>
        </div>
        <div class="table-data">
            <div class="order addTenant">
                <div>

                    <h1>Tenant's Information</h1>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900">

                                            <p>Date Created:
                                                {{ $tenant->created_at}}
                                            </p>
                                            <p>Name:
                                                {{ $tenant->name}}
                                            </p>
                                            <p>Email:
                                                {{ $tenant->email}}
                                            </p>
                                            <p>Domain:
                                                @foreach($tenant->domains as $domain)
                                                {{ $domain->domain}}{{ $loop->last ? '' : ','}}
                                                @endforeach
                                            </p>
                                            <p>Subscription Duration:
                                                {{ $tenant->subscription_duration}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>

    </div>



</main>
@endsection