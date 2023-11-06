@extends('frontends.layout')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white" style="padding-bottom:0px">
        <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-dark banner-content "
            style="background-image:url(images/banner/swaraj_banner<?php echo rand(1, 4); ?>.jpg);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Annual Return </h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="/">Home</a></li>
                            <li>Financial</li>
                            <li>Annual Return</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>

        <nav class="navbar-expand-lg navbar-dark bg-dark p-4">
            <ul class="navbar-nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="/financial">Financial Result</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/annual-return">Annual Return</a>
                </li>
            </ul>
        </nav>

        <div class="section-full call-action bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
            <div class="container">
                @foreach ($documents as $document)
                    <div class="row mb-5 ">
                        <div class="col-lg-12 text-white">
                            <a href={{ asset('/storage/' . $document->filepath) }} target="_blank" class="">
                                <h2 class="title">{{ $document->title }}</h2>
                            </a>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="row mb-5">
                    <div class="col-lg-12 text-white">
                        <a href="/uploads/reports/Annual-Return-2021-22.pdf" target="_blank" class="">
                            <h2 class="title">Annual Return 2021-22</h2>
                        </a>
                    </div> --}}
            </div>
        </div>
    </div>
    </div>
    <!--END Content-->
@endsection
