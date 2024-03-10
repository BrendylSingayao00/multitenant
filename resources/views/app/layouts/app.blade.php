<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EduAcademia</title>

    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!--css file-->
    <link rel="stylesheet" href="styles.css" />
    <link href="{{ url('assets/css/dashboard.css') }}" rel="stylesheet">



</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script>
let sideMenu = document.querySelectorAll(".nav-link");
sideMenu.forEach((item) => {
    let li = item.parentElement;

    item.addEventListener("click", () => {
        sideMenu.forEach((link) => {
            link.parentElement.classList.remove("active");
        });
        li.classList.add("active");
    });
});

let menuBar = document.querySelector(".menu-btn");
let sideBar = document.querySelector(".sidebar");
menuBar.addEventListener("click", () => {
    sideBar.classList.toggle("hide");
});

let switchMode = document.getElementById("switch-mode");
switchMode.addEventListener("change", (e) => {
    if (e.target.checked) {
        document.body.classList.add("dark");
    } else {
        document.body.classList.remove("dark");
    }
});

let searchFrom = document.querySelector(".content nav form");
let searchBtn = document.querySelector(".search-btn");
let searchIcon = document.querySelector(".search-icon");
searchBtn.addEventListener("click", (e) => {
    if (window.innerWidth < 576) {
        e.preventDefault();
        searchFrom.classList.toggle("show");
        if (searchFrom.classList.contains("show")) {
            searchIcon.classList.replace("fa-search", "fa-times");
        } else {
            searchIcon.classList.replace("fa-times", "fa-search");
        }
    }
});

window.addEventListener("resize", () => {
    if (window.innerWidth > 576) {
        searchIcon.classList.replace("fa-times", "fa-search");
        searchFrom.classList.remove("show");
    }
    if (window.innerWidth < 768) {
        sideBar.classList.add("hide");
    }
});

if (window.innerWidth < 768) {
    sideBar.classList.add("hide");
}
</script>

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
                <a href="{{route ('tenants.index')}}" class="nav-link">
                    <i class="fas fa-border-all"></i>
                    <span class="text">Tenant</span>
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