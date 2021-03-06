@extends('layouts.admin.index')
@section('header-title', 'Reports')
@section('admin_content')
<section class="cards d-flex justify-content-around m-auto flex-wrap w-75">
    <div >
        <div >
            <section class="card mb-4">
                <div class="card-body bg-quaternary">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon">
                                <i class="fas fa-life-ring"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Appointment Count</h4>
                                <div class="info">
                                    <strong class="amount">{{ count($responseData['servedTasks']) }}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div >
        <div>
            <section class="card mb-4">
                <div class="card-body bg-primary">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon">
                                <i class="fas fa-life-ring"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Sales</h4>
                                <div class="info">
                                    <strong class="amount">{{ $responseData['sales'] }}</strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@include('includes.admin_filter')
<section class="card">
    <header class="card-header">
        <h2 class="card-title">Served Appointment Data</h2>
    </header>
    <div class="card-body">
        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Plate Number</th>
                    <th>Service</th>
                    <th>Cost</th>
                    <th>Scheduled At</th>
                    <th>Finished At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($responseData['servedTasks'] as $key => $value)
                <tr >
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->firstname . ' ' . $value->lastname }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->contact_number }}</td>
                    <td>{{ $value->plate_number }}</td>
                    <td>{{ $value->service }}</td>
                    <td>{{ $value->cost }}</td>
                    <td>{{ $value->scheduled_at }}</td>
                    <td>{{ $value->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>




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




<!-- Vendor -->
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
<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
<script src="vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
<script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
<script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>


<!--(remove-empty-lines-end)-->

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>

<!-- Examples -->
<script src="js/examples/examples.datatables.default.js"></script>
<script src="js/examples/examples.datatables.row.with.details.js"></script>
<script src="js/examples/examples.datatables.tabletools.js"></script>
@endsection


