@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-info">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('application.store') }}"  enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Full Name</label>
                            <div class="col-md-6">
                                <input id="names" type="text" class="form-control" name="names" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('names'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('names') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('passport_no') ? ' has-error' : '' }}">
                            <label for="passport_no" class="col-md-4 control-label">Passport Number</label>
                            <div class="col-md-6">
                                <input id="passport_no" type="text" class="form-control" name="passport_no" value="{{ old('passport_no') }}" required>

                                @if ($errors->has('passport_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('passport_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('request_type') ? ' has-error' : '' }}">
                            <label for="request_type" class="col-md-4 control-label">Request Type</label>

                            <div class="col-md-6">
                                <select id="request_type" class="form-control" name="request_type" required>
                                    <option selected="selected">- Please Select Application Type -</option>
                                    <option value="PTA">PTA</option>
                                    <option value="BTA">BTA</option>
                                </select>

                                @if ($errors->has('request_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('request_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('travel_date') ? ' has-error' : '' }}">
                            <label for="travel_date" class="col-md-4 control-label">Travel Date</label>
                            <div class="col-md-6">
                            <div class="input-group date" data-provide="datepicker">
                                <input id="travel_date" type="text" class="form-control" name="travel_date" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                                @if ($errors->has('travel_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('travel_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="amount" required>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ticket_upload') ? ' has-error' : '' }}">
                            <label for="ticket_upload" class="col-md-4 control-label">Scan and Upload Ticket</label>

                            <div class="col-md-6">
                                <input id="ticket_upload" type="file" class="form-control" name="ticket_upload" required>
                            </div>
                            @if ($errors->has('ticket_upload'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ticket_upload') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('passport_upload') ? ' has-error' : '' }}">
                            <label for="passport_upload" class="col-md-4 control-label">Scan and Upload Passport</label>

                            <div class="col-md-6">
                                <input id="passport_upload" type="file" class="form-control" name="passport_upload" required>
                            </div>
                            @if ($errors->has('passport_upload'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('passport_upload') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <button type="back" class="btn btn-warning">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection





