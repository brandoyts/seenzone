@extends('layouts.admin.index')
@section('header-title', 'Add Walk-in')
@section('admin_content')
<div class="container">
    <form action="{{ route('addWalkIn') }}" method="POST" id="form1" class="form-horizontal">
        @csrf
        <section class="card">
            <div class="card-body"> 
                <div class="form-group row">
                    <label class="col-sm-4 control-label text-sm-right pt-2">First Name: </label>
                    <div class="col-sm-8">
                        <input type="text" name="firstname" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label text-sm-right pt-2">Last Name: </label>
                    <div class="col-sm-8">
                        <input type="text" name="lastname" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label text-sm-right pt-2">Email Address: </label>
                    <div class="col-sm-8">
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label text-sm-right pt-2">Contact Number: </label>
                    <div class="col-sm-8">
                        <input type="text" name="contact_number" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label text-sm-right pt-2">Plate Number: </label>
                    <div class="col-sm-8">
                        <input type="text" name="plate_number" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label text-sm-right pt-2">Service: </label>
                    <div class="col-sm-8">
                        <select name="service_option" id="service_option">
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->service }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 control-label text-sm-right pt-2">Schedule: </label>
                    <div class="col-sm-8">
                        <input type="datetime-local" name="scheduled_at" class="form-control">
                    </div>
                </div>
            </div>
            <footer class="card-footer text-right">
                <button class="btn btn-primary">Submit </button>
                <button type="reset" class="btn btn-default">Reset</button>
            </footer>
        </section>
    </form>
</div>
@endsection