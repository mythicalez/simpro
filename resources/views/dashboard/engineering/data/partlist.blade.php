@extends('dashboard.layouts.main')

@section('content')
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Import Engineering - Part List
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('import-menu') }}" class="btn btn-sm btn-secondary"><i class="me-1"
                                data-feather="plus"></i>Import File Engineering</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="{{ route('engineering-partlist') }}">Part List</a>
            <a class="nav-link" href="{{ route('engineering-assembly') }}">Assembly List</a>
            <a class="nav-link" href="{{ route('engineering-asspart') }}">Assembly Part List</a>
        </nav>
        <hr class="mt-0 mb-4" />
        <div class="row">
            <div class="col-xxl-12 col-xl-12 mb-4">
                <div class="card">
                    <div class="card-header">Partlist Uploaded</div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project</th>
                                    <th>File</th>
                                    <th>Tgl Turun</th>
                                    <th>Uploaded</th>
                                    <th class='text-center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($partlist as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->subproject->kode_project . '-' . $data->subproject->project->nama_project . '-' . $data->subproject->nama_subproject }}
                                        </td>
                                        <td>{{ $data->nama_file }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>Ubah</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
