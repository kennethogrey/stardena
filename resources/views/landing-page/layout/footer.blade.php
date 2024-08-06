    <!-- Footer Start -->
    <footer id="rs-footer" class="rs-footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 footer-widget">
                        <div class="footer-logo mb-30">
                            <a href="//"><img src="{{asset('front/assets/images/stardena_blue.png')}}" alt=""></a>
                        </div>
                        <div class="textwidget pb-30">
                            <p>{{__('In the vibrant tapestry of Africa, we envision a digital landscape where
                                 innovation knows no bounds. Stardena\'s vision is to be a beacon of technological 
                                 empowerment, weaving solutions that harmonize seamlessly with the diverse
                                  rhythms of the continent.')}} </p>
                        </div>
                        <ul class="footer-social md-mb-30">
                            <li>
                                <a href="#" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
                            </li>
                            <li>
                                <a href="# " target="_blank"><span><i class="fa fa-twitter"></i></span></a>
                            </li>

                            <li>
                                <a href="# " target="_blank"><span><i class="fa fa-whatsapp"></i></span></a>
                            </li>
                            <li>
                                <a href="# " target="_blank"><span><i class="fa fa-instagram"></i></span></a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h3 class="widget-title">{{__('Newsletter')}}</h3>
                        <p class="widget-desc">{{__('Subscribe to our newsletter for updates on our
                             latest products and company news.')}}</p>
                        <form method="post" action="{{ route('email-newsletter') }}">
                            @csrf
                            <p>
                                <input type="email" name="email" placeholder="Your email address" required="Email Is Required">
                                <em class="paper-plane"><input type="submit" value="Sign up"></em>
                                <i class="flaticon-send"></i>
                            </p>
                        </form><br>
                        
                        <p class="widget-desc">{{__('Important Links')}}</p>
                        <a class="readon learn-more submit" href="{{ route('register') }}">{{__('Sign Up')}}</a>
                        <a class="readon learn-more submit" href="{{ route('login') }}">{{__('Sign In')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="copyright">
                            <p>&copy; <span id="current-year">{{__('2024')}}</span> {{__('All Rights Reserved.')}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- start scrollUp  -->
    <div id="scrollUp" class="orange-color">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- End scrollUp  -->

    <!-- Search Modal Start -->
    <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="flaticon-cross"></span>
        </button>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="search-block clearfix">
                    <form>
                        <div class="form-group">
                            <input class="form-control" placeholder="Search Here..." type="text">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->
