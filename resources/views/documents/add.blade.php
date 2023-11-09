@extends('layouts.admin')

@section('title', 'Add Document')

@section('content')
    <div class="container">
        <!-- Start Page Title -->
        <div class="pagetitle">
            <h1>{{ $page }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('documents.list', ['page' => $page]) }}">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">Add Document</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <form class="col-lg-6 row" action="{{ route('documents.store', $page) }}" method="post" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            {{-- Title --}}
            <div class="row mb-3">
                <label for="title" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control"
                        autocomplete="off">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{-- Date and File --}}
            <div class="row mb-3">
                <label for="date" class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-9">
                    <input type="date" name="date" id="date" value="{{ old('date') }}">
                    @error('mobile')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="filepath" class="col-sm-3 col-form-label">Document</label>
                <div class="col-sm-9">
                    <input type="file" name="filepath" id="filepath" class="form-control">
                    @error('filepath')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            {{-- Add button --}}
            <div class="row">
                <div class="mt-3 col-lg-6">
                    <input type="submit" hidden id="add_btn" name="">
                    <p onclick="add()" class="btn btn-sm btn-primary">Add</p>
                    <input type="button" hidden id="onCancleClick" name="" value="Reset">
                    <p onclick="cancel()" class="btn btn-sm btn-danger">Reset</p>
                    <a href="{{ route('documents.list', ['page' => $page]) }}" class="btn btn-sm btn-warning mb-3">Back</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        // create action
        function add() {
            if (confirm("Are you wants to add document!")) {
                document.getElementById("add_btn").click();
            }
        }
        // reset
        function cancel() {
            if (confirm("Are you wants to reset document data!")) {
                location.reload();
            }
        }
    </script>
@endsection
