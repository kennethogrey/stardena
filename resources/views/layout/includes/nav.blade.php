<!-- Header Section Start -->
<header class="header">
    <div class="container-fluid">
        <div class="logo pull-left">
{{--            <h1><a href="index.html">{{env("APP_NAME")}}</a></h1>--}}
            <a href="/"><img src="img/logo.png" alt="" title="" /></a>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li><a href="#home" class="__nav-link">Home</a></li>
                <li><a href="#about" class="__nav-link">About</a></li>
                <li><a href="#services" class="__nav-link">Services</a></li>
                <li><a href="#skills" class="__nav-link">Skills</a></li>
                {{--<li><a href="#portfolio" class="__nav-link">Projects</a></li>--}}
                <li><a href="#team" class="__nav-link">Our Team</a></li>
                {{--<li><a href="#testimonials" class="__nav-link">Testimonials</a></li>--}}
                <li><a href="#clients" class="__nav-link">Our Clients</a></li>
                <li><a href="#contact" class="__nav-link">Contact</a></li>
                <a href="{{ route('register') }}" class="">Register</a>
                <a href="{{ route('login') }}" class="">Login</a>
            </ul>
        </nav>
    </div>
</header>
<!-- Header Section End -->
