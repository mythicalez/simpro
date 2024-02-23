@extends('layouts.home')
@section('konten')
    <main>

        <!-- Slider Area Start-->
        <div class="slider-area ">
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-5">
                                <div class="hero__img d-none d-lg-block" data-animation="fadeInLeft" data-delay="1s">
                                    <img src="{{ asset('web-report/assets/img/hero/1hero_right.png') }}" alt=""
                                        width="400">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-9 ">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInRight" data-delay=".4s">Sistem Informasi Manajemen Proyek</h1>
                                    <p data-animation="fadeInRight" data-delay=".6s">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Ex labore, voluptas dolore nostrum sed ea unde, temporibus iusto
                                        ratione nulla suscipit veniam! Quis, iste iusto corrupti perspiciatis nulla ab
                                        aspernatur.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
