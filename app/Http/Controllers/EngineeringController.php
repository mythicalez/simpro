<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Partlist;
use App\Models\SubProject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PartlistDetail;
use App\Models\PartMaster;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EngineeringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partlist = Partlist::with('subproject.project')->get();
        return view('dashboard.engineering.data.partlist', compact('partlist'));
    }

    public function assembly()
    {
        $partlist = Partlist::with('subproject.project')->get();
        return view('dashboard.engineering.data.assembly', compact('partlist'));
    }

    public function asspart()
    {
        $partlist = Partlist::with('subproject.project')->get();
        return view('dashboard.engineering.data.asspart', compact('partlist'));
    }

    public function import()
    {
        $subproject = SubProject::with('project')->get();
        return view('dashboard.engineering.import.import-menu', compact('subproject'));
    }
    /**
     * Show the form for creating a new resource.
     */

    public function processImport(Request $request)
    {
        $subproject = SubProject::with('project')->get();
        //PART LIST IMPORT
        $partlist = $request->file('partlist');
        $asspart = $request->file('asspart');
        $assembly_list = $request->file('assembly_list');
        $subproject = $request->subproject_id;

        if (!isset($partlist) && !isset($asspart) && !isset($assembly_list)) {
            return redirect()->route('import-menu')->withErrors(['Errors' => 'Tidak ada file yg diimport!']); // Mengembalikan ke halaman sebelumnya dengan pesan kesalahan
        }

        $project = $request->project_id;
        $kd_project = SubProject::findOrFail($project, ['kode_project']);

        $kategori = $kd_project->kode_project;

        if (isset($partlist)) {
            $partlistName = $partlist->getClientOriginalName();

            $CheckPart = Partlist::where('nama_file', $partlistName)->where('subproject_id', $project)->first();

            if ($CheckPart) {
                return redirect()->route('import-menu', compact('subproject'))->withErrors(['Errors' => 'Parlist sudah pernah diimport!']); // Mengembalikan ke halaman sebelumnya dengan pesan kesalahan
            }

            $kategoriPath = 'partlist/' . $kategori;
            if (!Storage::disk('public')->exists($kategoriPath)) {
                Storage::disk('public')->makeDirectory($kategoriPath);
            }

            $path = "public/{$kategoriPath}/{$partlistName}";
            // $filePath = $partlist->storeAs("public/partlist", $project . $partlistName);
            if (!Storage::exists($path)) {
                // Jika belum ada, lakukan upload
                $path = $partlist->storeAs("public/" . $kategoriPath, $partlistName);
            }

            $fileContent = file_get_contents(storage_path("app/{$path}"));

            $lines = explode("\n", $fileContent);

            $data = [];

            foreach ($lines as $line) {
                $rowData = preg_split('/\s+/', $line);
                $data[] = $rowData;

                if (!isset($rowData[1]) || !in_array(strtoupper(substr($rowData[1], 0, 3)), ['TEK', 'PRO', 'CON', 'MAR', 'TOT', 'DS-', '---', '   ']) && !in_array(strtoupper($rowData[1]), [''])) {
                    $partlistData[] = $rowData;
                }
            }

            $chk = $data[5][1];
            
            if ($chk != 'Mark') {
                $filePath = "public/{$kategoriPath}/{$partlistName}";
                Storage::delete($filePath);

                return redirect()->route('import-menu', compact('subproject'))->withErrors(['Errors' => 'File partlist salah!']);
            }

            $kode_project = isset($data[2][3]) ? $data[2][3] : null;
            $tgl_part = str_replace('.', '/', isset($data[2][5]) ? $data[2][5] : null);
            $tgl_pList = Carbon::createFromFormat('d/m/Y', $tgl_part);
            $tgl_partlist = Carbon::parse($tgl_pList)->translatedFormat('l, d F Y');

            if ($kd_project->kode_project != $kode_project) {
                $filePath = "public/{$kategoriPath}/{$partlistName}";
                Storage::delete($filePath);

                return redirect()->route('import-menu', compact('subproject'))->withErrors(['Errors' => 'Project Part List tidak sama!']); // Mengembalikan ke halaman sebelumnya dengan pesan kesalahan
            }
        }

        if (isset($assembly_list)) {
            $assemblyName = $assembly_list->getClientOriginalName();

            $CheckPart = Partlist::where('nama_file', $assemblyName)->where('subproject_id', $project)->first();

            // if ($CheckPart) {
            //     return redirect()->route('import-menu', compact('subproject'))->withErrors(['Errors' => 'Parlist sudah pernah diimport!']); // Mengembalikan ke halaman sebelumnya dengan pesan kesalahan
            // }

            $kategoriPath = 'assembly_list/' . $kategori;
            if (!Storage::disk('public')->exists($kategoriPath)) {
                Storage::disk('public')->makeDirectory($kategoriPath);
            }

            $path = "public/{$kategoriPath}/{$assemblyName}";
            // $filePath = $assembly_list->storeAs("public/assembly_l$assembly_list", $project . $assemblyName);
            if (!Storage::exists($path)) {
                // Jika belum ada, lakukan upload
                $path = $assembly_list->storeAs("public/" . $kategoriPath, $assemblyName);
            }

            $fileContent = file_get_contents(storage_path("app/{$path}"));

            $lines = explode("\n", $fileContent);

            $data = [];

            foreach ($lines as $line) {
                $rowData = preg_split('/\s+/', $line);
                $data[] = $rowData;

                if (!isset($rowData[1]) || !in_array(strtoupper(substr($rowData[1], 0, 3)), ['TEK','---', 'TIT', 'CON', 'TOT', 'ASS']) && !in_array(strtoupper($rowData[1]), [''])) {
                    $assemblyData[] = $rowData;
                }
            }
            
            $chkAssmbly = $data[7][2];
            if ($chkAssmbly != 'mark') {
                $filePath = "public/{$kategoriPath}/{$assemblyName}";
                Storage::delete($filePath);

                return redirect()->route('import-menu', compact('subproject'))->withErrors(['Errors' => 'File Assembly List Salah!']);
            }

            $kode_project = substr($data[4][2],3);

            if ($kd_project->kode_project != $kode_project) {
                $filePath = "public/{$kategoriPath}/{$assemblyName}";
                Storage::delete($filePath);

                return redirect()->route('import-menu', compact('subproject'))->withErrors(['Errors' => 'Project Assembly List Tidak Sama!']); // Mengembalikan ke halaman sebelumnya dengan pesan kesalahan
            }

            $tgl_assembly = str_replace('.', '/', isset($data[4][4]) ? $data[4][4] : null);
            $tgl_AsList = Carbon::createFromFormat('d/m/Y', $tgl_assembly);
            $tgl_assemblylist = Carbon::parse($tgl_AsList)->translatedFormat('l, d F Y');
        }

        $partlistData = isset($partlistData) ? $partlistData : null;
        $partlistName = isset($partlistName) ? $partlistName : null;
        $tgl_partlist = isset($tgl_partlist) ? $tgl_partlist : null;
        $tgl_part = isset($tgl_part) ? $tgl_part : null;
        $assemblyData = isset($assemblyData) ? $assemblyData : null;
        $assemblyName =  isset($assemblyName) ? $assemblyName : null;
        $tgl_assembly  = isset($tgl_assembly) ? $tgl_assembly : null;
        $tgl_assemblylist   = isset($tgl_assemblylist) ? $tgl_assemblylist : null;

        return view('dashboard.engineering.import.review-import', compact('partlistData', 'partlistName', 'tgl_partlist', 'tgl_part', 'kode_project', 'project', 'assemblyData', 'assemblyName', 'tgl_assembly', 'tgl_assemblylist'));
    }

    public function create()
    {
        $subproject = SubProject::with('project')->get();
        return view('dashboard.engineering.import.import-menu', compact('subproject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function submitFile(Request $request)
    {
        // Ambil semua data dari DataTables
        $subproject = SubProject::with('project')->get();

        $namaPartlist = $request->nama_partlist;
        // if (isset($namaPartlist)) {
        $partlist = Partlist::create([
            'subproject_id' => $request->project_id,
            'nama_file' => $namaPartlist,
            'tanggal' => $request->tanggal,
            'jenis' => 'import',
            'catatan' => 'Import ' . $namaPartlist . ' oleh:' . auth()->user()->nama,
            'user_id' => auth()->user()->id
        ]);
        $partlist->save();

        $partlist_id = $partlist->id;
        foreach ($request->data as $value) {
            $checkData = PartMaster::where('kd_mark', $value['data1'])->first();

            if (!$checkData) {
                $partMaster = PartMaster::create([
                    'subproject_id' => $request->project_id,
                    'kd_mark' => $value['data1'],
                    'mark' => $value['data2'],
                    'profile' => $value['data3'],
                    'grade' => $value['data5'],
                    'length' => $value['data6'],
                    'area' => $value['data7'],
                    'weight' => $value['data8'],
                ]);

                $partMaster->save();
            } else {
                if ($value['data9'] != "Batal") {
                    if ($checkData->profile != $value['data3'] || $checkData->grade != $value['data5'] || $checkData->length != $value['data6'] || $checkData->area != $value['data7'] || $checkData->weight != $value['data8']) {
                        $partMaster = PartMaster::where('id', $checkData->id)->update([
                            'profile' => $value['data3'],
                            'grade' => $value['data5'],
                            'length' => $value['data6'],
                            'area' => $value['data7'],
                            'weight' => $value['data8'],
                            'version' => $checkData->version + 1
                        ]);
                    }
                }
            }

            $partMaster_id = PartMaster::where('kd_mark', $value['data1'])->first();

            PartlistDetail::create([
                'partlist_id' => $partlist_id,
                'part_master_id' => $partMaster_id->id,
                'kd_mark' => $value['data1'],
                'profile' => $value['data3'],
                'qty' => $value['data4'],
                'grade' => $value['data5'],
                'length' => $value['data6'],
                'area' => $value['data7'],
                'weight' => $value['data8'],
                'status' => $value['data9']
            ])->save();
        }

        return redirect()->route('import-menu', compact('subproject'))->with(['success' => 'Import Success!']); // Mengembalikan ke halaman sebelumnya dengan pesan kesalahan
        // return redirect()->back()->with('success', 'Data berhasil diproses');
        // return response()->json(['message' => 'Data berhasil disimpan'])->with(['success'=>'Import Success!']);
    }
}
