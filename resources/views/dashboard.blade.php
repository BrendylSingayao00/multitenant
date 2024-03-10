<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/js/dashboard.js') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tenantSP.css') }}" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <title>EDUACADEMIA</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <x-application-logo />
        <a href="#" class="logo">
            <div class="logo-name"><span>Edu</span>Academia</div>
        </a>
        <ul class="side-menu">
            <li class="active"><a href="{{route ('dashboard')}}"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="{{route ('tenants.index')}}"><i class='bx bx-group'></i>Tenant</a></li>
            <li><a href="#"><i class='bx bx-store-alt'></i>Shop</a></li>
            <li><a href="#"><i class='bx bx-analyse'></i>Analytics</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Tickets</a></li>

            <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="bx bx-log-out-circle"></i> {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>

        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="{{ asset ('/assets/image/profile.jpg')}}" alt="" />
            </a>
        </nav>

        <!-- End of Navbar -->

        @yield('content')

    </div>


</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.bx-menu').click(function() {
        $('.sidebar').toggleClass('sidebar-open');
        $('.content').toggleClass('content-shift');
    });
});
</script>

</html>