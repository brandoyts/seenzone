@extends('layouts.admin.index')
@section('admin_content')
<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Service</th>
            <th >Cost</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($services as $service)
        <tr>
            <td>{{ $service['id'] }}</td>
            <td>{{ $service['service'] }}</td>
            <td >{{ $service['cost'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection