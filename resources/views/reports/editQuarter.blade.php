@extends('layouts.admin')

@section('title', 'Edit Quarter')

@section('content')
    <div class="container">
        <h5 class="col-lg-12 mb-3 text-center">Edit Quarter</h5>
        <form class="col-lg-6 row"
            action="{{ route('reports.updateQuarter', ['page' => $report->page, 'year' => $report->year, 'quarter' => $report->quarter, 'id' => $report->id]) }}"
            method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="title" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-9">
                    <input type="text" name="title" id="title" value="{{ $report->title }}" class="form-control"
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
                    <img src="{{ asset('storage/' . $report->filepath) }}" alt="">
                    <span>Add file only if you want to update old file</span>
                    @error('filepath')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            {{-- Add button --}}
            <div class="row">
                <div class="mt-3 col-lg-6">
                    <input type="submit" hidden id="update_btn" name="">
                    <p onclick="update()" class="btn btn-sm btn-primary">Update</p>
                    <input type="button" hidden id="onCancleClick" name="" value="Reset">
                    <p onclick="cancel()" class="btn btn-sm btn-danger">Reset</p>
                    <a href="{{ route('reports.list', ['page' => $page]) }}" class="btn btn-sm btn-warning mb-3">Back</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        // create action
        function update() {
            if (confirm("Are you wants to Update document!")) {
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
@endsection
