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
                <div class="panel-heading text-center">
                    {{ $application->names }}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bio
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="width: 25%">FulL Names</td>
                                <td>{{ $application->names }}</td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td>{{ $application->email }}</td>
                            </tr>
                            <tr>
                                <td>Passport Number</td>
                                <td>{{ $application->passport_no }}</td>
                            </tr>
                            <tr>
                                <td>Request Type</td>
                                <td>{{ $application->request_type }}</td>
                            </tr>
                            <tr>
                                <td>Amount</td>
                                <td>{{ $application->amount }}</td>
                            </tr>
                            <tr>
                                <td>Currency</td>
                                <td id="currency">{{ $application->currency }}</td>
                            </tr>
                            <tr>
                                <td>Travel Date</td>
                                <td>{{ $application->travel_date }}</td>
                            </tr>
                            <tr>
                                <td>Payment</td>
                                <td>{{ $payment }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Uploaded Documents
                </div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Passport</th>
                                <th>Ticket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ asset($application->ticket_upload) }}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                                </td>
                                <td>
                                    <img src="{{ asset($application->passport_upload) }}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="btn-group">
                        <a type="button" href="{{ route('application.mail', [$application->id, $payment]) }}" class="btn btn-primary">Email Applicant</a>
                        <a type="button" class="btn btn-warning">Back</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

