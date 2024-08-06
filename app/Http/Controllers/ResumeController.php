<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        $resume = Resume::first();
        return view('resume.index', compact('resume'));
    }

    public function edit()
    {
        $resume = Resume::first();
        return view('resume.edit', compact('resume'));
    }

    public function update(Request $request, Resume $resume)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'summary' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'education_title' => 'required|string',
            'education_duration' => 'required|string',
            'education_institution' => 'required|string',
            'education_description' => 'required|string',
            'experience_title' => 'required|string',
            'experience_duration' => 'required|string',
            'experience_company' => 'required|string',
            'experience_description' => 'required|string',
        ]);

        $resume = Resume::first();
        $resume->update($request->all());

        return redirect()->route('admin.resume')->with('success', 'Resume entry updated successfully.');
    }
    
}
