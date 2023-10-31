@extends('layouts.admin')

@section('title', 'Edit Quarter')

@section('content')
    <div class="container">
        <h5 class="col-lg-12 mb-3 text-center">Edit Quarter</h5>
        <form class="col-lg-12 row"
            action="{{ route('financials.updateQuarter', ['year' => $financial->year, 'quarter' => $financial->quarter, 'id' => $financial->id]) }}"
            method="post" enctype="multipart/form-data" autocomplete="off">

            @csrf
            @method('PUT')
            <div class="row">
                <div class=" mb-3 col-lg-6 d-flex">
                    <label for="title" class="col-lg-4 col-form-label">Title</label>
                    <div class="col-lg-8">
                        <input type="text" name="title" id="title" value="{{ $financial->title }}"
                            class="form-control" autocomplete="off">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6 d-flex">
                    <label for="filepath" class="col-lg-2 col-form-label">File</label>
                    <div class="col-lg-8">
                        <input type="file" name="filepath" id="filepath" class="form-control">
                        <img src="{{ asset('storage/' . $financial->filepath) }}" alt="">
                        @error('filepath')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            {{-- Add button --}}
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
            if (confirm("Are you wants to Update financial document!")) {
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
