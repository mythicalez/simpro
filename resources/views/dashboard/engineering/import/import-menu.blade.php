@extends('dashboard.layouts.main')

@section('content')
    <main>
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
                        <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-bs-toggle="tab"
                            role="tab" aria-controls="wizard1" aria-selected="true">
                            <div class="wizard-step-icon">1</div>
                            <div class="wizard-step-text">
                                <div class="wizard-step-text-name">Import File</div>
                                <div class="wizard-step-text-details">Silahkan Import File Terlebih Dahulu</div>
                            </div>
                        </a>
                        <!-- Wizard navigation item 2-->
                        <a class="nav-item nav-link" id="wizard2-tab" disabled data-bs-toggle="tab" role="tab"
                            aria-controls="wizard2" aria-selected="true">
                            <div class="wizard-step-icon">2</div>
                            <div class="wizard-step-text">
                                <div class="wizard-step-text-name">Part List</div>
                                <div class="wizard-step-text-details">Review Part List Data</div>
                            </div>
                        </a>
                        <!-- Wizard navigation item 3-->
                        <a class="nav-item nav-link" id="wizard3-tab" disabled data-bs-toggle="tab" role="tab"
                            aria-controls="wizard3" aria-selected="true">
                            <div class="wizard-step-icon">3</div>
                            <div class="wizard-step-text">
                                <div class="wizard-step-text-name">Assembly List</div>
                                <div class="wizard-step-text-details">Review Assembly List Data</div>
                            </div>
                        </a>
                        <!-- Wizard navigation item 4-->
                        <a class="nav-item nav-link" id="wizard4-tab" disabled data-bs-toggle="tab" role="tab"
                            aria-controls="wizard4" aria-selected="true">
                            <div class="wizard-step-icon">4</div>
                            <div class="wizard-step-text">
                                <div class="wizard-step-text-name">Assembly Part List</div>
                                <div class="wizard-step-text-details">Review Assembly Past List Data</div>
                            </div>
                        </a>
                        <a class="nav-item nav-link" id="wizard5-tab" disabled data-bs-toggle="tab" role="tab"
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
                        <!-- Wizard tab pane item 1-->
                        <div class="tab-pane py-5 py-xl-10 fade show active" id="wizard1" role="tabpanel"
                            aria-labelledby="wizard1-tab">
                            <div class="row justify-content-center">
                                <div class="col-xxl-8 col-xl-12">
                                    <h3 class="text-primary">Step 1</h3>
                                    <h5 class="card-title mb-4">Silahkan Import File Terlebih Dahulu</h5>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form enctype="multipart/form-data" id="importForm" method="POST"
                                        action="{{ route('importEng') }}">
                                        @csrf
                                        <div class="row gx-3">
                                            <div class="mb-3 col-md-12">
                                                <label for="project">Project:</label>
                                                <select id="project" class="form-select form-select-lg mb-3 project"
                                                    required aria-label="medium select example" name="project_id">
                                                    <option selected></option>
                                                    @foreach ($subproject as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->kode_project . '-' . $item->project->nama_project . ' (' . $item->nama_subproject . ')' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row gx-3">
                                            <div class="mb-3 col-md-4">
                                                <label for="partlistFile" class="form-label">Part List</label>
                                                <input class="form-control" type="file" name="partlist" accept=".xsr"
                                                    id="partlistFile">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="assemblyFile" class="form-label">Assembly List</label>
                                                <input class="form-control" type="file" name="assembly_list"
                                                    accept=".xsr" id="assemblyFile">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="asslistFile" class="form-label">Assembly Part List</label>
                                                <input class="form-control" type="file" name="asspart" accept=".xsr"
                                                    id="asslistFile">
                                            </div>
                                        </div>
                                        <hr class="my-4" />
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary">Import
                                                File</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Wizard tab pane item 2-->
                        {{-- <div class="tab-pane py-5 py-xl-10 fade" id="wizard2" role="tabpanel"
                            aria-labelledby="wizard2-tab">
                            <div class="row justify-content-center">
                                <div class="col-xxl-8 col-xl-12">
                                    <h3 class="text-primary">Step 2</h3>
                                    <h5 class="card-title mb-4">Data from File: PART LIST .xsr</h5>
                                    @if (!empty($partlistData))
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
                                            <tbody>
                                                @foreach ($partlistData as $data)
                                                    <tr>
                                                        <td>{{ $data[1] }}</td>
                                                        <td>{{ $data[2] }}</td>
                                                        <td>{{ $data[3] }}</td>
                                                        <td>{{ $data[4] }}</td>
                                                        <td>{{ $data[5] }}</td>
                                                        <td>{{ $data[6] }}</td>
                                                        <td>{{ $data[7] }}</td>
                                                        <td><a href="" target="_blank"
                                                                rel="noopener noreferrer">Batal</a></td>

                                                    </tr>
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
                                            <tbody>

                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Wizard tab pane item 3-->
                        <div class="tab-pane py-5 py-xl-10 fade" id="wizard3" role="tabpanel"
                            aria-labelledby="wizard3-tab">
                            <div class="row justify-content-center">
                                <div class="col-xxl-8 col-xl-12">
                                    <h3 class="text-primary">Step 3</h3>
                                    <h5 class="card-title mb-4">Choose when you want to receive email notifications
                                    </h5>
                                    <form>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkAccountChanges" type="checkbox"
                                                checked />
                                            <label class="form-check-label" for="checkAccountChanges">Changes made to
                                                your
                                                account</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkAccountGroups" type="checkbox"
                                                checked />
                                            <label class="form-check-label" for="checkAccountGroups">Changes are made
                                                to
                                                groups you're part of</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkProductUpdates" type="checkbox"
                                                checked />
                                            <label class="form-check-label" for="checkProductUpdates">Product updates
                                                for
                                                products you've purchased or starred</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkProductNew" type="checkbox"
                                                checked />
                                            <label class="form-check-label" for="checkProductNew">Information on new
                                                products and services</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkPromotional" type="checkbox" />
                                            <label class="form-check-label" for="checkPromotional">Marketing and
                                                promotional offers</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="checkSecurity" type="checkbox" checked
                                                disabled />
                                            <label class="form-check-label" for="checkSecurity">Security
                                                alerts</label>
                                        </div>
                                        <hr class="my-4" />
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-light" type="button">Previous</button>
                                            <button class="btn btn-primary" type="button">Next</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Wizard tab pane item 4-->
                        <div class="tab-pane py-5 py-xl-10 fade" id="wizard4" role="tabpanel"
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

                        <div class="tab-pane py-5 py-xl-10 fade" id="wizard5" role="tabpanel"
                            aria-labelledby="wizard5-tab">
                            <div class="row justify-content-center">
                                <div class="col-xxl-6 col-xl-8">
                                    <h3 class="text-primary">Step 5</h3>
                                    <h5 class="card-title mb-4">Review File Engineering dan Submit</h5>
                                    <div class="row small text-muted">
                                        <div class="col-sm-3 text-truncate"><em>Part List:</em></div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row small text-muted">
                                        <div class="col-sm-3 text-truncate"><em>Assembly List:</em></div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row small text-muted">
                                        <div class="col-sm-3 text-truncate"><em>Assembly Part List:</em></div>
                                        <div class="col"></div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-light" type="button">Previous</button>
                                        <button class="btn btn-primary" type="button">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
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
        });

        function importData() {
            var formData = new FormData(document.getElementById('importForm'));

            $.ajax({
                url: "{{ route('importEng') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Tangani respons sukses di sini
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Tangani error di sini
                    var errorMessage = xhr.responseText;
                    console.error(errorMessage);
                    displayError(errorMessage);
                }
            });
        }

        function displayError(errorMessage) {
            // Tampilkan pesan error dalam elemen alert Bootstrap
            $('#errorMessage').text(errorMessage);
            $('#errorAlert').show();
        }
    </script>
@endsection
