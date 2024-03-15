<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LandingPageController extends Controller
{
    public function index()
    {
        $developers = User::where('role_id', 2)->get();
        return view('landing-page.welcome', compact(
            'developers'
        ))->render();
    }

    
}
