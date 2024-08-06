<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->company = $request->company;
        $testimonial->testimonial = $request->testimonial;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/testimonials');
            $testimonial->image = basename($imagePath);
        }

        $testimonial->save();

        return redirect()->route('admin.testimonial')->with('success', 'Testimonial created successfully.');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->company = $request->company;
        $testimonial->testimonial = $request->testimonial;

        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($testimonial->image) {
                Storage::delete('public/testimonials/' . $testimonial->image);
            }
            $imagePath = $request->file('image')->store('public/testimonials');
            $testimonial->image = basename($imagePath);
        }

        $testimonial->save();

        return redirect()->route('admin.testimonial')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Delete the image file if it exists
        if ($testimonial->image) {
            Storage::delete('public/testimonials/' . $testimonial->image);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonial')->with('success', 'Testimonial deleted successfully.');
    }
}
