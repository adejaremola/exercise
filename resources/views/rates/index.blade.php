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
                <div class="panel-heading">
                    Rates
                    <a href="{{ route('rate.create') }}" class="pull-right">
                        <span class="label label-primary">Create New</span>
                    </a>
                </div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Multiplier</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rates as $rate)
                            <tr>
                                <td>{{ $rate->name }}</td>
                                <td>{{ $rate->multiplier }}</td>
                                <td>
                                    <a href="{{ route('rate.show', $rate->id) }}">
                                        <span class="label label-primary">Edit</span>
                                    </a>
                                    <a  href="#" 
                                        onclick="
                                                    event.preventDefault();
                                                    document.getElementById('delete-form').submit();
                                                "
                                    >
                                    </a>
                                    <span class="label label-warning">Delete</span>
                                    <form id="delete-form" action="{{ route( 'rate.delete', $rate->id ) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr style="width: 100%;">
                                    <td>There are no rates created yet</td>
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
