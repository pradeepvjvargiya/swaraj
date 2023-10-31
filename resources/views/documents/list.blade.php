@extends('layouts.admin')

@section('title', 'Document List')

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
    <div class="container">
        <div class="mb-2">
            <a href="{{ url('/documents', ['page' => $page, 'add']) }}" class="btn btn-sm btn-primary" data-toggle="tooltip"
                data-placement="top" title="Add Document"><i class="fas fa-plus"></i></a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped table-bordered" id="myTable">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $key => $document)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $document->title }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $document->filepath) }}" target="_blank" data-toggle="tooltip"
                                data-placement="top" title="View File">{{ $document->title }}</a>
                        </td>
                        <td>
                            <a href="{{ url('/documents/' . $document->page . '/edit/' . $document->id) }}"
                                class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit File"><i
                                class="fas fa-pencil-alt"></i></a>
                        </td>
                        <td>
                            <a href="{{ url('/documents/' . $document->page . '/delete/' . $document->id) }}"
                                class="btn btn-primary" onclick="return confirmDelete()" data-toggle="tooltip" data-placement="top" title="Delete Quarter"><i
                                class="fa fa-trash" aria-hidden="true"></i></a>
                            <input type="submit" hidden id="delete_btn" name="delete">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $documents->links() }}
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
