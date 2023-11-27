@extends('layouts.admin')

@section('title', 'Add Quarter')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-12">
                <label for="page-category" class="form-label" style="color: black;">Page Category:</label>
                <span id="page-category">{{ $page }}</span>
            </div>
            <div class="col-sm-12">
                <label for="year" class="form-label" style="color: black;">Year:</label>
                <span id="year">{{ $year }}</span>
            </div>
            <div class="col-sm-12">
                <label for="quarter" class="form-label" style="color: black;">Add Quarter:</label>
            </div>
        </div>

        {{-- display error message start --}}
        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif
        {{-- display error message end --}}

        <form class="col-lg-6 row"
            action="{{ route('reports.storeQuarter', ['page' => $page, 'year' => $year, 'quarter' => $quarter]) }}"
            method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
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
            <div class="row mb-3">
                <label for="filepath" class="col-sm-3 col-form-label">File</label>
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
                    <a href="{{ route('reports.list', ['page' => $page]) }}" class="btn btn-sm btn-warning mb-3">Back</a>
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
