<!--Full width header Start-->
<div class="full-width-header">
    <!--Header Start-->
    <header id="rs-header" class="rs-header style3 modify2 header-transparent">
        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="logo-part">
                            <a href="/">
                                <img class="normal-logo" src="{{asset('front/assets/images/stardena_orange.png')}}" alt="logo">
                                <img class="sticky-logo" src="{{asset('front/assets/images/stardena_blue.png')}}" alt="logo">
                            </a>
                        </div>
                        <div class="mobile-menu">
                            <a href="#" class="rs-menu-toggle rs-menu-toggle-close">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 text-right">
                        <div class="rs-menu-area">
                            <div class="main-menu">
                                <nav class="rs-menu pr-100 md-pr-0">
                                    <ul id="onepage-menu" class="nav-menu">
                                        @if (!Route::is('staff-resume'))
                                            <li> <a href="#rs-header">{{__('Home')}}</a></li>
                                            <li><a href="#rs-about">{{__('About')}}</a></li>
                                            <li><a href="#rs-services">{{__('Services')}}</a></li>
                                            <li><a href="#rs-team">{{__('Team')}}</a></li>
                                            @if($products->count() > 0)
                                                <li><a href="#rs-portfolio">Products</a></li>
                                            @endif
                                            <!-- <li><a href="#rs-blog">Blog</a></li> -->
                                            <li><a href="#rs-contact">{{__('Contact')}}</a></li>
                                        @else
                                            <li><a href="#rs-resume">{{__('Staff Resume')}}</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <div class="expand-btn-inner search-icon hidden-md">
                                <ul>
{{--                                    <li class="sidebarmenu-search">--}}
{{--                                        <a class="hidden-xs rs-search" data-target=".search-modal"--}}
{{--                                            data-toggle="modal" href="#">--}}
{{--                                            <i class="flaticon-search"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                    <li>
                                        <a id="nav-expander" class="humburger nav-expander" href="#">
                                            <span class="dot1"></span>
                                            <span class="dot2"></span>
                                            <span class="dot3"></span>
                                            <span class="dot4"></span>
                                            <span class="dot5"></span>
                                            <span class="dot6"></span>
                                            <span class="dot7"></span>
                                            <span class="dot8"></span>
                                            <span class="dot9"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->
    </header>
    <!--Header End-->

    <!-- Canvas Menu start -->
    <nav class="right_menu_togle hidden-md">
        <div class="close-btn">
            <div class="nav-link">
                <a id="nav-close" class="humburger nav-expander" href="#">
                    <span class="dot1"></span>
                    <span class="dot2"></span>
                    <span class="dot3"></span>
                    <span class="dot4"></span>
                    <span class="dot5"></span>
                    <span class="dot6"></span>
                    <span class="dot7"></span>
                    <span class="dot8"></span>
                    <span class="dot9"></span>
                </a>
            </div>
        </div>
        <div class="canvas-logo">
            <a href="index.html"><img src="{{asset('front/assets/images/stardena_blue.png')}}" alt="logo"></a>
        </div>
        <div class="offcanvas-text">
            <p>{{__('To empower organizations with innovative ICT solutions that enhance efficiency, connectivity, and security.')}}</p>
        </div>
        <div class="canvas-contact">
            <div class="address-area">
                <div class="address-list">
                    <div class="info-icon">
                        <i class="flaticon-location"></i>
                    </div>
                    <div class="info-content">
                        <h4 class="title">{{__('Address')}}</h4>
                        <em>{{__('Makerere-Kikoni. Kampala')}}</em>
                    </div>
                </div>
                <div class="address-list">
                    <div class="info-icon">
                        <i class="flaticon-email"></i>
                    </div>
                    <div class="info-content">
                        <h4 class="title">{{__('Email')}}</h4>
                        <em><a href="mailto:info@stardena.com">{{__('info@stardena.com')}}</a></em>
                    </div>
                </div>
                <div class="address-list">
                    <div class="info-icon">
                        <i class="flaticon-call"></i>
                    </div>
                    <div class="info-content">
                        <h4 class="title">{{__('Phone')}}</h4>
                        <a href="tel:0781315904"><em>{{__('+256 781 315904')}}</em></a>
                        <a href="tel:0776263482"><em>{{__('+256 776 263482')}}</em></a>
                    </div>
                </div>
            </div>
{{--            <ul class="social">--}}
{{--                <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>--}}
{{--                <li><a href="#"><i class="fa fa-instagram"></i></a></li>--}}
{{--            </ul>--}}
        </div>
    </nav>
    <!-- Canvas Menu end -->
</div>
<!--Full width header End-->
