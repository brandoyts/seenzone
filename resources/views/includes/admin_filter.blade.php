
<form method="GET" action="{{ route('reports') }}" class="card" style="margin-bottom: 3%; margin-top: 3%">
    @csrf
    <div class="card-header">
        <h2 class="card-title">Filter</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="date-select">Date</label>
                    <select name="date_range" class="form-control" id="date-select">
                        {{-- <option value="">(All)</option> --}}
                        <option value="current_day" selected>Current Day</option>
                        <option value="current_week" >Current Week</option>
                        <option value="current_month">Current Month</option>
                        <option value="current_year">Current Year</option>
                    </select>
                </div>
                <div class="row" id="custom-date-filter" style="display: block">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="date-from">Date from</label>
                            <input name="date_custom_from" type="datetime-local" class="form-control" id="date-from" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="date-to">Date to</label>
                            <input name="date_custom_to" type="datetime-local" class="form-control" id="date-to" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="row" id="">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="service-select" style="width: 100%">
                                Choose Service:<br>
                                <select id="service-select" name="service_select[]"class="service-select" multiple style="width: 100%">
                                    <option value="">(All)</option>
                                    @foreach ($responseData['services'] as $service)
                                    <option value="{{ $service['id'] }}">{{ $service['service'] }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-right filter-btn" style="margin-top: 15px">Filter</button>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
