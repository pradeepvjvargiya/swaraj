@extends('layouts.admin')

@section('title', 'Add Year')

@section('content')
    <div class="container">
        <h5 class="col-lg-12 mb-3 text-center">Add Year</h5>
        <form class="col-lg-12 row" action="{{ route('reports.storeYear', $page) }}" method="post" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            <div class="row">
                <label for="year" class="col-lg-4 col-form-label">Year:</label>
                <div class="col-lg-8">
                    <input type="text" name="year" id="year" value="{{ old('year') }}" class="form-control"
                        autocomplete="off" placeholder="2022-23">
                    @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-lg-6 d-flex">
                    <label for="filepath" class="col-lg-2 col-form-label">File</label>
                    <div class="col-lg-8">
                        <input type="file" name="filepath" id="filepath" class="form-control">
                        @error('filepath')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            {{-- Add button --}}
            <div class="row">
                <div class="mt-3 col-lg-6">
                    <input type="submit" hidden id="add_btn" name="">
                    <p onclick="add()" class="btn btn-primary">Add</p>
                    <input type="button" hidden id="onCancleClick" name="" value="Reset">
                    <p onclick="cancel()" class="btn btn-danger">Reset</p>
                </div>
            </div>
        </form>
    </div>
    <script>
        // create action
        function add() {
            if (confirm("Are you wants to add year!")) {
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
