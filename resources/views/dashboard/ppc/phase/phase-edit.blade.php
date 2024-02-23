@extends('dashboard.layouts.main')

@section('content')
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="file-text"></i></div>
                            Edit Phase Project
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="{{ route('phase') }}">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Kembali ke List Phase Project
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <form id="addForm" action="{{ route('phase.update', $phase->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="container-fluid px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-4 col">
                    <div class="card mb-4">
                        <div class="card-header">Data Phase Project</div>
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
                                <label for="subproject_id">Project</label>
                                <input class="form-control" id="subproject"
                                    value="{{ $phase->subproject->kode_project . '-' . $phase->subproject->project->nama_project . '-' . $phase->subproject->nama_subproject }}"
                                    name="subproject" type="text" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="nama_phase">Nama Phase</label>
                                <input class="form-control" autocomplete="off" value="{{ $phase->nama_phase }}"
                                    id="nama_phase" name="nama_phase" type="text" required placeholder="Tahap...">
                            </div>
                            <label for="prioritas">Urutan Prioritas</label>
                            <div>
                                <input class="form-control" value="{{ $phase->prioritas }}" id="prioritas" name="prioritas"
                                    type="number" min="1" required placeholder="1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card card-header-actions">
                        <div class="card-header">
                            Edit
                            <i class="text-muted" data-feather="info" data-bs-toggle="tooltip" data-bs-placement="left"
                                title="Ubah Data Phase Project"></i>
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
            $('#addForm').submit(function(event) {
                event.preventDefault(); // Menghentikan pengiriman form secara langsung

                // Tampilkan SweetAlert untuk konfirmasi
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Ubah Data Phase?',
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

        $(document).ready(function() {
            $('#subproject_id').select2({
                placeholder: 'Pilih Project..',
                allowClear: true,
                // Tambahkan opsi lainnya sesuai kebutuhan
            });
        });
    </script>
@endsection
