<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Storage;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userIndex()
    {
        return view('users.users')->render();
    }

    public function userStatus($id) 
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            if ($user->status == 1) {
                $user->where('id', $id)->update(['status' => 0]);
            } else {
                $user->where('id', $id)->update(['status' => 1]);
            }
            return redirect()->route('user')->with('success', 'User Status Changed successfully');
        } else {
            return redirect()->route('user')->with('error', 'User Not found or an Admin');
        }
    }

    public function userPhoto(Request $request) 
    {
        $user = auth()->user();
        $file = $request->file('photo');
        if ($file != null) {
            // Delete the existing profile photo if it exists
            if ($user->profile_photo) {
                Storage::delete('public/profile-photos/'.$user->profile_photo);
            }
            $fileName = time().'.'.$file->extension();
            $file->move(storage_path('app/public/profile-photos'),$fileName);

            User::where('id', $user->id)->update(['profile_photo' => $fileName]);
            return redirect()->back()->with('success', 'Profile Photo Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Profile Photo Upload FAILED');
        }
    }

    public function updateUserRole(Request $request)
    {
        $role_id = $request->role_id;
        $user_id = $request->user_id;
        $staff = $request->staff;
        // dd($role_id);

        $user = User::where('id', $user_id)->first();

        if ($user) {
            $user->update(['role_id' => $role_id, 'staff' => $staff]); 
            return response()->json(['success' => true, 'message' => 'User Role Updated Successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'An error occurred']);        
        }
    }

    public function updateResume(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'resume' => ['required', 'string', 'max:10000'],
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $validated['user_id'] = $user_id;

        $user_profile = Profile::updateOrInsert(
            ['user_id' => $user_id], 
            ['resume' => $validated['resume']]
        );

        if ($user_profile) {
            return response()->json([
                'status' => 'success',
                'message' => 'Personal Resume updated successfully.',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong.',
            ], 500);
        }
    }
}
