@extends('errors.layouts.main')
@section('title', '405 Error')
@section('content')
    <main>
        <div class="container-xl px-4">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mt-4">
                        <img class="img-fluid p-4"
                            src="{{ asset('sb-admin/assets/img/illustrations/500-internal-server-error.svg') }}"
                            alt="" />
                        <p class="lead">The server encountered an internal error or misconfiguration and was
                            unable to complete your request.</p>
                        <a class="text-arrow-icon"
                            href="{{ route('dashboard') }}>
                                        <i class="ms-0 me-1"
                            data-feather="arrow-left"></i>
                            Return to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
