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
                <div class="panel-heading">Currency Applications</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Passport Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($applications as $application)
                            <tr>
                                <td>{{ $application->names }}</td>
                                <td>{{ $application->email }}</td>
                                <td>{{ $application->passport_no }}</td>
                                <td>
                                    <a href="{{ route('application.show', $application->id) }}">
                                        <span class="label label-primary">View</span>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td>There are no applications yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
