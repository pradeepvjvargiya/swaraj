@extends('frontends.layout')
@section('content')
    <style>
        table td {
            vertical-align: middle !important;
        }
    </style>
    <!-- Content -->
    <div class="page-content bg-white" style="padding-bottom:0px">
        <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-dark banner-content "
            style="background-image:url(images/banner/swaraj_banner<?php echo rand(1, 4); ?>.jpg);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Financial </h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="/">Home</a></li>
                            <li>Financial</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>

        <nav class="navbar-expand-lg navbar-dark bg-dark p-4">
            <ul class="navbar-nav justify-content-center">
                <li class="nav-item active">
                    <a class="nav-link" href="/financial">Financial Result</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/annual-return">Annual Return</a>
                </li>
            </ul>
        </nav>

        <div class="section-full call-action wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
            <?php
            //include_once('financial_nav.php');
            ?>
            <div class="container pb-4">
                <h1 class="text-center">FINANCIALS</h1>
                <table class="table table-bordered text-center">
                    <tr>
                        <th>Annual Report</th>
                        <th>Q1</th>
                        <th>Q2/H1</th>
                        <th>Q3</th>
                        <th>Q4/H2</th>
                    </tr>
                    @foreach ($reports as $report)
                        <tr>
                            <td>
                                <a href="{{ asset('/storage/' . $report->filepath) }}"
                                    target="_blank">{{ $report->year }}</a>
                            </td>
                            <td>
                                @foreach ($report->getQuarterDocs($report->year, 'Q1') as $doc)
                                    @if ($doc->filepath && Storage::exists($doc->filepath))
                                    <a href="{{ asset('/storage/' .$doc->filepath) }}" target="_blank" data-toggle="tooltip"
                                        data-placement="top" title="View File">{{ $doc->title }}</a>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($report->getQuarterDocs($report->year, 'Q2') as $doc)
                                    @if ($doc->filepath && Storage::exists($doc->filepath))
                                        <a href="{{ asset('/storage/' .$doc->filepath) }}" target="_blank" data-toggle="tooltip"
                                            data-placement="top" title="View File">{{ $doc->title }}</a>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($report->getQuarterDocs($report->year, 'Q3') as $doc)
                                    @if ($doc->filepath && Storage::exists($doc->filepath))
                                        <a href="{{ asset('/storage/' .$doc->filepath) }}" target="_blank" data-toggle="tooltip"
                                            data-placement="top" title="View File">{{ $doc->title }}</a>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($report->getQuarterDocs($report->year, 'Q4') as $doc)
                                    @if ($doc->filepath && Storage::exists($doc->filepath))
                                        <a href="{{ asset('/storage/' .$doc->filepath) }}" target="_blank" data-toggle="tooltip"
                                            data-placement="top" title="View File">{{ $doc->title }}</a>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
    <!--END Content-->
@endsection
