@extends('landing-page.layout.landing-page')
@section('title', 'Home - Stardena')
@section('content')

    <!-- Banner Section Start -->
    <div class="rs-banner style3 rs-rain-animate modify1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <div class="rs-videos">
                            <div class="animate-border white-color style3">
                                <a class="popup-border popup-videos"
                                    href="https://www.youtube.com/watch?v=YLN1Argi7ik">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <h1 class="title">
                            I.T Infrastructure For Your Business Needs...
                        </h1>
                        <p class="desc">
                            Stardena is a dynamic portfolio tech company specializing in the development of innovative solutions across A.I, web, mobile apps, and embedded systems.     
                        </p>
                        <ul class="banner-btn">
                            <li><a class="readon started" href="#rs-contact">Get Started</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="images-part hidden-md">
            <img src="{{asset('front/assets/images/banner/banner-4.png')}}" alt="">
        </div>
        <div class="line-inner style2">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Partner Start -->
    <div class="rs-partner style2 pt-30 pb-50">
        <div class="container">
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="30"
                data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                data-mobile-device="2" data-mobile-device-nav="false" data-mobile-device-dots="false"
                data-ipad-device="4" data-ipad-device-nav="false" data-ipad-device-dots="false"
                data-ipad-device2="3" data-ipad-device-nav2="false" data-ipad-device-dots2="false"
                data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
                @foreach ($partners as $domain => $logo)
                    <div class="partner-item">
                        <div class="logo-img">
                            <a href="{{ $domain }}">
                                <img class="wrapper" src="{{ asset('storage/files/logos/' . $logo) }}" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Partner End -->

    <!-- About Section Start -->
    <div id="rs-about" class="rs-about pt-5 md-pt-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 pb-100"> 
                    <div class="sec-title mb-50">
                        <div class="sub-text style4-bg">About Us</div>
                        <h2 class="title  pb-20">
                            Stardena Tech Solutions: Pioneering Innovation Across Multiple Platforms
                        </h2>
                        <div class="desc">
                            At Stardena Tech Solutions, we are more than just a tech company. 
                            We are innovators, creators, and problem solvers dedicated to pushing the 
                            boundaries of technology. Founded in January 2024 by software engineers 
                            Ogire Kenneth and Eluk Samuel Kiira, Stardena has quickly emerged as a 
                            dynamic force in the Software industry.                            
                        </div>
                    </div>
                    <!-- Counter Section Start -->
                    <div class="rs-counter style3">
                        <div class="container">
                            <div class="counter-top-area">
                                <div class="row">
                                    <div class="col-sm-6 sm-pr-0 sm-pl-0 xs-mb-30">
                                        <div class="counter-list">
                                            <div class="counter-text">
                                                <div class="count-number">
                                                    <span class="rs-count plus orange-color">
                                                        @if ($clientCount)
                                                            {{ $clientCount }}
                                                        @else
                                                            {{__('12')}}
                                                        @endif
                                                    </span>
                                                </div>
                                                <h3 class="title">{{__('Happy Clients')}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 sm-pr-0 sm-pl-0">
                                        <div class="counter-list">
                                            <div class="counter-text">
                                                <div class="count-number">
                                                    <span class="rs-count plus">
                                                        @if ($project_counter)
                                                            {{ $project_counter }}
                                                        @else
                                                            {{__('5')}}
                                                        @endif
                                                    </span>
                                                </div>
                                                <h3 class="title">{{__('Project Delivered')}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Counter Section End -->
                </div>
                <div class="col-lg-7">
                    <!-- Services Section Start -->
                    <div class="rs-services style3 md-pt-50">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 pr-10 pt-40 sm-pt-0 sm-pr-0 sm-pl-0">
                                    <div class="services-item mb-20">
                                        <div class="services-icon">
                                            <div class="image-part">
                                                <img class="main-img"
                                                    src="{{asset('front/assets/images/services/style3/main-img/1.png')}}" alt="">
                                                <img class="hover-img"
                                                    src="{{asset('front/assets/images/services/style3/hover-img/1.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="services-content">
                                            <div class="services-text">
                                                <h3 class="title"><a href="#">High-quality Code</a></h3>
                                            </div>
                                            <div class="services-desc">
                                                <p>
                                                    We Write code that meets certain standards of readability, maintainability, efficiency, and reliability            
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="services-item cyan-bg">
                                        <div class="services-icon">
                                            <div class="image-part">
                                                <img class="main-img"
                                                    src="{{asset('front/assets/images/services/style3/main-img/2.png')}}" alt="">
                                                <img class="hover-img"
                                                    src="{{asset('front/assets/images/services/style3/hover-img/2.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="services-content">
                                            <div class="services-text">
                                                <h3 class="title"><a href="#">Scalability</a></h3>
                                            </div>
                                            <div class="services-desc">
                                                <p>
                                                    Software solutions that can grow with the client's business and adapt to increasing demands and user bases.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-10 sm-pr-0 sm-pl-0 sm-mt-20">
                                    <div class="services-item gold-bg mb-20">
                                        <div class="services-icon">
                                            <div class="image-part">
                                                <img class="main-img"
                                                    src="{{asset('front/assets/images/services/style3/main-img/3.png')}}" alt="">
                                                <img class="hover-img"
                                                    src="{{asset('front/assets/images/services/style3/hover-img/3.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="services-content">
                                            <div class="services-text">
                                                <h3 class="title"><a href="#">Agile Approach</a></h3>
                                            </div>
                                            <div class="services-desc">
                                                <p>
                                                    For flexible development, quick iterations, and rapid responses to changing requirements.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="services-item blue-bg">
                                        <div class="services-icon">
                                            <div class="image-part">
                                                <img class="main-img"
                                                    src="{{asset('front/assets/images/services/style3/main-img/4.png')}}" alt="">
                                                <img class="hover-img"
                                                    src="{{asset('front/assets/images/services/style3/hover-img/4.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="services-content">
                                            <div class="services-text">
                                                <h3 class="title"><a href="#">Ethical Practices</a></h3>
                                            </div>
                                            <div class="services-desc">
                                                <p>
                                                    Operates ethically, respecting intellectual property rights, privacy, and security standards.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Services Section End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Services Section Start -->
    <div id="rs-services" class="rs-services style3 rs-rain-animate gray-color pt-5 pb-120 md-pt-70 md-pb-80">
        <div class="container">
            <div class="row md-mb-60">
                <div class="col-lg-6 mb-60 md-mb-20">
                    <div class="sec-title2 md-center">
                        <span class="sub-text">Services</span>
                        <h2 class="title testi-title">
                            What Solutions We Provide to Our Valued Customers
                        </h2>
                    </div>
                </div>
                <div class="col-lg-6 mb-60 md-mb-0">
                    <div class="btn-part text-right mt-60 md-mt-0 md-center">
                        <a class="readon started" href="login">Get Started</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-20">
                    <div class="services-item">
                        <div class="services-icon">
                            <div class="image-part">
                                <img class="main-img" src="{{asset('front/assets/images/services/style2/main-img/1.png')}}" alt="">
                                <img class="hover-img" src="{{asset('front/assets/images/services/style2/hover-img/1.png')}}" alt="">
                            </div>
                        </div>
                        <div class="services-content">
                            <div class="services-text">
                                <h3 class="title"><a href="#">Mobile Apps</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    From concept to deployment, we craft engaging and scalable mobile apps that 
                                    captivate audiences
                                </p>
                            </div>
                            <div class="serial-number">
                                01
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-20">
                    <div class="services-item pink-bg">
                        <div class="services-icon">
                            <div class="image-part">
                                <img class="main-img" src="{{asset('front/assets/images/services/style2/main-img/2.png')}}" alt="">
                                <img class="hover-img" src="{{asset('front/assets/images/services/style2/hover-img/2.png')}}" alt="">
                            </div>
                        </div>
                        <div class="services-content">
                            <div class="services-text">
                                <h3 class="title"><a href="#">Web Development</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    Our web development services are tailored to meet the unique needs of each client, 
                                    ensuring user-friendly interfaces and robust functionality.
                                </p>
                            </div>
                            <div class="serial-number">
                                02
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-20">
                    <div class="services-item aqua-bg">
                        <div class="services-icon">
                            <div class="image-part">
                                <img class="main-img" src="{{asset('front/assets/images/services/style2/main-img/3.png')}}" alt="">
                                <img class="hover-img" src="{{asset('front/assets/images/services/style2/hover-img/3.png')}}" alt="">
                            </div>
                        </div>
                        <div class="services-content">
                            <div class="services-text">
                                <h3 class="title"><a href="#">Analytic Solutions</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    Data-driven tools extracting insights for informed decision-making and optimization for an organization or individuals.
                                </p>
                            </div>
                            <div class="serial-number">
                                03
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 md-mb-20">
                    <div class="services-item paste-bg">
                        <div class="services-icon">
                            <div class="image-part">
                                <img class="main-img" src="{{asset('front/assets/images/services/style2/main-img/4.png')}}" alt="">
                                <img class="hover-img" src="{{asset('front/assets/images/services/style2/hover-img/4.png')}}" alt="">
                            </div>
                        </div>
                        <div class="services-content">
                            <div class="services-text">
                                <h3 class="title"><a href="#">Videography</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    Capturing moments with precision and creativity, offering professional
                                        videography services for all your needs.
                                </p>
                            </div>
                            <div class="serial-number">
                                04
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 sm-mb-20">
                    <div class="services-item blue-bg">
                        <div class="services-icon">
                            <div class="image-part">
                                <img class="main-img" src="{{asset('front/assets/images/services/style2/main-img/5.png')}}" alt="">
                                <img class="hover-img" src="{{asset('front/assets/images/services/style2/hover-img/5.png')}}" alt="">
                            </div>
                        </div>
                        <div class="services-content">
                            <div class="services-text">
                                <h3 class="title"><a href="web-development.html">Product & Design</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    Product & Design synergize to create user-centric solutions with aesthetic appeal.
                                </p>
                            </div>
                            <div class="serial-number">
                                05
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="services-item green-bg">
                        <div class="services-icon">
                            <div class="image-part">
                                <img class="main-img" src="{{asset('front/assets/images/services/style2/main-img/6.png')}}" alt="">
                                <img class="hover-img" src="{{asset('front/assets/images/services/style2/hover-img/6.png')}}" alt="">
                            </div>
                        </div>
                        <div class="services-content">
                            <div class="services-text">
                                <h3 class="title"><a href="#">UI/UX design</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    User Interface (UI) and User Experience (UX) design focus on creating intuitive, 
                                    engaging, and functional digital experiences for users
                                </p>
                            </div>
                            <div class="serial-number">
                                06
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="line-inner">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
    <!-- Services Section End -->

    <!-- Team Section Start -->
    <div id="rs-team" class="rs-team onepage-team change-bg rs-rain-animate pt-5 pb-120 md-pt-90 md-pb-90">
        <div class="sec-title2 text-center mb-30">
            <span class="sub-text">Team</span>
            <h2 class="title">
                Expert Team At Your Service
            </h2>
        </div>
        <div class="container">
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true"
                data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2"
                data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3"
                data-md-device-nav="false" data-md-device-dots="true">
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/1.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Makhaia Antitni</a></h4>
                        <span class="designation">President & CEO</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/2.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Corey Anderson</a></h4>
                        <span class="designation">CEO & Founder</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/3.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Masud Rana</a></h4>
                        <span class="designation">Web Developer</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/4.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Najmul Huda</a></h4>
                        <span class="designation">Digital Marketer</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/5.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Rushali Rumi</a></h4>
                        <span class="designation">Design Lead</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/6.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Abu Sayed</a></h4>
                        <span class="designation">App Developer</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/7.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Sonia Akhter</a></h4>
                        <span class="designation">Graphic Artist</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/8.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Rayhan Ali</a></h4>
                        <span class="designation">CEO & Founder</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/9.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Benjir Akther</a></h4>
                        <span class="designation">Graphic Designer</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/1.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Makhaia Antitni</a></h4>
                        <span class="designation">President & CEO</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/2.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Corey Anderson</a></h4>
                        <span class="designation">CEO & Founder</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/3.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Masud Rana</a></h4>
                        <span class="designation">Web Developer</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="team-item-wrap">
                    <div class="team-wrap">
                        <div class="image-inner">
                            <a href="#"><img src="{{asset('front/assets/images/team/style1/4.jpg')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="team-content text-center">
                        <h4 class="person-name"><a href="single-team.html">Najmul Huda</a></h4>
                        <span class="designation">Digital Marketer</span>
                        <ul class="team-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="line-inner">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
    </div>
    <!-- Team Section End -->

    <!-- Contact Section Start -->
    <div id="rs-contact" class="rs-contact gray-color pt-5 md-pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-box">
                        <div class="sec-title mb-45">
                            <span class="sub-text new-text white-color">Let's Talk</span>
                            <h2 class="title white-color">Speak With Expert Engineers.</h2>
                        </div>
                        <div class="address-box mb-25">
                            <div class="address-icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="address-text">
                                <span class="label">Phone:</span>
                                <a href="tel:0781315904">(+256) 781-315904</a>
                            </div>
                        </div>
                        <div class="address-box mb-25">
                            <div class="address-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="address-text">
                                <span class="label">Email:</span>
                                <a href="#">info@stardena.com</a>
                            </div>
                        </div>
                        <div class="address-box">
                            <div class="address-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="address-text">
                                <span class="label">Address:</span>
                                <div class="desc">Makerere Kikoni, Uganda</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pl-70 md-pl-15 md-mt-40">
                    <div class="contact-widget onepage-style">
                        <div class="sec-title2 mb-40">
                            <span class="sub-text contact mb-15">Get In Touch</span>
                            <h2 class="title testi-title">Fill The Form Below</h2>

                        </div>
                        <div id="form-messages"></div>
                        <form id="contact-form" method="post" action="mailer.php">
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="name" name="name"
                                            placeholder="Name" required="">
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="email" name="email"
                                            placeholder="E-Mail" required="">
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="phone" name="phone"
                                            placeholder="Phone Number" required="">
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="website" name="website"
                                            placeholder="Your Website" required="">
                                    </div>

                                    <div class="col-lg-12 mb-30">
                                        <textarea class="from-control" id="message" name="message"
                                            placeholder="Your message Here" required=""></textarea>
                                    </div>
                                </div>
                                <div class="btn-part">
                                    <div class="form-group mb-0">
                                        <input class="readon learn-more submit" type="submit" value="Submit Now">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="map-canvas pt-120 md-pt-70">
            <iframe src="https://maps.google.com/maps?q=rstheme&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
        </div> -->
    </div>
    <!-- Contact Section Start -->

@endsection
