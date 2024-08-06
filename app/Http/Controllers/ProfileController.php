<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }
        // Handle profile image upload if provided
        if ($request->hasFile('profile_image')) {
            $request->validate([
                'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $image = $request->file('profile_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/profile_images', $filename);

            // Update the user's profile image
            auth()->user()->update(['profile_image' => $filename]);
        }

        //Update link
        if ($request->twitter) {
            auth()->user()->update(['twitter' => $request->twitter]);
        }
        if ($request->facebook) {
            auth()->user()->update(['facebook' => $request->facebook]);
        }
        if ($request->instagram) {
            auth()->user()->update(['instagram' => $request->instagram]);
        }
        if ($request->linkedin) {
            auth()->user()->update(['linkedin' => $request->linkedin]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }

    
    public function link(Request $request)
    {
        // dd($request->all());
       
        //Update link
        if ($request->twitter) {
            auth()->user()->update(['twitter' => $request->twitter]);
        }
        if ($request->facebook) {
            auth()->user()->update(['facebook' => $request->facebook]);
        }
        if ($request->instagram) {
            auth()->user()->update(['instagram' => $request->instagram]);
        }
        if ($request->linkedin) {
            auth()->user()->update(['linkedin' => $request->linkedin]);
        }

        
        return redirect()->route('admin.setting')->with('success', 'Social Link updated.');
    }
}
