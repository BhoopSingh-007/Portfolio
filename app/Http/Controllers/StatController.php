<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    /**
     * Display a listing of the stats.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = Stat::all();
        return view('stat.index', compact('stats'));
    }

    /**
     * Show the form for creating a new stat.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stat.create');
    }

    /**
     * Store a newly created stat in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'count' => 'required|integer',
        ]);

        Stat::create($request->all());

        return redirect()->route('admin.stat')->with('success', 'Stat created successfully.');
    }

    /**
     * Show the form for editing the specified stat.
     *
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function edit(Stat $stat)
    {
        return view('stat.edit', compact('stat'));
    }

    /**
     * Update the specified stat in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stat $stat)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'count' => 'required|integer',
        ]);

        $stat->update($request->all());

        return redirect()->route('admin.stat')->with('success', 'Stat updated successfully.');
    }

    /**
     * Remove the specified stat from storage.
     *
     * @param  \App\Models\Stat  $stat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stat $stat)
    {
        $stat->delete();

        return redirect()->route('admin.stat')->with('success', 'Stat deleted successfully.');
    }
}
