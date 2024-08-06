<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required',
            'svg_d' => 'nullable|string', // Validation for SVG path data
            'color' => 'nullable|string', // Validation for color
        ]);

        
        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'svg_d' => $request->svg_d,
            'color' => $request->color,
        ]);

        return redirect()->route('admin.services')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required',
            'svg_d' => 'nullable|string', // Validation for SVG path data
            'color' => 'nullable|string', // Validation for color
        ]);
        
        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'svg_d' => $request->svg_d,
            'color' => $request->color,
        ]);

        return redirect()->route('admin.services')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
       
        $service->delete();

        return redirect()->route('admin.services')
            ->with('success', 'Service deleted successfully.');
    }
}
