@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <p>
                        Dear {{ $application->names }}, your application for {{ $application->amount }} in {{ $application->currency }} has been processed
                    </p>
                    <br>
                    <p>
                        This will cost you #{{ $payment }}. 
                    </p>
                    <br>
                    <p>
                        Please make payment to the account, whose details are listed below, to get your requested currency.
                    </p>
                    <p>
                        <br>
                        Account Name : Bureau De Change <br>
                        Account Number : 1234567890   
                        <br>
                    </p>
                    <p>
                        Cheers,<br>
                        The Bureau De Change team.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

