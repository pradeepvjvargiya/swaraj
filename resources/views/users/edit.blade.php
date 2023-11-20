@extends('layouts.admin')

@section('title', 'Edit User Details')

@section('content')
    <div class="container">
        <!-- Start Page Title -->
        <div class="pagetitle">
            <h1>User Manager</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">List</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
        @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <form class="col-lg-6 row" action="{{ route('users.update', $user->id) }}" method="post"
            enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')
            {{-- Name --}}
            @if (auth()->user()->role == 'super-admin')
                <div class="row mb-3">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control"
                            autocomplete="off">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endif
            {{-- Email --}}
            @if (auth()->user()->role == 'super-admin')
                <div class="row mb-3">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control"
                            autocomplete="off">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endif
            {{-- Password --}}
            <div class="row mb-3">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Confirm Password --}}
            <div class="row mb-3">
                <label for="password-confirm" class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password_confirmation" id="password-confirm" class="form-control"
                        autocomplete="off">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Role --}}
            @if (auth()->user()->role == 'super-admin')
                <div class="row mb-3">
                    <label for="role" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        <select name="role" id="role">
                            <option value="super-admin" {{ $user->role === 'super-admin' ? 'selected' : '' }}>Super Admin
                            </option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endif
            {{-- Add button --}}
            <div class="row">
                <div class="mt-3 col-lg-6">
                    <input type="submit" hidden id="update_btn" name="">
                    <p onclick="update()" class="btn btn-sm btn-primary">Update</p>
                    <input type="button" hidden id="onCancleClick" name="" value="Reset">
                    <p onclick="cancel()" class="btn btn-sm btn-danger">Reset</p>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-warning mb-3">Back</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        // create action
        function update() {
            if (confirm("Are you wants to update user details!")) {
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
