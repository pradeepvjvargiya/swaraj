@extends('layouts.admin')

@section('title', 'List')

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
        <h1>{{ $page }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">List</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="container">
        {{-- Start Add Year  --}}
        <div class="mb-2">
            @isset($page)
                @if ($page == 'financial' || $page == 'shareholding-pattern')
                    <a href="{{ route('reports.addYear', ['page' => $page]) }}" class="btn btn-primary" data-toggle="tooltip"
                        data-placement="top" title="Add {{ ucfirst($page) }}"><i class="fas fa-plus"></i></a>
                @endif
            @endisset
        </div>
        {{-- End Add Year  --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    {{-- Start Table --}}
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
            @foreach ($reports as $key => $report)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- Start Year --}}
                    <td>
                        <div class="row">
                            <div class="col">
                                @if ($report->filepath && Storage::exists($report->filepath))
                                    <a href="{{ Storage::url($report->filepath) }}" target="_blank" data-toggle="tooltip"
                                        data-placement="top" title="View File">
                                        {{ $report->year }}
                                    </a>
                                @else
                                    <!-- File doesn't exist, so don't generate the link -->
                                    {{ $report->year }}
                                @endif
                            </div>
                            <div class="col">
                                <a href="{{ url('/reports/' . $report->page . '/editYear/' . $report->id) }}"
                                    data-toggle="tooltip" data-placement="top" title="Edit File">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                    {{-- End Year --}}

                    {{-- Start Relevent year Quarter Q1 --}}
                    <td>
                        @foreach ($report->getQuarterDocs($page, $report->year, 'Q1') as $doc)
                            <div class="row">
                                <div class="col">
                                    @if ($doc->filepath && Storage::exists($doc->filepath))
                                        <a href="{{ Storage::url($doc->filepath) }}" target="_blank" data-toggle="tooltip"
                                            data-placement="top" title="View File">{{ $doc->title }}</a>
                                    @else
                                        <!-- File doesn't exist, so don't generate the link -->
                                        {{ $doc->title }}
                                    @endif
                                </div>
                                <div class="col my-auto">
                                    <a href="{{ route('reports.editQuarter', ['page' => $page, 'year' => $doc->year, 'quarter' => 'Q1', 'id' => $doc->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Edit File"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('reports.destroyQuarter', ['page' => $page, 'year' => $doc->year, 'quarter' => 'Q1', 'id' => $doc->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Delete Quarter"
                                        onclick="return confirmDelete()"><i class="fa fa-trash" aria-hidden="true"
                                            style="margin-left: 10px;"></i></a>
                                </div>
                            </div>
                        @endforeach
                        <br>
                        <div>
                            <a href="{{ url('/reports/' . $report->page . '/' . $report->year . '/Q1/addQuarter') }}"
                                data-toggle="tooltip" data-placement="top" title="Add File"><i class="fas fa-plus"></i></a>
                        </div>
                    </td>
                    {{-- End Relevent year Quarter Q1 --}}

                    {{-- Start Relevent year Quarter Q2 --}}
                    <td>
                        @foreach ($report->getQuarterDocs($page, $report->year, 'Q2') as $doc)
                            <div class="row">
                                <div class="col">
                                    @if ($doc->filepath && Storage::exists($doc->filepath))
                                        <a href="{{ Storage::url($doc->filepath) }}" target="_blank" data-toggle="tooltip"
                                            data-placement="top" title="View File">{{ $doc->title }}</a>
                                    @else
                                        <!-- File doesn't exist, so don't generate the link -->
                                        {{ $doc->title }}
                                    @endif
                                </div>
                                <div class="col my-auto">
                                    <a href="{{ route('reports.editQuarter', ['page' => $page, 'year' => $doc->year, 'quarter' => 'Q2', 'id' => $doc->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Edit File"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('reports.destroyQuarter', ['page' => $page, 'year' => $doc->year, 'quarter' => 'Q2', 'id' => $doc->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Delete Quarter"
                                        onclick="return confirmDelete()"><i class="fa fa-trash" aria-hidden="true"
                                            style="margin-left: 10px;"></i></a>
                                </div>
                            </div>
                        @endforeach
                        <br>
                        <div>
                            <a href="{{ url('/reports/' . $report->page . '/' . $report->year . '/Q2/addQuarter') }}"
                                data-toggle="tooltip" data-placement="top" title="Add File"><i class="fas fa-plus"></i></a>
                        </div>
                    </td>
                    {{-- End Relevent year Quarter Q2 --}}

                    {{-- Start Relevent year Quarter Q3 --}}
                    <td>
                        @foreach ($report->getQuarterDocs($page, $report->year, 'Q3') as $doc)
                            <div class="row">
                                <div class="col">
                                    @if ($doc->filepath && Storage::exists($doc->filepath))
                                        <a href="{{ Storage::url($doc->filepath) }}" target="_blank" data-toggle="tooltip"
                                            data-placement="top" title="View File">{{ $doc->title }}</a>
                                    @else
                                        <!-- File doesn't exist, so don't generate the link -->
                                        {{ $doc->title }}
                                    @endif
                                </div>
                                <div class="col">
                                    <a href="{{ route('reports.editQuarter', ['page' => $page, 'year' => $doc->year, 'quarter' => 'Q3', 'id' => $doc->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Edit File"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('reports.destroyQuarter', ['page' => $page, 'year' => $doc->year, 'quarter' => 'Q3', 'id' => $doc->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Delete Quarter"
                                        onclick="return confirmDelete()"><i class="fa fa-trash" aria-hidden="true"
                                            style="margin-left: 10px;"></i></a>
                                </div>
                            </div>
                        @endforeach
                        <br>
                        <div>
                            <a href="{{ url('/reports/' . $report->page . '/' . $report->year . '/Q3/addQuarter') }}"
                                data-toggle="tooltip" data-placement="top" title="Add File"><i
                                    class="fas fa-plus"></i></a>
                        </div>
                    </td>
                    {{-- End Relevent year Quarter Q3 --}}

                    {{-- Start Relevent year Quarter Q4 --}}
                    <td>
                        @foreach ($report->getQuarterDocs($page, $report->year, 'Q4') as $doc)
                            <div class="row">
                                <div class="col">
                                    @if ($doc->filepath && Storage::exists($doc->filepath))
                                        <a href="{{ Storage::url($doc->filepath) }}" target="_blank"
                                            data-toggle="tooltip" data-placement="top"
                                            title="View File">{{ $doc->title }}</a>
                                    @else
                                        <!-- File doesn't exist, so don't generate the link -->
                                        {{ $doc->title }}
                                    @endif
                                </div>
                                <div class="col my-auto">
                                    <a href="{{ route('reports.editQuarter', ['page' => $page, 'year' => $doc->year, 'quarter' => 'Q4', 'id' => $doc->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Edit File"><i
                                            class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('reports.destroyQuarter', ['page' => $page, 'year' => $doc->year, 'quarter' => 'Q4', 'id' => $doc->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Delete Quarter"
                                        onclick="return confirmDelete()"><i class="fa fa-trash" aria-hidden="true"
                                            style="margin-left: 10px;"></i></a>
                                </div>
                            </div>
                        @endforeach
                        <br>
                        <div>
                            <a href="{{ url('/reports/' . $report->page . '/' . $report->year . '/Q4/addQuarter') }}"
                                data-toggle="tooltip" data-placement="top" title="Add File"><i
                                    class="fas fa-plus"></i></a>
                        </div>
                    </td>
                    {{-- End Relevent year Quarter Q4 --}}
                    <td>
                        <a href="{{ url('/reports/' . $report->page . '/deleteYear/' . $report->id) }}"
                            class="btn btn-sm btn-primary" onclick="return confirmDelete()" data-toggle="tooltip"
                            data-placement="top" title="Delete Year"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- End Table --}}
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this document?");
        }
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
