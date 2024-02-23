@extends('errors.layouts.main')
@section('title', '504 Error')
@section('content')
    <main>
        <div class="container-xl px-4">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center mt-4">
                        <img class="img-fluid p-4" src="assets/img/illustrations/504-error-gateway-timeout.svg"
                            alt="" />
                        <p class="lead">The server encountered a temporary error and could not complete your
                            request.</p>
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
