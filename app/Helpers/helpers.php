<?php

function getFaviconUrl()
{
    return asset('panel/assets/img/favicon.ico');
}

function getLogoUrl()
{
    return asset('panel/assets/img/stardena.png');
}

function getUserPhoto()
{
    $user = Auth::user();

    if (isset($user) && isset($user->profile_photo)) {
        return asset('storage/profile-photos/' . $user->profile_photo);
    } else {
        return asset('panel/assets/img/avatars/8.jpg');
    }
}

if (!function_exists('home_url')) {
    function home_url()
    {
        return url('/');
    }
}


if (!function_exists('meta_description')) {
    function meta_description(){
        echo 'Stardena is a leading software development company specializing in innovative solutions and exceptional service. We turn your ideas into powerful, custom-built software designed to drive success.';
    }
}
