<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Visitor;
use App\Models\Partner;
use App\Models\Newsletter;
use DB;

class LandingPageController extends Controller
{
    public function index()
    {
        // Check for existing session or cookie
        //Notice This algo is not accurate as per now
        if (!session()->has('visitor_id')) {
            // Generate a unique session ID
            $visitorId = uniqid();
            session()->put('visitor_id', $visitorId);
            Visitor::updateOrCreate(['visitor_id' => $visitorId],[
                'counter' => DB::raw('counter + 1'),
            ]);
        } else {
            $visitorId = session()->get('visitor_id');
            Visitor::updateOrCreate(['visitor_id' => $visitorId],[
                'counter' => DB::raw('counter + 1'),
            ]);
        }
        $developers = User::where('status', 1)
            ->whereIn('role', ['admin', 'developer', 'staff'])
            ->get();

        $originalPartners = Partner::all();
        $clonedPartners = $originalPartners->map(function ($partner) {
            return clone $partner;
        });
        $partners = $clonedPartners->pluck('company_logo', 'domain_name')->toArray();
        $project_counter = $clonedPartners->count();
        // dd($partners);

        $originalUsers = User::all();
        $clonedUsers = $originalUsers->map(function ($user) {
            return clone $user;
        });

        $client_counter = $clonedUsers->filter(function ($user) {
            return $user->role === 'client' || $user->staff === 'client';
        });
        $clientCount = $client_counter->count();

        $staff = User::with('profileDetails')->get();
        return view('landing-page.welcome', compact(
            'partners',
            'project_counter',
            'developers',
            'clientCount',
            'staff',
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
        $email_list = Newsletter::create($request->only(['email']));
        if ($email_list) {
            return redirect()->back()->with('success', 'Email Saved Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong, Please Subscribe Again');
        }
    }
}
