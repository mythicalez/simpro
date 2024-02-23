<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SubProject;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubProjectRequest;
use App\Http\Requests\UpdateSubProjectRequest;

class SubProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subprojects = SubProject::with('project')->orderBy('kode_angka', 'desc')->orderBy('kode_huruf', 'desc')->get();
        return view('dashboard.ppc.subproject.subproject', compact('subprojects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::where('active', 1)->pluck('nama_project', 'id');
        return view('dashboard.ppc.subproject.subproject-add', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'kode_project' => 'required|unique:subprojects,kode_project,null,id',
            'nama_subproject' => 'required',
            'prioritas' => 'required',
        ]);

        try {
            // Proses penyimpanan data jika validasi berhasil
            SubProject::create([
                'kode_project' => strtoupper($request->kode_project),
                'nama_subproject' => strtoupper($request->nama_subproject),
                'prioritas' => $request->prioritas,
                'project_id' => $request->project_id,
            ]);

            return redirect()->route('subproject')->with('success', 'Sub-Project berhasil disimpan');
        } catch (\Exception $e) {
            // Tangkap kesalahan dan kembalikan ke halaman create dengan pesan kesalahan
            return redirect()->route('subproject.create')->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubProject $subProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subproject = SubProject::with('project')->findOrFail($id);
        return view('dashboard.ppc.subproject.subproject-edit', compact('subproject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'kode_project' => 'required|unique:subprojects,kode_project,' . $id,
            'nama_subproject' => 'required',
            'prioritas' => 'required',
            // ... tambahkan validasi field lainnya sesuai kebutuhan
        ]);

        $subProject = SubProject::findOrFail($id);
        $subProject->update([
            'kode_project' => strtoupper($request->kode_project),
            'nama_subproject' => strtoupper($request->nama_subproject),
            'prioritas' => $request->prioritas,
        ]);

        return redirect()->route('subproject')->with('success', 'Sub Project berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subproject = SubProject::findOrfail($id);
        $subproject->delete();

        return redirect(route('subproject'))->with('success', 'Data berhasil dihapus!');
    }
}
