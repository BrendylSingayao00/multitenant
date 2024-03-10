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
</head>
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

            <li class="nav-link">
                <a href="{{route ('listtenant.index')}}" class="nav-link">
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
            <i class="fas fa-bars menu-btn"></i>
            <a href="#" class="nav-link">Categories</a>
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
<style>
/* Created by Tivotal */

/* Google Fonts(Poppins & Lato) */
@import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
    text-decoration: none;
    transition: 0.3s linear;
}

:root {
    --poppins: "Poppins", sans-serif;
    --lato: "Lato", sans-serif;

    --light: #f9f9f9;
    --blue: #3c91e6;
    --light-blue: #cfe8ff;
    --grey: #eee;
    --dark-grey: #aaaaaa;
    --dark: #342e37;
    --red: #db504a;
    --yellow: #ffce26;
    --light-yellow: #fff2c6;
    --orange: #fd7238;
    --light-orange: #ffe0d3;
}

html {
    overflow-x: hidden;
}

body {
    background: var(--grey);
    overflow-x: hidden;
}

body.dark {
    --light: #0c0c1e;
    --grey: #060714;
    --dark: #fbfbfb;
}

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    background: var(--light);
    height: 100%;
    width: 280px;
    z-index: 2000;
    font-family: var(--lato);
    transition: 0.3s ease;
    overflow-x: hidden;
    scrollbar-width: none;
}

.sidebar.hide {
    width: 60px;
}

.sidebar::-webkit-scrollbar {
    display: none;
}

.sidebar .logo {
    font-size: 24px;
    font-weight: 700;
    height: 56px;
    display: flex;
    align-items: center;
    color: var(--blue);
    position: sticky;
    top: 0;
    left: 0;
    background: var(--light);
    z-index: 500;
    padding-bottom: 20px;
    box-sizing: content-box;
}

.sidebar .logo i {
    min-width: 60px;
    display: flex;
    justify-content: center;
}

.sidebar .side-menu {
    width: 100%;
    margin-top: 48px;
}

.sidebar .side-menu li {
    height: 48px;
    margin-left: 6px;
    background: transparent;
    border-radius: 48px 0 0 48px;
    padding: 4px;
}

.sidebar .side-menu li.active {
    position: relative;
    background: var(--grey);
}

.sidebar .side-menu li.active::before {
    content: "";
    position: absolute;
    height: 40px;
    width: 40px;
    border-radius: 50%;
    right: 0;
    top: -40px;
    z-index: -1;
    box-shadow: 20px 20px 0 var(--grey);
}

.sidebar .side-menu li.active::after {
    content: "";
    position: absolute;
    height: 40px;
    width: 40px;
    border-radius: 50%;
    right: 0;
    bottom: -40px;
    z-index: -1;
    box-shadow: 20px -20px 0 var(--grey);
}

.sidebar .side-menu li a {
    height: 100%;
    width: 100%;
    background: var(--light);
    display: flex;
    align-items: center;
    border-radius: 48px;
    font-size: 16px;
    color: var(--dark);
    white-space: nowrap;
    overflow-x: hidden;
}

.sidebar.hide .side-menu li a {
    width: calc(48px - (4px * 2));
    transition: 0.3s ease;
}

.sidebar .side-menu li.active a {
    color: var(--blue);
}

.sidebar .side-menu.top li a:hover {
    color: var(--blue);
}

.sidebar .side-menu li a.logout {
    color: var(--red);
}

.sidebar .side-menu li a i {
    min-width: calc(60px - ((4px + 6px) * 2));
    display: flex;
    justify-content: center;
}

.content {
    position: relative;
    width: calc(100% - 280px);
    left: 280px;
    transition: 0.3s ease;
}

.sidebar.hide~.content {
    width: calc(100% - 60px);
    left: 60px;
}

.content nav {
    height: 56px;
    background: var(--light);
    padding: 0 24px;
    display: flex;
    align-items: center;
    gap: 24px;
    font-family: var(--lato);
    position: sticky;
    top: 0;
    left: 0;
    z-index: 1000;
}

.content nav::before {
    content: "";
    position: absolute;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    left: 0;
    bottom: -40px;
    box-shadow: -20px -20px 0 var(--light);
}

.content nav a {
    color: var(--dark);
}

.content nav .fa-bars {
    cursor: pointer;
    color: var(--dark);
}

.content nav .nav-link {
    font-size: 16px;
    transition: 0.3s ease;
}

.content nav .nav-link:hover {
    color: var(--blue);
}

.content nav form {
    max-width: 400px;
    width: 400px;
    margin-right: auto;
}

.content nav form .form-input {
    display: flex;
    align-items: center;
    height: 36px;
}

.content nav form .form-input input {
    flex-grow: 1;
    padding: 0 16px;
    height: 100%;
    border: none;
    background: var(--grey);
    border-radius: 36px 0 0 36px;
    outline: none;
    width: 100%;
    color: var(--dark);
}

.content nav form .form-input button {
    width: 36px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--blue);
    color: var(--light);
    font-size: 18px;
    border: none;
    outline: none;
    border-radius: 0 36px 36px 0;
    cursor: pointer;
}

.content nav .switch-mode {
    display: block;
    min-width: 50px;
    height: 25px;
    border-radius: 25px;
    background: var(--grey);
    cursor: pointer;
    position: relative;
}

.content nav .switch-mode::before {
    content: "";
    position: absolute;
    top: 2px;
    left: 2px;
    bottom: 2px;
    width: calc(25px - 4px);
    background: var(--blue);
    border-radius: 50%;
    transition: 0.3s ease;
}

.content nav #switch-mode:checked+.switch-mode::before {
    left: calc(100% - (25px - 4px) - 2px);
}

.content nav .notification {
    font-size: 20px;
    position: relative;
}

.content nav .notification .num {
    position: absolute;
    top: -6px;
    right: -6px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 2px solid var(--light);
    background: var(--red);
    color: var(--light);
    font-weight: 700;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.content nav .profile img {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
}

.content main {
    width: 100%;
    padding: 36px 24px;
    font-family: var(--poppins);
    max-height: calc(100vh - 56px);
    overflow-y: auto;
}

.content main .head-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    flex-wrap: wrap;
}

.content main .head-title .left h1 {
    font-size: 36px;
    font-weight: 600;
    margin-bottom: 10px;
    color: var(--dark);
}

.content main .head-title .left .breadcrumb {
    display: flex;
    align-items: center;
    gap: 16px;
}

.content main .head-title .left .breadcrumb i {
    color: var(--dark);
}

.content main .head-title .left .breadcrumb li a {
    color: var(--dark-grey);
    pointer-events: none;
}

.content main .head-title .left .breadcrumb li a.active {
    color: var(--blue);
    pointer-events: unset;
}

.content main .head-title .download-btn {
    height: 36px;
    padding: 0 16px;
    border-radius: 36px;
    background: var(--blue);
    color: var(--light);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    font-weight: 500;
}

.content main .box-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 24px;
    margin-top: 36px;
}

.content main .box-info li {
    padding: 24px;
    background: var(--light);
    border-radius: 20px;
    display: flex;
    align-items: center;
    gap: 24px;
}

.content main .box-info li i {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    font-size: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.content main .box-info li:nth-child(1) i {
    background: var(--light-orange);
    color: var(--orange);
}

.content main .box-info li:nth-child(2) i {
    background: var(--light-blue);
    color: var(--blue);
}

.content main .box-info li:nth-child(3) i {
    background: var(--light-yellow);
    color: var(--yellow);
}

.content main .box-info li .text h3 {
    font-size: 24px;
    font-weight: 600;
    color: var(--dark);
}

.content main .box-info li .text p {
    color: var(--dark);
}

.content main .table-data {
    display: flex;
    flex-wrap: wrap;
    gap: 24px;
    margin-top: 24px;
    width: 100%;
    color: var(--dark);
}

.content main .table-data>div {
    border-radius: 20px;
    background: var(--light);
    padding: 24px;
    overflow-x: auto;
}

.content main .table-data .head {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 24px;
}

.content main .table-data .head h3 {
    margin-right: auto;
    font-size: 24px;
    font-weight: 600;
}

.content main .table-data .head i {
    cursor: pointer;
}

.content main .table-data .order {
    flex-grow: 1;
    flex-basis: 500px;
}

.content main .table-data .order table {
    width: 100%;
    border-collapse: collapse;
}

.content main .table-data .order table th {
    padding-bottom: 12px;
    font-size: 13px;
    text-align: left;
    border-bottom: 1px solid var(--grey);
}

.content main .table-data .order table td {
    padding: 16px 0;
}

.content main .table-data .order table td:first-child {
    display: flex;
    align-items: center;
    gap: 12px;
    padding-left: 6px;
}

.content main .table-data .order table td img {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
}

.content main .table-data .order table tr:hover {
    background: var(--grey);
}

.content main .table-data .order table tr td .status {
    font-size: 10px;
    padding: 6px 16px;
    color: var(--light);
    border-radius: 20px;
    font-weight: 700;
}

.content main .table-data .order table tr td .status.pending {
    background: var(--orange);
}

.content main .table-data .order table tr td .status.process {
    background: var(--yellow);
}

.content main .table-data .order table tr td .status.complete {
    background: var(--blue);
}

.content main .todo {
    flex-grow: 1;
    flex-basis: 300px;
}

.content main .todo .todo-list {
    width: 100%;
}

.content main .todo .todo-list li {
    width: 100%;
    margin-bottom: 16px;
    background: var(--grey);
    border-radius: 10px;
    padding: 14px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.content main .todo .todo-list li i {
    cursor: pointer;
}

.content main .todo .todo-list li.completed {
    border-left: 10px solid var(--blue);
}

.content main .todo .todo-list li.not-completed {
    border-left: 10px solid var(--orange);
}

.content main .todo .todo-list li:last-child {
    margin-bottom: 0;
}

::-webkit-scrollbar {
    width: 0.5rem;
    height: 0.5rem;
}

::-webkit-scrollbar-track {
    background: #d9d9d9;
}

::-webkit-scrollbar-thumb {
    background: var(--blue);
    border-radius: 5rem;
}

@media (max-width: 768px) {
    .sidebar {
        width: 200px;
    }

    .content {
        width: calc(100% - 200px);
        left: 200px;
    }

    .content nav .nav-link {
        display: none;
    }
}

@media (max-width: 576px) {
    .content nav form .form-input input {
        display: none;
    }

    .content nav form .form-input button {
        width: auto;
        height: auto;
        background: transparent;
        border-radius: none;
        color: var(--dark);
    }

    .content nav form.show .form-input input {
        display: block;
        width: 100%;
    }

    .content nav form.show .form-input button {
        width: 36px;
        height: 36px;
        border-radius: 0 36px 36px 0;
        color: var(--light);
        background: var(--red);
    }

    .content nav form.show~.notification,
    .content nav form.show~.profile {
        display: none;
    }

    .content main .table-data .head {
        min-width: 420px;
    }

    .content main .table-data .order table {
        min-width: 420px;
    }

    .content main .table-data .todo .todo-list {
        min-width: 420px;
    }
}
</style>

</html>