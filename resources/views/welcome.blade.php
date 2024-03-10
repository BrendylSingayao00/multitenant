<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Landing Page using HTML, CSS & Javascript</title>

    <!-- ==== STYLE.CSS ==== -->
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}" />
    <!-- ====  REMIXICON CDN ==== -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- ==== ANIMATE ON SCROLL CSS CDN  ==== -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
    <!-- ==== HEADER ==== -->
    <header class="container header">
        <!-- ==== NAVBAR ==== -->
        <nav class="nav">
            <div class="logo">
                <h2>EduAcademia</h2>
            </div>

            <div class="nav_menu" id="nav_menu">
                <button class="close_btn" id="close_btn">
                    <i class="ri-close-fill"></i>
                </button>

                <ul class="nav_menu_list">
                    <li class="nav_menu_item">
                        <a href="{{ route('login') }}" class="nav_menu_link">Login</a>
                    </li>
                    <li class="nav_menu_item">
                        <a href="{{ route('register') }}" class="nav_menu_link">Register</a>
                    </li>
                    <li class="nav_menu_item">
                        <a href="#" class="nav_menu_link">service</a>
                    </li>
                    <li class="nav_menu_item">
                        <a href="#" class="nav_menu_link">contact</a>
                    </li>
                </ul>
            </div>

            <button class="toggle_btn" id="toggle_btn">
                <i class="ri-menu-line"></i>
            </button>
        </nav>
    </header>

    <section class="wrapper">
        <div class="container">
            <div class="grid-cols-2">
                <div class="grid-item-1">
                    <h1 class="main-heading">
                        Welcome to <span>EduAcademia</span>
                        <br />

                    </h1>
                    <p class="info-text">
                        Explore our extensive online library, personalized recommendations, and collaborative spaces
                        designed to empower educators and inspire learners. Join us today and unlock your journey toward
                        education.
                    </p>

                    <div class="btn_wrapper">
                        <a href="{{ route('login') }}" style="color:white;"> <button class="btn view_more_btn">
                                Get Started <i class="ri-arrow-right-line"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="grid-item-2">
                    <div class="team_img_wrapper">
                        <img src="{{ asset ('/assets/image/library-logo.png')}}" id="books4borrow">
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ==== ANIMATE ON SCROLL JS CDN -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- ==== GSAP CDN ==== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <!-- ==== SCRIPT.JS ==== -->
    <script src="{{ asset('assets/js/landing.js') }}" defer></script>
</body>

</html>