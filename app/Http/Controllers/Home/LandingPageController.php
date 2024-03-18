<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;

class LandingPageController extends Controller
{
    public function index()
    {
        $developers = User::where('role_id', 2)->get();
        return view('landing-page.welcome', compact(
            'developers'
        ))->render();
    }

    public function contactUs(Request $request)
    {
        $contact_us = Contact::create($request->only(['name', 'email', 'subject', 'message']));
        if ($contact_us) {
            return redirect()->back()->with('success', 'Message Sent Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong, Please resend Message');
        }
    }

    public function visitorsMessage()
    {
        $feedbacks = Contact::all();
        return view('dashboard.messages', compact(
            'feedbacks'
        ));
    }

    public function deleteMessage($id) 
    {
        $deleted_msg = Contact::find($id);
        $deleted_suc = $deleted_msg->delete();
        if ($deleted_suc) {
            return redirect()->back()->with('success', 'Message Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }
    
}
