@extends('layouts.admin')

@section('content')
    <!-- custom css -->
    <style type="text/css">
        .profile_image {
            width: 500px;
            height: auto;
        }
    </style>

    <!-- Start Page Title -->
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Document</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Document Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Title</div>
                                    <div class="col-lg-9 col-md-8">{{ $document->title }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Document</div>
                                    <div class="col-lg-9 col-md-8">{{ $document->filepath }}</div>
                                </div>
                            </div>
                        </div><!-- End Bordered Tabs -->

                        <!-- Profile Edit -->
                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                            <form action="{{ url('documents/' . $page . '/view/' . $id) }}" method="post"
                                enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="title" class="col-md-4 col-lg-3 col-form-label">Title</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="title" type="text" class="form-control" id="title"
                                            value="{{ $document->title }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="date" class="col-md-4 col-lg-3 col-form-label">Date</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="date" type="text" class="form-control" id="date"
                                            value="{{ $document->date }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <label for="filepath">Document</label>
                                        <input type="file" name="filepath" id="filepath" class="form-control">
                                        <img src="{{ asset('storage/' . $document->filepath) }}" alt="">
                                        @error('filepath')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mt-3 col-lg-6">
                                        <input type="submit" hidden id="update_btn" name="">
                                        <p onclick="update()" class="btn btn-primary">Update</p>
                                        <input type="button" hidden id="onCancleClick" name="" value="Reset">
                                        <p onclick="cancel()" class="btn btn-danger">Reset</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Profile Edit -->
                    </div>
                </div>
            </div>
        </div>
        <script>
            // create action
            function update() {
                if (confirm("Are you wants to update document!")) {
                    document.getElementById("update_btn").click();
                }
            }

            // reset
            function cancel() {
                if (confirm("Are you wants to reset document data!")) {
                    location.reload();
                }
            }
        </script>
    </section>
@endsection
