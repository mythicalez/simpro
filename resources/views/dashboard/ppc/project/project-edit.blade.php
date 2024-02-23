@extends('dashboard.layouts.main')

@section('content')
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="file-text"></i></div>
                            Edit Project
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="{{ route('project') }}">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Kembali ke List Project
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <form id="editForm" action="{{ route('project.update', $project->id) }}" method="post">
        <div class="container-fluid px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-4 col">
                    <div class="card mb-4">
                        <div class="card-header">Data Project</div>
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="projectTxt">Nama Project</label>
                                <input class="form-control text-uppercase" id="projectTxt" name="nama_project"
                                    type="text" autocomplete="off" value="{{ $project->nama_project }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tahunTxt">Tahun</label>
                                <input class="form-control" id="tahunTxt" value="{{ $project->tahun }}" name="tahun"
                                    type="number" min="1" required>
                            </div>
                            <label for="kategori">Active</label>
                            <div>
                                <select class="form-control" id="active" name="active" required>
                                    <option value="1" @if ($project->active == 1) selected @endif>
                                        Aktif
                                    </option>
                                    <option value="0" @if ($project->active == 0) selected @endif>
                                        Non-active
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card card-header-actions">
                        <div class="card-header">
                            Update
                            <i class="text-muted" data-feather="info" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Ubah data project akan mengubah keseluruhan data yang terkait dengan project."></i>
                        </div>
                        <div class="card-body">
                            <div class="d-grid">
                                <button class="fw-500 btn btn-primary" type="submit">Ubah Data</button>
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
                    text: 'Ubah data project akan menyebabkan semua perubahan yg terkait dengan project, lanjutkan?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Ubah!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika dikonfirmasi, kirim form secara manual
                        $(this).unbind('submit').submit();
                    }
                });
            });
        });
    </script>
@endsection
