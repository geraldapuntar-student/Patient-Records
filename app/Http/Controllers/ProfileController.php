<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // If photo upload
        if ($request->hasFile('profile_picture')) {
            $request->validate([
                'profile_picture' => 'image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Delete old pic if not default
            if ($user->profile_picture && file_exists(public_path('uploads/' . $user->profile_picture))) {
                unlink(public_path('uploads/' . $user->profile_picture));
            }

            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);

            $user->profile_picture = $filename;
            $user->save();

            return redirect()->route('profile.index')->with('success', 'Profile picture updated successfully.');
        }

        // If save changes
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email,' . $user->id,
            'gender' => 'nullable|in:male,female',
        ]);

        $user->name   = $request->name;
        $user->email  = $request->email;
        $user->gender = $request->gender;

        if ($request->filled('current_password')) {
            $request->validate([
                'current_password' => 'required',
                'new_password'     => 'required|min:6|confirmed',
            ]);

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
}