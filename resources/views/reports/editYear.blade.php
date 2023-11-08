@extends('layouts.admin')

@section('title', 'Edit Year')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-sm-12">
                <label for="page-category" class="form-label" style="color: black;">Page Category:</label>
                <span id="page-category">{{ $page }}</span>
            </div>
            <div class="col-sm-12">
                <label for="year" class="form-label" style="color: black;">Edit Year:</label>
            </div>
        </div>
        <form class="col-lg-6 row" action="{{ route('reports.updateYear', ['page' => $report->page, 'id' => $report->id]) }}"
            method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="year" class="col-sm-3 col-form-label">Year:</label>
                <div class="col-sm-9">
                    <input type="text" name="year" id="title" value="{{ $report->year }}" class="form-control"
                        autocomplete="off" placeholder="2022-23">
                    @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="filepath" class="col-sm-3 col-form-label">Document</label>
                <div class="col-sm-9">
                    <input type="file" name="filepath" id="filepath" class="form-control">
                    <img src="{{ asset('storage/' . $report->filepath) }}" alt="">
                    <span>Add file only if you want to update old file</span>
                </div>
                @error('filepath')
                    {{ $message }}
                @enderror
            </div>
            {{-- update button --}}
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
            if (confirm("Are you wants to update year!")) {
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
