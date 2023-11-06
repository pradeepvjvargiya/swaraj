@extends('frontends.layout')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white" style="padding-bottom:0px">
        <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-dark banner-content "
            style="background-image:url(images/banner/swaraj_banner<?php echo rand(1, 4); ?>.jpg);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Outcomes </h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="/">Home</a></li>
                            <li>Outcomes</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>

        <nav class="navbar-expand-lg navbar-dark bg-dark p-4">
            <ul class="navbar-nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="/notices">Notices</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/outcomes">Outcomes</a>
                </li>
            </ul>
        </nav>

        <div class="section-full call-action wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
            <div class="container pb-4">
                <h1 class="text-center">Outcomes </h1>
                <table class="table table-bordered text-center">
                    <tr>
                        <th>Date</th>
                        <th>Outcome</th>
                    </tr>
                    @foreach ($documents as $document)
                        <tr>
                            <td>{{ $document->date->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ asset('/storage/' . $document->filepath) }}"
                                    target="_blank">{{ $document->title }}</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
    <!--END Content-->
@endsection
