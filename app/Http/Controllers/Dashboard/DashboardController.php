<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;

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
}
