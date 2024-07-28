@extends('landing-page.layout.landing-page')
@section('title', 'Staff - Resume')
@section('content')

<!-- Resume Section Start -->
 @if ($staff)
    <div id="rs-resume" class="rs-resume pt-5 md-pt-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 pb-100"> 
                    <div class="sec-title mb-50"><br><br><br>
                        <div class="sub-text style4-bg">{{ $staff->name }}</div>
                        <h2 class="title  pb-20">
                            {{__('This Entails The Resume/CV of ')}}{{ $staff->name }}
                        </h2>
                        <div class="desc">
                            {!! $staff->profileDetails ? $staff->profileDetails->resume : 'Resume Not Updated Yet' !!}                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Services Section Start -->
                    <div class="rs-services style3 md-pt-50">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 pr-10 pt-40 sm-pt-0 sm-pr-0 sm-pl-0">
                                    <div class="services-item cyan-bg">
                                        @if ($staff->profile_photo)
                                            <a href="//"><img src="{{asset('storage/profile-photos/' . $staff->profile_photo)}}" alt="" style="width: 700px;"></a>
                                        @else
                                            <a href="//"><img src="{{asset('panel/assets/img/avatars/8.jpg');}}" alt="" style="width: 700px;"></a>
                                        @endif
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
 @endif
<!-- Resume Section End -->
@endsection