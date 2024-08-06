<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('skill.index', compact('skills'));
    }

    public function create()
    {
        return view('skill.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        $skill = new Skill();
        $skill->name = $request->name;
        $skill->percentage = $request->percentage;
        $skill->save();

        return redirect()->route('admin.skill')->with('success', 'Skill created successfully.');
    }

    public function edit(Skill $skill)
    {
        return view('skill.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        $skill->name = $request->name;
        $skill->percentage = $request->percentage;
        $skill->save();

        return redirect()->route('admin.skill')->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skill')->with('success', 'Skill deleted successfully.');
    }
}
