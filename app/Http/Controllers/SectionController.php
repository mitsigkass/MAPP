<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SectionController extends Controller
{
    public function index(): View
    {   
        $section = Section::first();

        return view('dashboard', [
            'section' => $section,
        ]);
    }

    public function update(Request $request, $id)
    {
        $section = Section::findOrFail($id);

        $section->title = $request->input('title');
        $section->content = $request->input('content');

        if ($request->hasFile('image')) {
        
      $section->image = $request->file('image')->store('images');
        }

        $section->save();

        return redirect()->route('dashboard', $section)
            ->with('success', 'Section updated successfully');
    }
}
