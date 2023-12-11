<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no_telp' => 'nullable|numeric', // Adjust the validation rule as needed
        ]);

        $user = Auth::user();

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'no_telp' => $request->input('no_telp'),
        ]);

        if ($request->hasFile('image')) {
            // Handle image upload and update the 'image' attribute in the user model
            if($request->oldImage){
                \Illuminate\Support\Facades\Storage::delete($request->oldImage);
            }
            
            $imagePath = $request->file('image')->store('profile_images','public');
            $user->image = $imagePath;
            $user->save();
        }

        if ($user->wasChanged(['email'])) {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function image(){
        $user = Auth::user();

        return view('dashboard',compact('user'));
    }
}
