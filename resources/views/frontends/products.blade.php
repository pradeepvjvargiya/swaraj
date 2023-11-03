@extends('frontends.layout')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white" style="padding-bottom:0px">
        <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-dark banner-content "
            style="background-image:url(images/banner/swaraj_banner<?php echo rand(1, 4); ?>.jpg);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Products</h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="/">Home</a></li>
                            <li>Products</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
    </div>
    <!--END Content-->
@endsection
