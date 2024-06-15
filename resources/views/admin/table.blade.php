@extends('admin.main')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<style>
    /* Custom DataTable styles */
    #dataTable_wrapper {
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #dataTable_wrapper .dataTables_length select {
        width: 60px; /* Adjust width of page length select */
    }

    /* Pagination styles */
    .dataTables_paginate .paginate_button {
        display: inline-block;
        padding: 8px 12px;
        margin-right: 4px;
        border: 1px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
        color: #333;
    }

    .dataTables_paginate .paginate_button:hover {
        background-color: #f0f0f0;
    }

    .dataTables_paginate .paginate_button.current {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .dataTables_paginate .paginate_button.disabled {
        cursor: default;
        color: #aaa;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <form method="post" action="{{ route('dashboard.index') }}">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="end_year">End Year:</label>
                    <input type="text" name="end_year" id="end_year" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="topics">Topics:</label>
                    <input type="text" name="topics" id="topic" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="sector">Sector:</label>
                    <input type="text" name="sector" id="sector" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="region">Region:</label>
                    <input type="text" name="region" id="region" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="pest">PEST:</label>
                    <input type="text" name="pestle" id="pest" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="source">Source:</label>
                    <input type="text" name="source" id="source" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="swot">SWOT:</label>
                    <input type="text" name="swot" id="swot" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" name="country" id="country" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="city" id="city" class="form-control">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <button type="button" class="btn btn-primary ml-2" id="resetFilters">Reset</button>
                </div>
            </div>
        </div>
    </form>

    <table id="dataTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>End Year</th>
                <th>Topic</th>
                <th>Sector</th>
                <th>Region</th>
                <th>PEST</th>
                <th>Source</th>
                <th>SWOT</th>
                <th>Country</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->end_year }}</td>
                <td>{{ $item->topic }}</td>
                <td>{{ $item->sector }}</td>
                <td>{{ $item->region }}</td>
                <td>{{ $item->pestle }}</td>
                <td>{{ $item->source }}</td>
                <td>{{ $item->swot }}</td>
                <td>{{ $item->country }}</td>
                <td>{{ $item->city }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        var dataTable = $('#dataTable').DataTable({
            "paging": true, // Enable paging
            "ordering": true, // Enable sorting
            "searching": false // Disable search box for now
            // Add your additional configuration options here
        });

        // Reset button functionality
        $('#resetFilters').on('click', function() {
            // Reset form inputs
            $('form')[0].reset();

            // Reset DataTable search and ordering
            dataTable.search('').columns().search('').order([0, 'asc']).draw();
        });
    });
</script>
@endsection
