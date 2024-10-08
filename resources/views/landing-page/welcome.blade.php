@extends('landing-page.layout.landing-page')
@section('title', 'Home - Stardena')
@section('content')

    <!-- Banner Section Start -->
    <div class="rs-banner style3 rs-rain-animate modify1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-content">
{{--                        <div class="rs-videos">--}}
{{--                            <div class="animate-border white-color style3">--}}
{{--                                <a class="popup-border popup-videos"--}}
{{--                                    href="https://www.youtube.com/watch?v=YLN1Argi7ik">--}}
{{--                                    <i class="fa fa-play"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <h1 class="title">
                            {{__('"Empowering Innovation, Crafting Excellence"')}}
                        </h1>
                        <p class="desc">
                            {{__('At Stardena, we transform ideas into cutting-edge software solutions. Partner with us to bring your vision to life with precision, creativity, and unmatched expertise.')}}
                        </p>
                        <ul class="banner-btn">
                            <li><a class="readon started" href="#rs-contact">{{__('Get Started')}}</a></li>
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
                            <a href="{{ $domain }}" target="_blank">
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
                        <div class="sub-text style4-bg">{{__('About Us')}}</div>
                        <h2 class="title  pb-20">
                            {{__('Stardena Tech Solutions: Pioneering Innovation Across Multiple Platforms...')}}
                        </h2>
                        <div class="desc">
                            {{__('At Stardena Tech Solutions, we are more than just a tech company.
                            We are innovators, creators, and problem solvers dedicated to pushing the
                            boundaries of technology. Founded in January 2024 by software engineers
                            Ogire Kenneth and Eluk Samuel Kiira, Stardena has quickly emerged as a
                            dynamic force in the Software industry. ')}}
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
                                                <h3 class="title"><a href="#">{{__('High-quality Code.')}}</a></h3>
                                            </div>
                                            <div class="services-desc">
                                                <p>
                                                    {{__('We Write code that meets certain standards of readability, maintainability, efficiency, and reliability.')}}
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
                                                <h3 class="title"><a href="#">{{__('Scalability.')}}</a></h3>
                                            </div>
                                            <div class="services-desc">
                                                <p>
                                                    {{__('Software solutions that can grow with the client\'s business and adapt to increasing demands and user bases.')}}
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
                                                <h3 class="title"><a href="#">{{__('Agile Approach.')}}</a></h3>
                                            </div>
                                            <div class="services-desc">
                                                <p>
                                                    {{__('For flexible development, quick iterations, and rapid responses to changing requirements.')}}
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
                                                <h3 class="title"><a href="#">{{__('Ethical Practices.')}}</a></h3>
                                            </div>
                                            <div class="services-desc">
                                                <p>
                                                    {{__('Operates ethically, respecting intellectual property rights, privacy, and security standards.')}}
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
                        <span class="sub-text">{{__('Services.')}}</span>
                        <h2 class="title testi-title">
                            {{__('What Solutions We Provide to Our Valued Customers')}}
                        </h2>
                    </div>
                </div>
                <div class="col-lg-6 mb-60 md-mb-0">
                    <div class="btn-part text-right mt-60 md-mt-0 md-center">
                        <a class="readon started" href="#rs-contact">{{__('Get Started.')}}</a>
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
                                <h3 class="title"><a href="#">{{__('Mobile Apps')}}</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    {{__('From concept to deployment, we craft engaging and scalable mobile apps that
                                    captivate audiences')}}
                                </p>
                            </div>
                            <div class="serial-number">{{__('01')}}</div>
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
                                <h3 class="title"><a href="#">{{__('Web Development.')}}</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    {{__('Our web development services are tailored to meet the unique needs of each client,
                                    ensuring user-friendly interfaces and robust functionality.')}}
                                </p>
                            </div>
                            <div class="serial-number">{{__('02')}}</div>
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
                                <h3 class="title"><a href="#">{{__('Analytic Solutions.')}}</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    {{__('Data-driven tools extracting insights for informed decision-making and optimization for an organization or individuals.')}}
                                </p>
                            </div>
                            <div class="serial-number">{{__('03')}}</div>
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
                                <h3 class="title"><a href="#">{{__('Videography')}}</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    {{__('Capturing moments with precision and creativity, offering professional
                                        videography services for all your needs.')}}
                                </p>
                            </div>
                            <div class="serial-number">{{__('04')}}</div>
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
                                <h3 class="title"><a href="web-development.html">{{__('Product & Design.')}}</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    {{__('Product & Design synergize to create user-centric solutions with aesthetic appeal.')}}
                                </p>
                            </div>
                            <div class="serial-number">{{__('05')}}</div>
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
                                <h3 class="title"><a href="#">{{__('UI/UX design')}}</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    {{__('User Interface (UI) and User Experience (UX) design focus on creating intuitive,
                                    engaging, and functional digital experiences for users')}}
                                </p>
                            </div>
                            <div class="serial-number">{{__('06')}}</div>
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
            <span class="sub-text">{{__('Team')}}</span>
            <h2 class="title">{{__('Expert Team At Your Service')}}</h2>
        </div>
        <div class="container">
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true"
                data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2"
                data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3"
                data-md-device-nav="false" data-md-device-dots="true">
                @foreach ($staff as $staff)
                    <div class="team-item-wrap">
                        <div class="team-wrap">
                            <div class="image-inner">
                                @if ($staff->profile_photo)
                                    <a href="//"><img src="{{asset('storage/profile-photos/' . $staff->profile_photo)}}" alt=""></a>
                                @else
                                    <a href="//"><img src="{{asset('panel/assets/img/avatars/8.jpg')}}" alt=""></a>
                                @endif
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4 class="person-name"><a href="{{ route('staff-resume', $staff->profileDetails ? $staff->profileDetails->user_id : 'qwerty') }}" target="_blank">{{ $staff->name }}</a></h4>
                            <span class="designation">
                            {{ $staff->profileDetails ? $staff->profileDetails->title : 'Staff' }}
                            </span>
                            <ul class="team-social">
                            @if ($staff->profileDetails)
                                <ul class="social-links">
                                    @if ($staff->profileDetails->facebook)
                                        <li><a href="{{ $staff->profileDetails->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                    @endif
                                    @if ($staff->profileDetails->instagram)
                                        <li><a href="{{ $staff->profileDetails->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                    @endif
                                    @if ($staff->profileDetails->linkedin)
                                        <li><a href="{{ $staff->profileDetails->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                    @endif
                                    @if ($staff->profileDetails->whatsapp)
                                        <li><a href="{{ $staff->profileDetails->whatsapp }}"><i class="fa fa-whatsapp"></i></a></li>
                                    @endif
                                    @if ($staff->profileDetails->twitter)
                                        <li><a href="{{ $staff->profileDetails->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if ($staff->profileDetails->pinterest)
                                        <li><a href="{{ $staff->profileDetails->pinterest }}"><i class="fa fa-pinterest-p"></i></a></li>
                                    @endif
                                </ul>
                            @endif
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="line-inner">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
    </div>
    <!-- Team Section End -->

    <!-- Project Section Start -->
    @if($products->count() > 0)
        <div id="rs-portfolio" class="rs-project style4 rs-rain-animate pt-110 pb-120 md-pt-70 md-pb-80">
            <div class="container">
                <div class="sec-title2 text-center mb-45">
                    <span class="sub-text">{{__('Projects')}}</span>
                    <h2 class="title title2">
                        {{__('Our Projects Available in the Market')}}
                    </h2>
                </div>

                <div class="row mb-5 justify-content-center">
                    <div class="col-10 text-center">
                        <div class="btn-group btn-group-toggle " data-toggle="buttons">
                            <label class="btn active">
                                <input type="radio" name="shuffle-filter" value="all" checked="checked" />{{ __('All Projects') }}
                            </label>
                            @foreach($categories as $category)
                                <label class="btn">
                                    <input type="radio" name="shuffle-filter" value="{{ $category }}" />{{ $category }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row shuffle-wrapper portfolio-gallery">
                    @foreach($products as $product)
                        <div class="col-lg-4 mb-30 shuffle-item" data-groups='["{{ $product->software_category }}"]'>
                            <div class="project-item">
                                <div class="project-img">
                                    <img src="{{ asset('front/assets/images/project/style2/'.$product->image) }}" alt="{{ $product->inventory_name }}">
                                </div>
                                <div class="project-content">
                                    <p class="category"><a href="{{ $product->demo_link }}" target="_blank">{{ $product->software_category }}</a></p>
                                    <h3 class="title"><a href="{{ $product->demo_link }}" target="_blank">{{ $product->inventory_name }}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- Project Section End -->

    <!-- Testimonial Section Start -->
    <div class="rs-testimonial main-home rs-rain-animate style4 modify1 md-fixing">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 hidden-md">
                    <div class="testi-image">
                        <img src="{{ asset('front/assets/images/testimonial/testimonial-2.png')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 pl-50 md-pl-15">
                    <div class="sec-title mb-50">
                        <div class="sub-text style4-bg left testi">Testimonials</div>
                        <h2 class="title pb-20">
                            What Customer Saying
                        </h2>
                        <div class="desc">
                            Over 25 years working in IT services developing software applications and mobile apps
                            for clients all over the world.
                        </div>
                    </div>
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="30"
                         data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000"
                         data-smart-speed="800" data-dots="true" data-nav="false" data-nav-speed="false"
                         data-md-device="1" data-md-device-nav="false" data-md-device-dots="false"
                         data-center-mode="false" data-ipad-device2="1" data-ipad-device-nav2="false"
                         data-ipad-device-dots2="false" data-ipad-device="1" data-ipad-device-nav="false"
                         data-ipad-device-dots="true" data-mobile-device="1" data-mobile-device-nav="false"
                         data-mobile-device-dots="false">
                        @foreach($testimonials as $testimonial)
                            <div class="testi-item">
                                <div class="author-desc">
                                    <div class="desc"><img class="quote" src="{{ asset('front/assets/images/testimonial/main-home/quote2.png')}}" alt="">Capitalize on
                                        {{$testimonial->message}}
                                    </div>
                                </div>
                                <div class="testimonial-content">
                                    <div class="author-img">
                                        <img src="{{ asset('testimonialImages/' . $testimonial->image) }}" alt="">
                                    </div>
                                    <div class="author-part">
                                        <a class="name" href="#">{{$testimonial->name}}</a>
                                        <span class="designation">{{$testimonial->occupation}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
    <!-- Testimonial Section End -->

    <!-- Contact Section Start -->
    <div id="rs-contact" class="rs-contact gray-color pt-120 md-pt-80 pb-120 md-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-box">
                        <div class="sec-title mb-45">
                            <span class="sub-text new-text white-color">{{__('Let\'s Talk')}}</span>
                            <h2 class="title white-color">{{__('Speak With Expert Engineers.')}}</h2>
                        </div>
                        <div class="address-box mb-25">
                            <div class="address-icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="address-text">
                                <span class="label">{{__('Phone:')}}</span>
                                <a href="tel:0781315904">{{__('(+256) 781-315904')}}</a>
                            </div>
                        </div>
                        <div class="address-box mb-25">
                            <div class="address-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="address-text">
                                <span class="label">{{__('Email:')}}</span>
                                <a href="mailto:info@stardena.com">{{__('info@stardena.com')}}</a>
                            </div>
                        </div>
                        <div class="address-box">
                            <div class="address-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="address-text">
                                <span class="label">{{__('Address:')}}</span>
                                <div class="desc">{{__('Makerere Kikoni, Uganda')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pl-70 md-pl-15 md-mt-40">
                    <div class="contact-widget onepage-style">
                        <div class="sec-title2 mb-40">
                            <span class="sub-text contact mb-15">{{__('Get In Touch')}}</span>
                            <h2 class="title testi-title">{{__('Fill The Form Below')}}</h2>
                        </div>
                        <form method="post" action="{{ route('contact-us') }}">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="name" name="name"
                                            placeholder="Name" required="Your name is required">
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="email" name="email"
                                            placeholder="E-Mail" required="Your email is required">
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="phone" name="phone"
                                            placeholder="Phone Number" required="Your phone is required">
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="subject" name="subject"
                                            placeholder="Subject" required="Your subject is required">
                                    </div>

                                    <div class="col-lg-12 mb-30">
                                        <textarea class="from-control" id="message" name="message"
                                            placeholder="Your message Here" required="Your message is required"></textarea>
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
