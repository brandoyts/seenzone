@extends('layouts.admin.index')
@section('header-title', 'Future Task')
@section('admin_content')
<table class="table table-bordered table-striped mb-0" id="datatable-editable">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Plate Number</th>
            <th>Service</th>
            <th>Schedule</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($futureTask as $key => $value)
        <tr data-item-id="{{ $key }}">
            <td>{{ $value['firstname'].' '.$value['lastname'] }}</td>
            <td>{{ $value['email'] }}</td>
            <td>{{ $value['contact_number'] }}</td>
            <td>{{ $value['plate_number'] }}</td>
            <td>{{ $value['service'] }}</td>
            <td>{{ $value['scheduled_at'] }}</td>
            <td class="actions">
                <a href="{{ route('updateTask', ['appointment_id' => "cancel ".$value['id']]) }}" class="on-default btn btn-danger  text-light"><i class="far fa-trash-alt"></i>Cancel</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="vendor/popper/umd/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.js"></script>
<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="vendor/common/common.js"></script>
<script src="vendor/nanoscroller/nanoscroller.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="vendor/select2/js/select2.js"></script>
<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>


<!--(remove-empty-lines-end)-->

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>

<!-- Examples -->
<script src="js/examples/examples.datatables.editable.js"></script>
@endsection