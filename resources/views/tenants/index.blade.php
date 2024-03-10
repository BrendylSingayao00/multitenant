@extends('dashboard')

@section('content')
<main>
    <div class="header">
        <div class="left">
            <h1>Tenant</h1>
        </div>
        <div>
            <x-btn-link class="ml-4 float-right download-btn report" href="{{ route('tenants.create') }}"><i
                    class="bx bx-cloud-download"></i> Add Tenant</x-btn-link>
        </div>

    </div>
    <div class="bottom-data">
        <div class="orders">
            <div class="header">
                <i class='bx bx-group'></i>
                <h3>Tenants</h3>
                <i class='bx bx-filter'></i>
                <i class='bx bx-search'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Domain</th>
                        <th>Subscription</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tenants as $tenant)
                    <tr>
                        <td>
                            {{ $tenant->name}}
                        </td>
                        <td>
                            {{ $tenant->email}}
                        </td>
                        <td>
                            @foreach($tenant->domains as $domain)
                            {{ $domain->domain}}{{ $loop->last ? '' : ','}}
                            @endforeach

                        </td>
                        <td>
                            {{ $tenant->subscription_duration}}
                        </td>


                        <td>
                            <a href="{{ route('tenants.show', $tenant->id) }}"
                                class="text-blue-500 hover:text-blue-700">View</a>

                            <a href="{{ route('tenants.edit', $tenant->id) }}"
                                class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Are you sure you want to delete this tenant?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

</main>


@endsection