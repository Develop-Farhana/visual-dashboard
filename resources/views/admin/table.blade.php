@extends('admin.main')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <form method="GET" action="{{ route('table') }}">
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
                <input type="text" name="topics[]" id="topics" class="form-control">
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
                <input type="text" name="pest" id="pest" class="form-control">
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
            </div>
        </div>
    </div>
</form>


    <table id="dataTable" class="table table-bordered mt-4">
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
                <td>{{ $item->pest }}</td>
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
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "paging": true, // Enable paging
            "ordering": true, // Enable sorting
            "searching": true, // Enable search box
            // Add your additional configuration options here
        });
    });
</script>


@endsection