@extends('frontends.layout')
@section('content')
    <!-- Content -->
    <div class="page-content bg-white" style="padding-bottom:0px">
        <div class="dlab-bnr-inr dlab-bnr-inr-sm overlay-black-dark banner-content "
            style="background-image:url(images/banner/swaraj_banner<?php echo rand(1, 4); ?>.jpg);">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Management & Committee </h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="/">Home</a></li>
                            <li>Management & Committee</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <div class="content-block">
            <div class="section-full content-inner-2 bg-gray wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="container">
                    <div class="section-head text-black text-center">
                        <h2 class="title">Management</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td>#</td>
                                <td>Name of Director</td>
                                <td>Designation</td>
                                <td>DIN</td>
                            </tr>
                            <tr>
                                <td><img src="images/team/mohammed_sabir_khan.jpeg" alt="Mr. Mohammed Sabir Khan"
                                        style="max-width:250px;min-width:100px"></td>
                                <td>Mr. Mohammed Sabir Khan</td>
                                <td>Chairman & Managing Director</td>
                                <td>00561917</td>
                            </tr>

                            <tr>
                                <td><img src="images/team/nasir_khan.jpeg" alt="Mr. Nasir Khan"
                                        style="max-width:250px;min-width:100px"></td>
                                <td>Mr. Nasir Khan</td>
                                <td>Whole Time Director</td>
                                <td>07775998</td>
                            </tr>

                            <tr>
                                <td><img src="images/team/samar_khan.jpeg" alt="Mrs. Samar Khan"
                                        style="max-width:250px;min-width:100px"></td>
                                <td>Mrs. Samar Khan</td>
                                <td>Whole Time Director</td>
                                <td>01124399</td>
                            </tr>

                            <tr>
                                <td><img src="images/team/amreen_sheikh.jpg" alt="Mrs. Amreen Sheikh"
                                        style="max-width:250px;min-width:100px"></td>
                                <td>Mrs. Amreen Sheikh</td>
                                <td>Independent Director</td>
                                <td>09027151</td>
                            </tr>

                            <tr>
                                <td><img src="images/team/annie_zuberi.jpg" alt="Mrs. Annie Zuberi"
                                        style="max-width:250px;min-width:100px"></td>
                                <td>Mrs. Annie Zuberi</td>
                                <td>Independent Director</td>
                                <td>08849178</td>
                            </tr>

                            <tr>
                                <td><img src="images/team/ramesh_agarwal.jpg" alt="Mr. Ramesh Agarwal"
                                        style="max-width:250px;min-width:100px"></td>
                                <td>Mr. Ramesh Agarwal</td>
                                <td>Independent Director</td>
                                <td>01407724</td>
                            </tr>

                        </table>
                    </div>

                </div>
            </div>
            <div class="section-full content-inner-2 bg-white wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="container">
                    <div class="section-head text-black text-center">
                        <h2 class="title">Committees</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td>Name of Director</td>
                                <td>Designation</td>
                                <td>Audit Committee</td>
                                <td>Nomination & Remuneration Committee</td>
                                <td>Stakeholders Relationship Committee</td>
                                <td>Corporate Social Responsibility Committee</td>
                            </tr>

                            <tr>
                                <td>Mr. Mohammed Sabir Khan</td>
                                <td>Chairman & Managing Director</td>
                                <td>Member</td>
                                <td>Member</td>
                                <td>Member</td>
                                <td>Member</td>
                            </tr>

                            <tr>
                                <td>Mr. Nasir Khan</td>
                                <td>Whole Time Director</td>
                                <td>-</td>
                                <td>-</td>
                                <td>Member</td>
                                <td>Member</td>
                            </tr>

                            <tr>
                                <td>Mrs. Samar Khan</td>
                                <td>Whole Time Director</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>Mrs. Amreen Sheikh</td>
                                <td>Independent Director</td>
                                <td>Chairperson</td>
                                <td>Member</td>
                                <td>Member</td>
                                <td>Chairperson</td>
                            </tr>

                            <tr>
                                <td>Mrs. Annie Zuberi</td>
                                <td>Independent Director</td>
                                <td>Member</td>
                                <td>Chairperson</td>
                                <td>Chairperson</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>Mr. Ramesh Agarwal</td>
                                <td>Independent Director</td>
                                <td>-</td>
                                <td>Member</td>
                                <td>-</td>
                                <td></td>
                            </tr>


                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--END Content-->
@endsection
