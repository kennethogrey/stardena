<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\User;
use App\Models\Partner;
use App\Mail\NewsEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $minutes = 10;
        $sessions = DB::table(config('session.table'))->distinct()
        ->select(['users.id', 'users.name', 'users.email', 'users.profile_photo', 'sessions.last_activity'])
        ->where('sessions.last_activity', '>', Carbon::now()->subMinutes($minutes)->getTimestamp())
        ->leftJoin('users', config('session.table') . '.user_id', '=', 'users.id')
        ->get();

        $visitors = Visitor::all();
        $user_count = User::count();
        $income = Partner::sum('amount_paid');
        $sessionz = DB::table('visitors')->count();


        return view('dashboard.dashboard', compact(
            'visitors',
            'sessions',
            'user_count',
            'income',
            'sessionz',
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
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'unsubscribe' => 'required|in:yes,no'
        ]);
        
        $subject = $validated['subject'];
        $message = $validated['message'];
        $unsubscribe = $validated['unsubscribe'];
        
        if ($unsubscribe === 'yes') {
            $emails = Newsletter::pluck('email');
            $success = true;
        } else {
            $emails = Newsletter::where('status', 1)->pluck('email');
            $success = true;
        }

        foreach ($emails as $email) {
            try {
                Mail::to($email)->send(new NewsEmail((string)$message, (string)$subject));
            } catch (\Exception $e) {
                \Log::error("Failed to send email to ".$email .": ". $e->getMessage());
                $success = false;
            }
        }

        if ($success) {
            return response()->json(['status' => 'success', 'message' => 'Newsletters Sent Successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Something Went Wrong, Try Again']);
        }
    }

    public function deleteNewsletter(Request $request)
    {
        $deleted_email = Newsletter::find($request['email_id']);
        if (auth()->user()->role !== 'admin') {
            return response()->json(['status' => 'error', 'message' => 'You don\'t have Permissions to Delete a Subcriber']);
        } else {
            if ($deleted_email->delete()) {
                return response()->json(['status' => 'success', 'message' => 'Newsletters Deleted Successfully']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Something Went Wrong, Try Again']);
            }     
        }
    }

    public function showChart() {
        $partners = Partner::selectRaw('SUM(amount_paid) as total_paid, DATE_FORMAT(updated_at, "%Y-%m") as month')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();
    
        // Prepare data points for the chart
        $dataPoints = [];
        foreach ($partners as $partner) {
            $formattedMonth = Carbon::createFromFormat('Y-m', $partner->month)->format('F Y'); // e.g., "August 2024"
            $dataPoints[] = [
                'label' => $formattedMonth,
                'y' => (float) $partner->total_paid, // Ensure it's treated as a number
            ];
        }
    
        return response()->json($dataPoints);
    }
    
    
}