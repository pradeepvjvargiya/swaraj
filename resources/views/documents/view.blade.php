@extends('layouts.admin')

@section('content')
    <!-- custom css -->
    <style type="text/css">
        .profile_image {
            width: 500px;
            height: auto;
        }
    </style>

    <section class="section profile">
        <!-- Start Page Title -->
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('documents.list', ['page' => $page]) }}">{{ $page }}</a></li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
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
                                {{-- Title --}}
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="title" id="title" value="{{ $document->title }}"
                                            class="form-control" autocomplete="off">
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Date and File --}}
                                <div class="row mb-3">
                                    <label for="date" class="col-sm-3 col-form-label">Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="date" id="date" value="{{ $document->date }}">
                                        @error('mobile')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="filepath" class="col-sm-3 col-form-label">Document</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="filepath" id="filepath" class="form-control">
                                        <img src="{{ asset('storage/' . $document->filepath) }}" alt="">
                                        <span>Add file only if you want to update old file</span>
                                        @error('filepath')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mt-3 col-lg-6">
                                        <input type="submit" hidden id="update_btn" name="">
                                        <p onclick="update()" class="btn btn-sm btn-primary">Update</p>
                                        <input type="button" hidden id="onCancleClick" name="" value="Reset">
                                        <p onclick="cancel()" class="btn btn-sm btn-danger">Reset</p>
                                        <a href="{{ route('documents.list', ['page' => $page]) }}"
                                            class="btn btn-sm btn-warning mb-3">Back</a>
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
