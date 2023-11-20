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
        <h1>Log</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->


    <div class="container">
        <table class="table table-striped table-bordered" id="myTable">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Page</th>
                    <th scope="col">Role</th>
                    <th scope="col">Name</th>
                    <th scope="col">Previous Data</th>
                    <th scope="col">Updated Data</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userLogs as $key => $userLog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $userLog->page }}</td>
                        <td>{{ $userLog->user->role }}</td>
                        <td>{{ $userLog->user->name }}</td>
                        <td>
                            {{-- Decode JSON string and access properties --}}
                            @php
                                $prevData = json_decode($userLog->prev_data, true);
                            @endphp

                            {{-- Check if $prevData is an array --}}
                            @if (is_array($prevData))
                                @foreach ($prevData as $key => $value)
                                    {{ $key }} : {{ $value }} <br>
                                @endforeach
                            @else
                                {{-- Handle the case where $prevData is not an array --}}
                                {{ $prevData }}
                            @endif
                        </td>

                        <td>
                            {{-- Decode JSON string and access properties --}}
                            @php
                                $newData = json_decode($userLog->new_data, true);
                            @endphp

                            {{-- Check if $prevData is an array --}}
                            @if (is_array($newData))
                                @foreach ($newData as $key => $value)
                                    {{ $key }} : {{ $value }} <br>
                                @endforeach
                            @else
                                {{-- Handle the case where $prevData is not an array --}}
                                {{ $newData }}
                            @endif
                        </td>
                        <td>{{ $userLog->created_at->setTimezone('Asia/Kolkata')->format('Y-m-d h:i:s A') }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $userLogs->links() }}
    </div>
@endsection
