<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('about.index', compact('abouts'));
    }

    public function create()
    {
        return view('about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'experince' => 'required',
            'birthday' => 'required|date',
            'website' => 'required|url',
            'phone' => 'required',
            'city' => 'required',
            'age' => 'required|integer',
            'degree' => 'required',
            'email' => 'required|email',
            'freelance' => 'required|boolean',
            'profile_image' => 'required|image',
        ]);

        $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');

        About::create([
            'title' => $request->title,
            'experince' => $request->experince,
            'description' => $request->description,
            'birthday' => $request->birthday,
            'website' => $request->website,
            'phone' => $request->phone,
            'city' => $request->city,
            'age' => $request->age,
            'degree' => $request->degree,
            'email' => $request->email,
            'freelance' => $request->freelance,
            'profile_image' => $profileImagePath,
        ]);

        return redirect()->route('admin.about')->with('success', 'About section created successfully.');
    }

    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'experince' => 'required',
            'birthday' => 'required|date',
            'website' => 'required|url',
            'phone' => 'required',
            'city' => 'required',
            'age' => 'required|integer',
            'degree' => 'required',
            'email' => 'required|email',
            'freelance' => 'required|boolean',
            'profile_image' => 'image',
        ]);

        if ($request->hasFile('profile_image')) {
            // Delete old profile image if it exists
            if ($about->profile_image) {
                Storage::delete('public/' . $about->profile_image);
            }

            $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
            $about->profile_image = $profileImagePath;
        }

        $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'experince' => $request->experince,
            'birthday' => $request->birthday,
            'website' => $request->website,
            'phone' => $request->phone,
            'city' => $request->city,
            'age' => $request->age,
            'degree' => $request->degree,
            'email' => $request->email,
            'freelance' => $request->freelance,
        ]);

        return redirect()->route('admin.about')->with('success', 'About section updated successfully.');
    }

    public function destroy(About $about)
    {
        // Delete profile image if it exists
        if ($about->profile_image) {
            \Storage::delete('public/' . $about->profile_image);
        }

        $about->delete();

        return redirect()->route('admin.about')->with('success', 'About section deleted successfully.');
    }

    public function send(Request $request)
    {
        $mailData = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('jassisuthar8555@gmail.com')->send(new Contact($mailData));

        return back()->with('success', 'Your message has been sent. Thank you!');
    }
}
