<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Discussion;

class ProfileController extends Controller
{
    public function showprofile()
    {
        $user = Auth::user();
        $discussions = Discussion::where('user_id', $user->id)->get();
        return view('profile', ['user' => $user, 'discussions' => $discussions]);
    }

    public function showeditprofile()
    {
        return view('editprofile', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'current_password' => 'nullable|string|min:8',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);


        $user = Auth::user();

        $user->username = $request->username;

        if ($request->hasFile('profile_picture')) {
            try {
                $profilePicture = $request->file('profile_picture');
                Log::info('Uploaded profile picture:', ['filename' => $profilePicture->getClientOriginalName()]);
                $profilePicturePath = $profilePicture->store('profile_pictures', 'public');

                $user->profile_picture = $profilePicturePath;
            } catch (\Exception $e) {

                Log::error('Error processing profile picture: ' . $e->getMessage());
                return redirect()->back()->withErrors(['error' => 'Error processing profile picture']);
            }
        }

        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (Hash::check($request->current_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
            } else {
                return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
            }
        }

        try {
            $user->save();
        } catch (\Exception $e) {
            Log::error('Error saving user data: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Error saving user data']);
        }

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function show(User $user)
    {
        $discussions = Discussion::where('user_id', $user->id)->get();
        return view('profile', ['user' => $user, 'discussions' => $discussions]);
    }
}
