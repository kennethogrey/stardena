<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $visitors = Visitor::all();
        return view('dashboard.dashboard', compact(
            'visitors'
        ))->render();
    }

    public function deleteVisitor($id)
    {
        $deleted_visitor = Visitor::find($id);
        $deleted_suc = $deleted_visitor->delete();
        if ($deleted_suc) {
            return redirect()->back()->with('success', 'Visitor Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function partners() 
    {
        return view('users.partners');
    }

    public function sendNewsletter(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        $subject = $validated['subject'];
        $message = $validated['message'];

        // Get all emails from the Newsletter table
        $emails = Newsletter::pluck('email');

        // Send email to each email address
        $success = true;
        foreach ($emails as $email) {
            try {
                Mail::raw($message, function($mail) use ($email, $subject) {
                    $mail->to($email)
                        ->subject($subject);
                });
            } catch (\Exception $e) {
                $success = false;
            }
        }

        if ($success) {
            return response()->json(['status' => 'success', 'message' => 'Newsletters Sent Successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Something Went Wrong, Try Again']);
        }
    }

}
