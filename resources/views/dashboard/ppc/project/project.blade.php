@extends('dashboard.layouts.main')

@section('content')
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Data Project
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-primary " href="{{ route('subproject') }}">
                            <i class="me-1" data-feather="users"></i>
                            Manage Sub-Project
                        </a>
                        <a class="btn btn-sm btn-warning " href="{{ route('phase') }}">
                            <i class="me-1" data-feather="users"></i>
                            Manage Phase Project
                        </a>
                        {{-- <a class="btn btn-sm btn-secondary" href="{{ route('project.create') }}">
                            <i class="me-1" data-feather="user-plus"></i>
                            Tambah Project
                        </a> --}}
                        <button class="btn btn-sm btn-secondary" type="button" data-bs-toggle="modal"
                            data-bs-target="#projectModal"><i class="me-1" data-feather="plus"></i>Tambah
                            Project</button>
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
                            <th>Project</th>
                            <th class='text-center'>Tahun</th>
                            <th>Sub-Project</th>
                            <th class='text-center'>Non-active</th>
                            <th class='text-center'>Edit</th>
                            <th class='text-center'>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_project }}
                                    @if ($item->active == 1)
                                        <span class="badge bg-primary">Active</span>
                                    @else
                                        <span class="badge bg-danger">Non-active</span>
                                    @endif
                                </td>
                                <td class='text-center'>{{ $item->tahun }}</td>
                                <td>
                                    @foreach ($item->subproject as $bangunan)
                                        <ul>
                                            <li>
                                                {{ $bangunan->kode_project . ' - ' . $bangunan->nama_subproject }}
                                            </li>
                                        </ul>
                                    @endforeach
                                </td>
                                <td class='text-center'>
                                    <form action="{{ route('project.nonactive', $item->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-xs nonactive-button" type="submit" id="nonactive">
                                            <i data-feather="slash" class='text-danger' style="width:20px;height:20px;"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class='text-center'>
                                    <a href="{{ route('project.edit', $item->id) }}">
                                        <i data-feather="edit" class='text-primary' style="width:20px;height:20px;"></i>
                                    </a>
                                </td>
                                <td class='text-center'>
                                    <form action="{{ route('project.destroy', $item->id) }}" method="post">
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

    <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Project</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createForm" method="POST" action="{{ route('project.store') }}">
                    <div class="modal-body">
                        @csrf
                        <!-- Tambahkan input dan field form di sini -->
                        <div class="mb-3">
                            <label for="projectTxt">Nama Project</label>
                            <input class="form-control text-uppercase" id="projectTxt" name="nama_project" type="text"
                                autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahunTxt">Tahun</label>
                            <input class="form-control" id="tahunTxt" name="tahun" type="number" min="1"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer"><button class="btn btn-secondary" type="button"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" onclick="simpanData()">Tambah</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#createForm').submit(function(event) {
                event.preventDefault(); // Menghentikan pengiriman form secara langsung

                // Tampilkan SweetAlert untuk konfirmasi
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Anda yakin ingin menyimpan data?',
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
