@extends('frontends.layout')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white" style="padding-bottom:0px">
        <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-dark banner-content "
            style="background-image:url(images/banner/swaraj_banner<?php echo rand(1, 4); ?>.jpg);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Shareholding Pattern </h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="/">Home</a></li>
                            <li>Shareholding Pattern</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>

        <div class="section-full call-action wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
            <div class="container pb-4">
                <h1 class="text-center">Shareholding Pattern </h1>
                <table class="table table-bordered text-center">
                    <tr>
                        <th>Year</th>
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
                                @foreach ($report->getQuarterDocs($page, $report->year, 'Q1') as $doc)
                                    @if ($doc->filepath && Storage::exists($doc->filepath))
                                        <a href="{{ asset('/storage/' . $doc->filepath) }}" target="_blank"
                                            data-toggle="tooltip" data-placement="top"
                                            title="View File">{{ $doc->title }}</a>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($report->getQuarterDocs($page, $report->year, 'Q2') as $doc)
                                    @if ($doc->filepath && Storage::exists($doc->filepath))
                                        <a href="{{ asset('/storage/' . $doc->filepath) }}" target="_blank"
                                            data-toggle="tooltip" data-placement="top"
                                            title="View File">{{ $doc->title }}</a>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($report->getQuarterDocs($page, $report->year, 'Q3') as $doc)
                                    @if ($doc->filepath && Storage::exists($doc->filepath))
                                        <a href="{{ asset('/storage/' . $doc->filepath) }}" target="_blank"
                                            data-toggle="tooltip" data-placement="top"
                                            title="View File">{{ $doc->title }}</a>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($report->getQuarterDocs($page, $report->year, 'Q4') as $doc)
                                    @if ($doc->filepath && Storage::exists($doc->filepath))
                                        <a href="{{ asset('/storage/' . $doc->filepath) }}" target="_blank"
                                            data-toggle="tooltip" data-placement="top"
                                            title="View File">{{ $doc->title }}</a>
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
