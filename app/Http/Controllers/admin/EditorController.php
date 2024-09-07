<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Editor;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = 0)
    {
        $editors = Editor::where('projectid', $id)->get();
        return view('admin.editor.index', compact('editors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = 0)
    {
        $projects = Project::find($id);
        $editors = Editor::all();
        return view('admin.editor.create', compact('editors', 'projects'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'border_color' => 'required',
            'body_color' => 'required',
            'term_condition' => 'required'
            // Other validation rules...
        ]);
        $input = $request->all();


        $editor = Editor::create($input);

        return redirect()->route('editor.index', $editor->projectid)
            ->with('success', 'Editor data added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $editor = Editor::findOrFail($id);
        return view('admin.editor.edit', compact('editor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Editor $editor)
    {
        $request->validate([
            'border_color',
            'body_color',
            'term_condition'
            // Other validation rules...
        ]);

        $input = $request->all();
        // $editor = Editor::findOrFail($editor);
        $editor->update($input);

        return redirect()->route('editor.index', $editor->projectid)
            ->with('success', 'Editor data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
