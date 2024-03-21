<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EduAcademia</title>

    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/js/dashboard.js') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tenantSP.css') }}" />

    <!--css file-->
    <link rel="stylesheet" href="styles.css" />
    <link href="{{ url('assets/css/dashboard.css') }}" rel="stylesheet">


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


</head>

<body>
    <section class="sidebar">
        <div class="ml-10">
            <a href="{{route ('dashboard')}}">
                <x-application-logo />
            </a>
        </div>


        <ul class="side-menu top">
            <li class="active">
                <a href="{{route ('dashboard')}}" class="nav-link">
                    <i class="fas fa-border-all"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{route ('users.index')}}" class="nav-link">
                    <i class="fas fa-border-all"></i>
                    <span class="text">Users</span>
                </a>
            </li>

        </ul>

        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="fas fa-right-from-bracket"></i> {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>
        </ul>
    </section>

    <section class="content">
        <nav>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="search..." />
                    <button class="search-btn">
                        <i class="fas fa-search search-icon"></i>
                    </button>
                </div>
            </form>



            <a href="#" class="notification">
                <i class="fas fa-bell"></i>
                <span class="num">28</span>
            </a>

            <a href="#" class="profile">
                <img src="{{ asset ('/assets/image/profile.jpg')}}" alt="" />

            </a>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    @if (Auth::check())
                    <span>{{ Auth::user()->name }}</span>
                    @endif
                </x-dropdown-link>
        </nav>

        @yield('content')
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>