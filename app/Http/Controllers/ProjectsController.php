<?php

namespace App\Http\Controllers;

use App\Models\TotalProject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = TotalProject::all();
        return view('total_projects', compact('projects'));
    }

    public function create()
    {
        return view('project.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'type' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'client' => 'required|string|max:255',
        ]);

        TotalProject::create($request->all());

        return redirect()->route('total-project.index')
                         ->with('success', 'Proyek berhasil ditambahkan.');
    }


    public function show($id)
    {
        $project = TotalProject::findOrFail($id);
        return view('total_project.show', compact('project'));
    }


    public function edit($id)
    {
        $project = TotalProject::findOrFail($id);
        return view('project.edit', compact('project'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'type' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'client' => 'required|string|max:255',
        ]);

        $project = TotalProject::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('total-project.index')
                         ->with('success', 'Proyek berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $project = TotalProject::findOrFail($id);
        $project->delete();

        return redirect()->route('total-project.index')
                         ->with('success', 'Proyek berhasil dihapus.');
    }
}
