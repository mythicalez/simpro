<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectDetailResource;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('subproject')->orderBy('id', 'desc')->get();

        // // return response()->json($project);
        return view('dashboard.ppc.project.project', compact('projects'));
        // return ProjectResource::collection($projects);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Project::create([
            'nama_project' => strtoupper($request->input('nama_project')),
            'tahun' => $request->input('tahun'),
            // Sesuaikan dengan nama kolom di tabel Anda
        ]);

        return redirect(route('project'))->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::orderBy('id')->findOrfail($id);
        return new ProjectDetailResource($project);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('dashboard.ppc.project.project-edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Project::findOrFail($id);
        $data->update([
            'nama_project' => $request->nama_project,
            'active' => $request->active,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('project')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrfail($id);
        $project->delete();

        return redirect(route('project'))->with('success', 'Data berhasil dihapus!');
    }

    public function nonactive($id)
    {
        $data = Project::findOrFail($id);

        if ($data->active == 1) {
            $active = 0;
        } else {
            $active = 1;
        }

        $data->update(['active' => $active]);

        if ($data->active == 1) {
            return redirect()->route('project')->with('success', 'Project berhasil diaktifkan');
        } else {
            return redirect()->route('project')->with('success', 'Project berhasil dinonaktifkan');
        }
    }
}
