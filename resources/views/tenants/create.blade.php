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
                    <a href="{{route('tenants.index')}}">Tenant</a>
                </li>
                <i class="fas fa-chevron-right"></i>
                <li>
                    <a href="#" class="active">Create Tenant </a>
                </li>
            </ul>
        </div>
        <div class="table-data">
            <div class="order addTenant">
                <div class="head">
                    <h3>Add Tenant</h3>

                </div>

                <div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900">

                                            <form method="POST" action="{{ route('tenants.store') }}">
                                                @csrf
                                                <div class="row mb-4 formaddTenant">
                                                    <div class="col-6 ">
                                                        <!-- Name -->
                                                        <div>
                                                            <x-input-label for="name" :value="__('Name')" />
                                                            <x-text-input id="name" class="block mt-1 w-full"
                                                                type="text" name="name" :value="old('name')" required
                                                                autofocus autocomplete="name" />
                                                            <x-input-error :messages="$errors->get('name')"
                                                                class="mt-2" />
                                                        </div>

                                                        <!-- Email Address -->
                                                        <div class="mt-4">
                                                            <x-input-label for="email" :value="__('Email')" />
                                                            <x-text-input id="email" class="block mt-1 w-full"
                                                                type="email" name="email" :value="old('email')" required
                                                                autocomplete="username" />
                                                            <x-input-error :messages="$errors->get('email')"
                                                                class="mt-2" />
                                                        </div>

                                                        <div>
                                                            <x-input-label for="domain_name"
                                                                :value="__('Domain Name')" />
                                                            <x-text-input id="domain_name" class="block mt-1 w-full"
                                                                type="text" name="domain_name"
                                                                :value="old('domain_name')" required autofocus
                                                                autocomplete="domain_name" />
                                                            <x-input-error :messages="$errors->get('domain_name')"
                                                                class="mt-2" />
                                                        </div>
                                                        <!-- User Max -->

                                                        <div class="mt-4">
                                                            <x-input-label for="max_users" :value="__('Max Users')" />
                                                            <x-text-input id="max_users" class="block mt-1 w-full"
                                                                type="number" name="max_users" :value="old('max_users')"
                                                                required min="1" />
                                                            <x-input-error :messages="$errors->get('max_users')"
                                                                class="mt-2" />
                                                        </div>

                                                        <!-- Subscription -->
                                                        <div class="mt-4">
                                                            <x-input-label for="subscription_duration"
                                                                :value="__('Subscription Duration')" />
                                                            <select id="subscription_duration"
                                                                name="subscription_duration"
                                                                style="width: 800px; height: 35px;"
                                                                class="block mt-1 w-full rounded-md ">
                                                                <option value="6">6 Months</option>
                                                                <option value="12">1 Year</option>
                                                                <option value="24">2 Years</option>
                                                                <option value="36">3 Years</option>
                                                                <option value="48">4 Years</option>
                                                                <option value="60">5 Years</option>
                                                            </select>
                                                            <x-input-error
                                                                :messages="$errors->get('subscription_duration')"
                                                                class="mt-2" />
                                                        </div>

                                                        <div class="col-6 ">
                                                            <!-- Password -->
                                                            <div class="mt-4">
                                                                <x-input-label for="password" :value="__('Password')" />

                                                                <x-text-input id="password" class="block mt-1 w-full"
                                                                    type="password" name="password" required
                                                                    autocomplete="new-password" />

                                                                <x-input-error :messages="$errors->get('password')"
                                                                    class="mt-2" />
                                                            </div>

                                                            <!-- Confirm Password -->
                                                            <div class="mt-4">
                                                                <x-input-label for="password_confirmation"
                                                                    :value="__('Confirm Password')" />

                                                                <x-text-input id="password_confirmation"
                                                                    class="block mt-1 w-full" type="password"
                                                                    name="password_confirmation" required
                                                                    autocomplete="new-password" />

                                                                <x-input-error
                                                                    :messages="$errors->get('password_confirmation')"
                                                                    class="mt-2" />
                                                            </div>
                                                            <div>
                                                                <x-primary-button
                                                                    class="ml-5 mt-2 float-right btn-primary"> Create
                                                                </x-primary-button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
</main>
@endsection