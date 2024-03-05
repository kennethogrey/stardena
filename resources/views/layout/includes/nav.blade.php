<!-- Header Section Start -->
<header class="header">
    <div class="container-fluid">
        <div class="logo pull-left">
{{--            <h1><a href="index.html">{{env("APP_NAME")}}</a></h1>--}}
            <a href="/"><img src="img/logo.png" alt="" title="" /></a>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="{{ request()->is('/') ? 'menu-active' : '' }}"><a href="#home" class="__nav-link">Home</a></li>
                <li class="{{ request()->is('/#about') ? 'menu-active' : '' }}"><a href="#about" class="__nav-link">About</a></li>
                <li class="{{ request()->is('/#services') ? 'menu-active' : '' }}"><a href="#services" class="__nav-link">Services</a></li>
                <li class="{{ request()->is('/#skills') ? 'menu-active' : '' }}"><a href="#skills" class="__nav-link">Skills</a></li>
                <li class="{{ request()->is('/#portifolio') ? 'menu-active' : '' }}"><a href="#portfolio" class="__nav-link">Portfolio</a></li>
                <li class="{{ request()->is('/#team') ? 'menu-active' : '' }}"><a href="#team" class="__nav-link">Our Team</a></li>
                <li class="{{ request()->is('/#testimonials') ? 'menu-active' : '' }}"><a href="#testimonials" class="__nav-link">Testimonials</a></li>
                <li class="{{ request()->is('/#clients') ? 'menu-active' : '' }}"><a href="#clients" class="__nav-link">Our Clients</a></li>
                <li class="{{ request()->is('/#contact') ? 'menu-active' : '' }}"><a href="#contact" class="__nav-link">Contact</a></li>
            </ul>
        </nav>


    </div>
</header>
<!-- Header Section End -->
