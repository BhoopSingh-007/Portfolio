<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    // Display a listing of the portfolio items
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('portfolios.index', compact('portfolios'));
    }

    // Show the form for creating a new portfolio item
    public function create()
    {
        return view('portfolios.create');
    }

    // Store a newly created portfolio item in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'f_category' => 'required',
            'client' => 'required|string|max:255',
            'project_date' => 'required|date',
            'url' => 'nullable|url',
            'detailed_description' => 'required|string',
            'images.*' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        // Handle file uploads
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('portfolio_images', 'public');
            }
        }

        Portfolio::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'f_category' => $request->f_category,
            'client' => $request->client,
            'project_date' => $request->project_date,
            'url' => $request->url,
            'detailed_description' => $request->detailed_description,
            'images' => json_encode($images), // Store image paths as JSON
        ]);

        return redirect()->route('admin.portfolios')
            ->with('success', 'Portfolio item created successfully.');
    }

    // Display the specified portfolio item
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolios.details', compact('portfolio'));
    }

    // Show the form for editing the specified portfolio item
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolios.edit', compact('portfolio'));
    }

    // Update the specified portfolio item in storage
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'f_category' => 'required',
            'client' => 'required|string|max:255',
            'project_date' => 'required|date',
            'url' => 'nullable|url',
            'detailed_description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        // Initialize $images array
        $images = json_decode($portfolio->images, true) ?? [];

        // Handle new file uploads
        if ($request->hasFile('images')) {
            // Delete old images
            foreach ($images as $oldImage) {
                Storage::delete('public/' . $oldImage);
            }

            // Store new images
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('portfolio_images', 'public');
            }
        }

        $portfolio->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'f_category' => $request->f_category,
            'client' => $request->client,
            'project_date' => $request->project_date,
            'url' => $request->url,
            'detailed_description' => $request->detailed_description,
            'images' => json_encode($images),
        ]);

        return redirect()->route('admin.portfolios')
            ->with('success', 'Portfolio item updated successfully.');
    }


    // Remove the specified portfolio item from storage
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        // Delete associated images
        if ($portfolio->images) {
            foreach (json_decode($portfolio->images, true) as $image) {
                Storage::delete('public/' . $image);
            }
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios')
            ->with('success', 'Portfolio item deleted successfully.');
    }
}
