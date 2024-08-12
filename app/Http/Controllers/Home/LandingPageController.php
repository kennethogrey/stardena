<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\System;
use App\Models\Contact;
use App\Models\Visitor;
use App\Models\Partner;
use App\Models\Newsletter;
use DB;

class LandingPageController extends Controller
{
    public function index()
    {
        $ip_address = request()->ip();
        // Check for existing session or cookie
        if (!session()->has('visitor_id')) {
            $visitorId = uniqid();
            session()->put('visitor_id', $visitorId);
            Visitor::updateOrCreate(['visitor_id' => $visitorId], [
                'counter' => DB::raw('counter + 1'),
                'ip_address' => $ip_address,
            ]);
        } else {
            $visitorId = session()->get('visitor_id');
            Visitor::updateOrCreate(['visitor_id' => $visitorId], [
                'counter' => DB::raw('counter + 1'),
                'ip_address' => $ip_address,
            ]);
        }

        // Fetch developers
        $developers = User::where('status', 1)
            ->whereIn('role', ['admin', 'developer', 'staff'])
            ->get();

        // Fetch partners with specific columns
        $partners = Partner::pluck('company_logo', 'domain_name')->toArray();
        $project_counter = count($partners);

        // Count clients
        $clientCount = User::where('role', 'client')->orWhere('staff', 'client')->count();

        // Fetch staff with their profile details
        $staff = User::with('profileDetails')->get();

        $products = System::where('system_status', 1)->get();
        $categories = $products->pluck('software_category')->unique();
        return view('landing-page.welcome', compact(
            'partners',
            'project_counter',
            'developers',
            'clientCount',
            'staff',
            'products',
            'categories',
        ))->render();
    }


    public function contactUs(Request $request)
    {
        $contact_us = Contact::create($request->only(['name', 'email', 'phone', 'subject', 'message']));
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

    public function staffResume($id) 
    {
        if ($id === 'qwerty') {
            return back()->with('error', 'Resume Not Updated Yet');
        }
        
        $staff = User::with('profileDetails')->where('id', $id)->first();
        return view('landing-page.single-team', compact(
            'staff',
        ));

    }

    public function emailNewsLetter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|max:255|email',
        ]);

        $email_list = Newsletter::create($request->only(['email']));

        if ($email_list) {
            return redirect()->back()->with('success', 'Email Saved Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong, Please Subscribe Again');
        }
    }

}
