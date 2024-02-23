<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use App\Models\SubProject;
use Illuminate\Http\Request;
use App\Http\Requests\StorePhaseRequest;
use App\Http\Requests\UpdatePhaseRequest;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phase = Phase::with('subproject.project')->orderBy('id', 'desc')->get();
        return view('dashboard.ppc.phase.phase', compact('phase'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subproject = SubProject::with('project')->get();
        return view('dashboard.ppc.phase.phase-add', compact('subproject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subproject_id' => 'required|exists:projects,id',
            'nama_phase' => 'required',
            'prioritas' => 'required',
        ]);

        try {
            // Proses penyimpanan data jika validasi berhasil
            Phase::create([
                'nama_phase' => $request->nama_phase,
                'prioritas' => $request->prioritas,
                'subproject_id' => $request->subproject_id,
            ]);

            return redirect()->route('phase')->with('success', 'Sub-Project berhasil disimpan');
        } catch (\Exception $e) {
            // Tangkap kesalahan dan kembalikan ke halaman create dengan pesan kesalahan
            return redirect()->route('phase.create')->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Phase $phase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $phase = Phase::with('subproject.project')->findOrFail($id);
        return view('dashboard.ppc.phase.phase-edit', compact('phase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_phase' => 'required',
            'prioritas' => 'required',
        ]);

        $phase = Phase::findOrFail($id);
        $phase->update([
            'nama_phase' => $request->nama_phase,
            'prioritas' => $request->prioritas,
        ]);

        return redirect()->route('phase')->with('success', 'Phase berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $phase = Phase::findOrfail($id);
        $phase->delete();

        return redirect(route('phase'))->with('success', 'Data berhasil dihapus!');
    }
}
