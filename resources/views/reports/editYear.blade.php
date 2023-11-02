@extends('layouts.admin')

@section('title', 'Edit Year')

@section('content')
    <div class="container">
        <h5 class="col-lg-12 mb-3 text-center">Edit Year</h5>
        <form class="col-lg-12 row" action="{{ route('reports.updateYear', ['page' => $report->page, 'id' => $report->id]) }}"
            method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="row">
                <label for="year" class="col-lg-4 col-form-label">Year:</label>
                <div class="col-lg-8">
                    <input type="text" name="year" id="title" value="{{ $report->year }}" class="form-control"
                        autocomplete="off" placeholder="2022-23">
                    @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="filepath">Document</label>
                    <input type="file" name="filepath" id="filepath" class="form-control">
                    <img src="{{ asset('storage/' . $report->filepath) }}" alt="">
                    @error('filepath')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            {{-- update button --}}
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
