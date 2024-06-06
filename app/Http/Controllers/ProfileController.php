<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
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
        // Validate the request data
        $request->validate([
            'username' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Retrieve the authenticated user
        $user = Auth::user();

        // Update the username
        $user->username = $request->username;

        // Check if a new profile picture has been uploaded
        if ($request->hasFile('profile_picture')) {
            try {
                // Get the file contents and store it
                $profilePicture = $request->file('profile_picture');
                Log::info('Uploaded profile picture:', ['filename' => $profilePicture->getClientOriginalName()]);
                $profilePicturePath = $profilePicture->store('profile_pictures', 'public');

                // Update the user's profile picture path
                $user->profile_picture = $profilePicturePath;
            } catch (\Exception $e) {
                // Log any exceptions that occur during file processing
                Log::error('Error processing profile picture: ' . $e->getMessage());
                return redirect()->back()->withErrors(['error' => 'Error processing profile picture']);
            }
        }

        // Save the updated user record
        try {
            $user->save();
        } catch (\Exception $e) {
            // Handle any exceptions that occur during user save
            Log::error('Error saving user data: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Error saving user data']);
        }

        // Redirect back to the profile page upon successful update
        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function show(User $user)
    {
        $discussions = Discussion::where('user_id', $user->id)->get();
        return view('profile', ['user' => $user, 'discussions' => $discussions]);
    }
}
