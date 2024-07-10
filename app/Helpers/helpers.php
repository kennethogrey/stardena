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
