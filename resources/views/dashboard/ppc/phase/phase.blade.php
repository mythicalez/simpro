@extends('dashboard.layouts.main')

@section('content')
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Data Phase Project
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-primary " href="{{ route('project') }}">
                            <i class="me-1" data-feather="users"></i>
                            Manage Project
                        </a>
                        <a class="btn btn-sm btn-warning " href="{{ route('subproject') }}">
                            <i class="me-1" data-feather="users"></i>
                            Manage Sub-Project
                        </a>
                        {{-- <a class="btn btn-sm btn-secondary" href="{{ route('project.create') }}">
                            <i class="me-1" data-feather="user-plus"></i>
                            Tambah Project
                        </a> --}}
                        <a href="{{ route('phase.create') }}" class="btn btn-sm btn-secondary"><i class="me-1"
                                data-feather="plus"></i>Tambah
                            Phase Project</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Sub-Project</th>
                            <th class='text-center'>Nama Phase</th>
                            <th class="text-center">Prioritas</th>
                            <th class='text-center'>Edit</th>
                            <th class='text-center'>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phase as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->subproject->kode_project . '-' . $item->subproject->project->nama_project . '-' . $item->subproject->nama_subproject }}
                                <td class='text-center'>{{ $item->nama_phase }}</td>
                                <td class="text-center">
                                    {{ $item->prioritas }}
                                </td>
                                <td class='text-center'>
                                    <a href="{{ route('phase.edit', $item->id) }}">
                                        <i data-feather="edit" class='text-primary' style="width:20px;height:20px;"></i>
                                    </a>
                                </td>
                                <td class='text-center'>
                                    <form action="{{ route('phase.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs delete-button" type="submit" id="hapusData">
                                            <i data-feather="trash" class='text-danger' style="width:20px;height:20px;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.delete-button').click(function(event) {
                event.preventDefault();

                var form = $(this).closest('form');

                // Tampilkan SweetAlert untuk konfirmasi
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Anda yakin ingin menghapus data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika dikonfirmasi, kirim form secara manual
                        form.unbind('submit').submit();
                    }
                });
            });
        });
    </script>
@endsection
