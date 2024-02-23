@extends('dashboard.layouts.main')

@section('content')
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="file-text"></i></div>
                            Tambah Sub-Project
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="{{ route('subproject') }}">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Kembali ke List Sub-Project
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <form id="editForm" action="{{ route('subproject.store') }}" method="post">
        @csrf
        <div class="container-fluid px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-4 col">
                    <div class="card mb-4">
                        <div class="card-header">Data Sub-Project</div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="project_id">Project</label>
                                <select name="project_id" id="project_id" class="form-control">
                                    <option value="" disabled selected>Pilih Project..</option>
                                    @foreach ($projects as $projectId => $projectName)
                                        <option value="{{ $projectId }}">{{ $projectName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kode_project">Kode Sub-Project</label>
                                <input class="form-control text-uppercase" maxlength="5" id="kode_project"
                                    name="kode_project" type="text" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_subproject">Nama Sub-Project</label>
                                <input class="form-control text-uppercase" id="nama_subproject" name="nama_subproject"
                                    type="text" required>
                            </div>
                            <label for="prioritas">Urutan Prioritas</label>
                            <div>
                                <input class="form-control" id="prioritas" name="prioritas" type="number" min="1"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card card-header-actions">
                        <div class="card-header">
                            Create
                            <i class="text-muted" data-feather="info" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Simpan Data Sub-Project"></i>
                        </div>
                        <div class="card-body">
                            <div class="d-grid">
                                <button class="fw-500 btn btn-primary" type="submit">Simpan Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $('#editForm').submit(function(event) {
                event.preventDefault(); // Menghentikan pengiriman form secara langsung

                // Tampilkan SweetAlert untuk konfirmasi
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Simpan Data Sub-Project?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Simpan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika dikonfirmasi, kirim form secara manual
                        $(this).unbind('submit').submit();
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#project_id').select2({
                placeholder: 'Pilih Project..',
                allowClear: true,
                // Tambahkan opsi lainnya sesuai kebutuhan
            });
        });
    </script>
@endsection
