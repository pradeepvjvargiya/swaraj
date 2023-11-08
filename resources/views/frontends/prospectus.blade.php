@extends('frontends.layout')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white" style="padding-bottom:0px">
        <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-dark banner-content "
            style="background-image:url(images/banner/swaraj_banner<?php echo rand(1, 4); ?>.jpg);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Prospectus & IPO </h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="/">Home</a></li>
                            <li>Prospectus & IPO</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>

        <div class="section-full call-action bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
            <div class="container">
                @foreach ($documents as $document)
                    <div class="row mb-5">
                        <div class="col-lg-9 text-white">

                            <h2 class="title">{{ $document->title }}</h2>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <a href="{{ asset('/storage/' . $document->filepath) }}" target="_blank"
                                class="site-button white align-self-center outline ml-auto radius-xl outline-2 btnhover16 btnhover16">Click
                                here to view/download</a>
                        </div>
                    </div>
                @endforeach
                <div class="row mb-5">
                    <div class="col-lg-9 text-white">

                        <h2 class="title">Download Online Application Form</h2>
                    </div>
                    <div class="col-lg-3 d-flex">
                        <a href="https://ipoforms.nseindia.com/issueforms/html/index.jsp" target="_blank"
                            class="site-button white align-self-center outline ml-auto radius-xl outline-2 btnhover16 btnhover16">Click
                            here to download</a>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-lg-9 text-white">

                        <h2 class="title">Download Revision Application Form </h2>
                    </div>
                    <div class="col-lg-3 d-flex">
                        <a href="https://ipoforms.nseindia.com/issueforms/html/index.jsp" target="_blank"
                            class="site-button white align-self-center outline ml-auto radius-xl outline-2 btnhover16 btnhover16">Click
                            here to download</a>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-lg-9 text-white">

                        <h2 class="title">Download Blank Application Form </h2>
                    </div>
                    <div class="col-lg-3 d-flex">
                        <a href="https://ipoforms.nseindia.com/issueforms/html/index.jsp" target="_blank"
                            class="site-button white align-self-center outline ml-auto radius-xl outline-2 btnhover16 btnhover16">Click
                            here to download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Content-->
@endsection
