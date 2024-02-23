@extends('dashboard.layouts.main')

@section('content')
    <main>
        {{-- <form id="myTable" method="POST" action="{{ route('saveImport') }}"> --}}
        {{-- @csrf --}}
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="arrow-right-circle"></i></div>
                                Import Data Engineering
                            </h1>
                            <div class="page-header-subtitle">Import Data Part List | Assembly List | Assembly Part List
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <!-- Wizard card example with navigation-->
            <div class="card">
                <div class="card-header border-bottom">
                    <!-- Wizard navigation-->
                    <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab"
                        role="tablist">
                        <!-- Wizard navigation item 1-->
                        <a class="nav-item nav-link" id="wizard1-tab" disabled="disabled" data-bs-toggle="tab"
                            role="tab" aria-controls="wizard1" aria-selected="true">
                            <div class="wizard-step-icon">1</div>
                            <div class="wizard-step-text">
                                <div class="wizard-step-text-name">Import File</div>
                                <div class="wizard-step-text-details">Silahkan Import File Terlebih Dahulu</div>
                            </div>
                        </a>
                        <!-- Wizard navigation item 2-->
                        <a class="nav-item nav-link active" id="wizard2-tab" href="#wizard2" data-bs-toggle="tab"
                            role="tab" aria-controls="wizard2" aria-selected="true">
                            <div class="wizard-step-icon">2</div>
                            <div class="wizard-step-text">
                                <div class="wizard-step-text-name">Part List</div>
                                <div class="wizard-step-text-details">Review Part List Data</div>
                            </div>
                        </a>
                        <!-- Wizard navigation item 3-->
                        <a class="nav-item nav-link" id="wizard3-tab" href="#wizard3" data-bs-toggle="tab" role="tab"
                            aria-controls="wizard3" aria-selected="true">
                            <div class="wizard-step-icon">3</div>
                            <div class="wizard-step-text">
                                <div class="wizard-step-text-name">Assembly List</div>
                                <div class="wizard-step-text-details">Review Assembly List Data</div>
                            </div>
                        </a>
                        <!-- Wizard navigation item 4-->
                        <a class="nav-item nav-link" id="wizard4-tab" href="#wizard4" data-bs-toggle="tab" role="tab"
                            aria-controls="wizard4" aria-selected="true">
                            <div class="wizard-step-icon">4</div>
                            <div class="wizard-step-text">
                                <div class="wizard-step-text-name">Assembly Part List</div>
                                <div class="wizard-step-text-details">Review Assembly Past List Data</div>
                            </div>
                        </a>
                        <a class="nav-item nav-link" id="wizard5-tab" href="#wizard5" data-bs-toggle="tab" role="tab"
                            aria-controls="wizard5" aria-selected="true">
                            <div class="wizard-step-icon">5</div>
                            <div class="wizard-step-text">
                                <div class="wizard-step-text-name">Review &amp; Submit</div>
                                <div class="wizard-step-text-details">Review dan Submit Files</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="cardTabContent">
                        <!-- Wizard tab pane item 2-->
                        <div class="tab-pane py-5 py-xl-5 fade show active" id="wizard2" role="tabpanel"
                            aria-labelledby="wizard2-tab">
                            <div class="row justify-content-center">
                                <div class="col-xxl-8 col-xl-12">
                                    <h3 class="text-primary">Step 2</h3>
                                    <input type="hidden" name="project_id" value="{{ $project }}">
                                    @if (!empty($partlistData))
                                        <input type="hidden" name="nama_partlist" value="{{ $partlistName }}">
                                        <input type="hidden" name="tanggal" value="{{ $tgl_part }}">
                                        <h5 class="card-title mb-1"><b>File:</b> {{ $partlistName }}</h5>
                                        <h5 class="card-title mb-4"><b>Tanggal Turun:</b> {{ $tgl_partlist }}</h5>
                                    @else
                                        <h5 class="card-title mb-1"><b>File:</b> </h5>
                                        <h5 class="card-title mb-4"><b>Tanggal Turun:</b> </h5>
                                    @endif
                                    <div class="row gx-3">
                                        <div class="mb-3 col-md-12">
                                            @if (!empty($partlistData))
                                                <table id="dataTable" class="display data-table">
                                                    <thead>
                                                        <tr>
                                                            <!-- Header tabel -->
                                                            <th hidden>Kode Mark</th>
                                                            <th>Mark</th>
                                                            <th style="width: 30%">Profile</th>
                                                            <th>Qty</th>
                                                            <th>Grade</th>
                                                            <th>Panjang(mm)</th>
                                                            <th>Area(m2)</th>
                                                            <th>Berat(kg)</th>
                                                            <th style="width: 2%" class="text-center">Status</th>
                                                            <th style="width: 2%" class="text-center">Action</th>
                                                            <!-- ... Tambahan kolom sesuai kebutuhan ... -->
                                                        </tr>
                                                    </thead>

                                                    <tbody class="data-part">
                                                        @foreach ($partlistData as $data)
                                                            @if (count($data) >= 10)
                                                                <tr>
                                                                    <td hidden>{{ $kode_project . $data[1] }}</td>
                                                                    <td>{{ $data[1] }}</td>
                                                                    <td>
                                                                        {!! $data[2] . ' ' . html_entity_decode('&Oslash;') . ' ' . $data[4] . ' ' . $data[5] !!}
                                                                    </td>
                                                                    <td contenteditable="true">{{ $data[6] }}
                                                                    </td>
                                                                    <td contenteditable='true'>{{ $data[7] }}
                                                                    </td>
                                                                    <td>{{ $data[8] }}</td>
                                                                    <td>{{ $data[9] }}</td>
                                                                    <td>{{ $data[10] }}</td>
                                                                    <td class="text-center"
                                                                        data-id="{{ $loop->index }}"><span
                                                                            class="badge bg-success">Aktif</span>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <button
                                                                            class="btn btn-batal btn-datatable btn-icon btn-danger"
                                                                            title="Batal" type="button"><i
                                                                                data-feather="x"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td hidden>{{ $kode_project . $data[1] }}</td>
                                                                    <td>{{ $data[1] }}

                                                                    </td>
                                                                    <td>{{ $data[2] }}</td>
                                                                    <td contenteditable="true">{{ $data[3] }}
                                                                    </td>
                                                                    <td contenteditable='true'>{{ $data[4] }}
                                                                    </td>
                                                                    <td>{{ $data[5] }}</td>
                                                                    <td>{{ $data[6] }}</td>
                                                                    <td>{{ $data[7] }}</td>
                                                                    <td class="text-center"
                                                                        data-id="{{ $loop->index }}"><span
                                                                            class="badge bg-success">Aktif</span>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <button
                                                                            class="btn btn-batal btn-datatable btn-icon btn-danger"
                                                                            title="Batal" type="button"><i
                                                                                data-feather="x"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <table id="dataTable" class="display">
                                                    <thead>
                                                        <tr>
                                                            <!-- Header tabel -->
                                                            <th>Mark</th>
                                                            <th>Profile</th>
                                                            <th>Qty</th>
                                                            <th>Grade</th>
                                                            <th>Panjang(mm)</th>
                                                            <th>Area(m2)</th>
                                                            <th>Berat</th>
                                                            <th>Action</th>
                                                            <!-- ... Tambahan kolom sesuai kebutuhan ... -->
                                                        </tr>
                                                    </thead>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Wizard tab pane item 3-->
                        <div class="tab-pane py-5 py-xl-5 fade" id="wizard3" role="tabpanel"
                            aria-labelledby="wizard3-tab">
                            <div class="row justify-content-center">
                                <div class="col-xxl-8 col-xl-12">
                                    <h3 class="text-primary">Step 3</h3>
                                    @if (!empty($assemblyData))
                                        <input type="hidden" name="nama_assembly" value="{{ $assemblyName }}">
                                        <input type="hidden" name="tanggal_assembly" value="{{ $tgl_assembly }}">
                                        <h5 class="card-title mb-1"><b>File:</b> {{ $assemblyName }}</h5>
                                        <h5 class="card-title mb-4"><b>Tanggal Turun:</b> {{ $tgl_assemblylist }}</h5>
                                    @else
                                        <h5 class="card-title mb-1"><b>File:</b> </h5>
                                        <h5 class="card-title mb-4"><b>Tanggal Turun:</b> </h5>
                                    @endif
                                    <div class="row gx-3">
                                        <div class="mb-3 col-md-12">
                                            @if (!empty($assemblyData))
                                                <table id="dataTable1" class="display data-assembly" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <!-- Header tabel -->
                                                            <th hidden>Kode Ass.Mark</th>
                                                            <th style="width: 10%">Ass Mark</th>
                                                            <th style="width: 15%">Name</th>
                                                            <th style="width: 5%">Qty</th>
                                                            <th style="width: 10%">Profile</th>
                                                            <th style="width: 5%">Grade</th>
                                                            <th>Panjang(mm)</th>
                                                            <th style="width: 20%">Location</th>
                                                            <th>Berat(kg)</th>
                                                            <th>Area(m2)</th>
                                                            <!-- ... Tambahan kolom sesuai kebutuhan ... -->
                                                        </tr>
                                                    </thead>

                                                    <tbody class="data-part">
                                                        @foreach ($assemblyData as $data)
                                                            @if (isset($data[11]) && isset($data[1]))
                                                                <tr>
                                                                    <td hidden>{{ $kode_project . $data[1] }}</td>
                                                                    <td>{{ $data[1] }}</td>
                                                                    <td>
                                                                        {{ $data[2] . ' ' . $data[3] }}
                                                                    </td>
                                                                    <td contenteditable="true">{{ $data[4] }}
                                                                    </td>
                                                                    <td contenteditable='true'>{{ $data[5] }}
                                                                    </td>
                                                                    <td>{{ $data[6] }}</td>
                                                                    <td>{{ $data[7] }}</td>
                                                                    <td>{{ $data[8] }}</td>
                                                                    <td>{{ $data[9] }}</td>
                                                                    <td>{{ $data[10] }}</td>
                                                                </tr>
                                                            @elseif (isset($data[10]) && isset($data[1]))
                                                                <tr>
                                                                    <td hidden>{{ $kode_project . $data[1] }}</td>
                                                                    <td>{{ $data[1] }}</td>
                                                                    <td>
                                                                        {{ $data[2] }}
                                                                    </td>
                                                                    <td contenteditable="true">{{ $data[3] }}
                                                                    </td>
                                                                    <td contenteditable='true'>{{ $data[4] }}
                                                                    </td>
                                                                    <td>{{ $data[5] }}</td>
                                                                    <td>{{ $data[6] }}</td>
                                                                    <td>{{ $data[7] }}</td>
                                                                    <td>{{ $data[8] }}</td>
                                                                    <td>{{ $data[9] }}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <table id="dataTable" class="display">
                                                    <thead>
                                                        <tr>
                                                            <!-- Header tabel -->
                                                            <th>Mark</th>
                                                            <th>Profile</th>
                                                            <th>Qty</th>
                                                            <th>Grade</th>
                                                            <th>Panjang(mm)</th>
                                                            <th>Area(m2)</th>
                                                            <th>Berat</th>
                                                            <th>Action</th>
                                                            <!-- ... Tambahan kolom sesuai kebutuhan ... -->
                                                        </tr>
                                                    </thead>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Wizard tab pane item 4-->
                        <div class="tab-pane py-5 py-xl-5 fade" id="wizard4" role="tabpanel"
                            aria-labelledby="wizard4-tab">
                            <div class="row justify-content-center">
                                <div class="col-xxl-8 col-xl-12">
                                    <h3 class="text-primary">Step 4</h3>
                                    <h5 class="card-title mb-4">Review File Assembly Part List</h5>
                                    <div class="row small text-muted">
                                        <div class="col-sm-3 text-truncate"><em>Username:</em></div>
                                        <div class="col">username</div>
                                    </div>
                                    <div class="row small text-muted">
                                        <div class="col-sm-3 text-truncate"><em>Name:</em></div>
                                        <div class="col">Valerie Luna</div>
                                    </div>
                                    <div class="row small text-muted">
                                        <div class="col-sm-3 text-truncate"><em>Organization Name:</em></div>
                                        <div class="col">Start Bootstrap</div>
                                    </div>
                                    <div class="row small text-muted">
                                        <div class="col-sm-3 text-truncate"><em>Location:</em></div>
                                        <div class="col">San Francisco, CA</div>
                                    </div>
                                    <div class="row small text-muted">
                                        <div class="col-sm-3 text-truncate"><em>Email Address:</em></div>
                                        <div class="col">name@example.com</div>
                                    </div>
                                    <div class="row small text-muted">
                                        <div class="col-sm-3 text-truncate"><em>Phone Number:</em></div>
                                        <div class="col">555-123-4567</div>
                                    </div>
                                    <div class="row small text-muted">
                                        <div class="col-sm-3 text-truncate"><em>Birthday:</em></div>
                                        <div class="col">06/10/1988</div>
                                    </div>
                                    <div class="row small text-muted">
                                        <div class="col-sm-3 text-truncate"><em>Credit Card Number:</em></div>
                                        <div class="col">**** **** **** 1111</div>
                                    </div>
                                    <div class="row small text-muted">
                                        <div class="col-sm-3 text-truncate"><em>Credit Card Expiration:</em></div>
                                        <div class="col">06/2024</div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-light" type="button">Previous</button>
                                        <button class="btn btn-primary" type="button">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane py-5 py-xl-5 fade" id="wizard5" role="tabpanel"
                            aria-labelledby="wizard5-tab">
                            <div class="row justify-content-center">
                                <div class="col-xxl-6 col-xl-8">
                                    <form>
                                        <h3 class="text-primary">Step 5</h3>
                                        <h5 class="card-title mb-4">Review File Engineering dan Submit</h5>
                                        <div class="row small text-muted">
                                            <div class="col-sm-2 text-truncate"><em>Part List:</em></div>
                                            @if (!empty($partlistData))
                                                <div class="col">{{ $partlistName }}</div>
                                            @endif
                                        </div>
                                        <div class="row small text-muted">
                                            <div class="col-sm-2 text-truncate"><em>Assembly List:</em></div>
                                            @if (!empty($assemblyData))
                                                <div class="col">{{ $assemblyName }}</div>
                                            @endif
                                        </div>
                                        <div class="row small text-muted">
                                            <div class="col-sm-3 text-truncate"><em>Assembly Part List:</em></div>
                                            <div class="col"></div>
                                        </div>
                                        <hr class="my-4" />
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('import-menu') }}" class="btn btn-danger">Batal</a>
                                            <button id="submit-button" class="btn btn-primary">Submit</button>
                                            {{-- <button id="submit-button" type="button">Kirim</button> --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            $('#subproject_id').select2({
                placeholder: 'Pilih Project..',
                allowClear: true,
                // Tambahkan opsi lainnya sesuai kebutuhan
            });

            $('#dataTable').on('click', '.btn-batal', function() {
                var row = $(this).closest('tr');
                var statusCell = row.find('.badge');
                var dataId = row.find('td[data-id]').data('id');
                var rowId = $("#data-part tr").last().attr("data-id");
                var keteranganStatusTextbox = $("#data-" + dataId);

                // Ubah nilai status dari "Aktif" menjadi "Batal"
                if (statusCell.text().trim() === 'Aktif') {
                    statusCell.text('Batal');
                    statusCell.addClass('bg-danger')
                    statusCell.removeClass('bg-success')

                    keteranganStatusTextbox.val("Batal");
                } else {
                    statusCell.text('Aktif');
                    statusCell.addClass('bg-success')
                    statusCell.removeClass('bg-danger')

                    keteranganStatusTextbox.val("Aktif");
                }
            });

            $('#submit-button').click(function() {
                var dataToSend = [];
                var nama_partlist = $('input[name="nama_partlist"]').val();
                var project_id = $('input[name="project_id"]').val();
                var tanggal = $('input[name="tanggal"]').val();
                var dataPart = $('.data-table')

                if (dataPart !== null) {
                    $('.data-table tbody tr').each(function() {
                        var rowData = {};
                        $(this).find('td').each(function(index, element) {
                            rowData['data' + (index + 1)] = $(element).text();
                        });
                        dataToSend.push(rowData);
                    });
                }

                // Kirim data menggunakan AJAX
                $.ajax({
                    url: '{{ route('saveImport') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        nama_partlist: nama_partlist,
                        project_id: project_id,
                        tanggal: tanggal,
                        data: dataToSend
                    },
                    success: function(response) {
                        console.log(dataToSend);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
