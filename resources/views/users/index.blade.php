@extends('layouts.admin')

@section('title', 'User Manager List')

<style>
    .round-image {
        border-radius: 50%;
        margin-right: 10px;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    th,
    td {
        vertical-align: middle;
    }
</style>

@section('content')
    <!-- Start Page Title -->
    <div class="pagetitle">
        <h1>User Manager</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="container mx-end my-1">
        <div class="mb-2">
            @if (auth()->user()->role == 'super-admin')
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top"
                    title="Create New Admin"><i class="fas fa-plus"></i></a>
            @endif
        </div>
    </div>

    <div class="container">
        <table class="table table-striped table-bordered" id="myTable">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Role</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    @if (auth()->user()->role == 'super-admin')
                        <th colspan="2">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        @if (auth()->user()->role == 'super-admin')
                            <td>
                                <a type="button" href="{{ url('/users/edit/' . $user->id) }}"
                                    class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top"
                                    title="Edit File"><i class="fas fa-pencil-alt"></i></a>
                                <a type="button" href="{{ url('/users/delete/' . $user->id) }}"
                                    class="btn btn-primary btn-sm" onclick="return confirmDelete()" data-toggle="tooltip"
                                    data-placement="top" title="Delete Quarter"><i class="fa fa-trash"
                                        aria-hidden="true"></i></a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this document?");
        }
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
