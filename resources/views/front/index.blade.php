@extends('front-layout.app')
@section('content')
@inject('user','App\Models\User')
@php
    $admin = $user::where('id',1)->first();
    // dd($admin);
@endphp
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <img src="{{ asset('front/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

        <div class="container text-center" data-aos="zoom-out" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2>{{ $admin->name }}</h2>
                    {{-- <p>I'm a professional Web Developer</p> --}}
                    <p>{{ $admin->post }}</p>
                    <a href="{{route('about')}}" class="btn-get-started">About Me</a>
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->
@endsection
