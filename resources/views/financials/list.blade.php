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
            <a href="{{ url('financials/addYear') }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top"
                title="Add Financial Year"><i class="fas fa-plus"></i></a>
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
                    <th scope="col">Annual Report</th>
                    <th scope="col">Q1</th>
                    <th scope="col">Q2/H1</th>
                    <th scope="col">Q3</th>
                    <th scope="col">Q4/H2</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($financials as $key => $financial)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($financial->filepath && Storage::exists($financial->filepath))
                                <a href="{{ asset('storage/' . $financial->filepath) }}" target="_blank"
                                    data-toggle="tooltip" data-placement="top" title="View File">
                                    {{ $financial->year }}
                                </a>
                            @else
                                <!-- File doesn't exist, so don't generate the link -->
                                {{ $financial->year }}
                            @endif
                            <a href="{{ url('/financials/edit/' . $financial->id) }}" data-toggle="tooltip"
                                data-placement="top" title="Edit File">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </td>
                        <td>
                            @foreach ($financial->getQuarterDocs($financial->year, 'Q1') as $doc)
                                @if ($doc->filepath && Storage::exists($doc->filepath))
                                    <a href="{{ asset('storage/' . $doc->filepath) }}" target="_blank" data-toggle="tooltip"
                                        data-placement="top" title="View File">{{ $doc->title }}</a>
                                @else
                                    <!-- File doesn't exist, so don't generate the link -->
                                    {{ $doc->title }}
                                @endif
                                <a href="{{ route('financials.editQuarter', ['year' => $doc->year, 'quarter' => 'Q1', 'id' => $doc->id]) }}"
                                    data-toggle="tooltip" data-placement="top" title="Edit File"><i
                                        class="fas fa-pencil-alt"></i></a>

                                <a href="{{ route('financials.destroyQuarter', ['year' => $doc->year, 'quarter' => 'Q1', 'id' => $doc->id]) }}"
                                    data-toggle="tooltip" data-placement="top" title="Delete Quarter"
                                    onclick="return confirmDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <br>
                            @endforeach
                            <a href="{{ url('/financials/' . $financial->year . '/Q1/addQuarter') }}" data-toggle="tooltip"
                                data-placement="top" title="Add File"><i class="fas fa-plus"></i></a>
                        </td>
                        <td>
                            @foreach ($financial->getQuarterDocs($financial->year, 'Q2') as $doc)
                                @if ($doc->filepath && Storage::exists($doc->filepath))
                                    <a href="{{ asset('storage/' . $doc->filepath) }}" target="_blank"
                                        data-toggle="tooltip" data-placement="top"
                                        title="View File">{{ $doc->title }}</a>
                                @else
                                    <!-- File doesn't exist, so don't generate the link -->
                                    {{ $doc->title }}
                                @endif
                                <a href="{{ route('financials.editQuarter', ['year' => $doc->year, 'quarter' => 'Q2', 'id' => $doc->id]) }}"
                                    data-toggle="tooltip" data-placement="top" title="Edit File"><i
                                        class="fas fa-pencil-alt"></i></a>

                                <a href="{{ route('financials.destroyQuarter', ['year' => $doc->year, 'quarter' => 'Q2', 'id' => $doc->id]) }}"
                                    data-toggle="tooltip" data-placement="top" title="Delete Quarter"
                                    onclick="return confirmDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <br>
                            @endforeach
                            <a href="{{ url('/financials/' . $financial->year . '/Q2/addQuarter') }}" data-toggle="tooltip"
                                data-placement="top" title="Add File"><i class="fas fa-plus"></i></a>
                        </td>
                        <td>
                            @foreach ($financial->getQuarterDocs($financial->year, 'Q3') as $doc)
                                @if ($doc->filepath && Storage::exists($doc->filepath))
                                    <a href="{{ asset('storage/' . $doc->filepath) }}" target="_blank"
                                        data-toggle="tooltip" data-placement="top"
                                        title="View File">{{ $doc->title }}</a>
                                @else
                                    <!-- File doesn't exist, so don't generate the link -->
                                    {{ $doc->title }}
                                @endif
                                <a href="{{ route('financials.editQuarter', ['year' => $doc->year, 'quarter' => 'Q3', 'id' => $doc->id]) }}"
                                    data-toggle="tooltip" data-placement="top" title="Edit File"><i
                                        class="fas fa-pencil-alt"></i></a>

                                <a href="{{ route('financials.destroyQuarter', ['year' => $doc->year, 'quarter' => 'Q3', 'id' => $doc->id]) }}"
                                    data-toggle="tooltip" data-placement="top" title="Delete Quarter"
                                    onclick="return confirmDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <br>
                            @endforeach
                            <a href="{{ url('/financials/' . $financial->year . '/Q3/addQuarter') }}" data-toggle="tooltip"
                                data-placement="top" title="Add File"><i class="fas fa-plus"></i></a>
                        </td>
                        <td>
                            @foreach ($financial->getQuarterDocs($financial->year, 'Q4') as $doc)
                                @if ($doc->filepath && Storage::exists($doc->filepath))
                                    <a href="{{ asset('storage/' . $doc->filepath) }}" target="_blank"
                                        data-toggle="tooltip" data-placement="top"
                                        title="View File">{{ $doc->title }}</a>
                                @else
                                    <!-- File doesn't exist, so don't generate the link -->
                                    {{ $doc->title }}
                                @endif
                                <a href="{{ route('financials.editQuarter', ['year' => $doc->year, 'quarter' => 'Q4', 'id' => $doc->id]) }}"
                                    data-toggle="tooltip" data-placement="top" title="Edit File"><i
                                        class="fas fa-pencil-alt"></i></a>

                                <a href="{{ route('financials.destroyQuarter', ['year' => $doc->year, 'quarter' => 'Q4', 'id' => $doc->id]) }}"
                                    data-toggle="tooltip" data-placement="top" title="Delete Quarter"
                                    onclick="return confirmDelete()"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <br>
                            @endforeach
                            <a href="{{ url('/financials/' . $financial->year . '/Q4/addQuarter') }}"
                                data-toggle="tooltip" data-placement="top" title="Add File"><i
                                    class="fas fa-plus"></i></a>
                        </td>
                        <td>
                            <a href="{{ url('/financials/delete/' . $financial->id) }}" class="btn btn-primary"
                                onclick="return confirmDelete()" data-toggle="tooltip" data-placement="top"
                                title="Delete Year"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $financials->links() }} --}}
    </div>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this financial document?");
        }

        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
