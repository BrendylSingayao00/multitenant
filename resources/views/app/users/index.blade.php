@extends('app.dashboardTenant')

@section('content')
<main>
    <div class="header">
        <div class="left">
            <h1>Users</h1>
        </div>
        <div>
            <x-btn-link class="ml-4 float-right download-btn report" href="{{ route('users.create') }}"><i
                    class="bx bx-cloud-download"></i> Add User</x-btn-link>
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

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->name}}
                        </td>
                        <td>
                            {{ $user->email}}
                        </td>
                        <td>
                            @foreach($user->roles as $role)
                            {{ $role->name}}{{$loop->last ? '': ','}}
                            @endforeach

                        </td>
                        <td>


                            <a href="{{ route('users.edit', $user->id)}}"
                                class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Are you sure you want to delete this User?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-xm">Delete</button>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection