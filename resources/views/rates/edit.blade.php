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
                <div class="panel-heading">Edit Rate</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('rate.edit', $rate->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $rate->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('multiplier') ? ' has-error' : '' }}">
                            <label for="multiplier" class="col-md-4 control-label">Multiplier</label>

                            <div class="col-md-6">
                                <input id="multiplier" type="number" class="form-control" name="multiplier" value="{{ $rate->multiplier }}" required>

                                @if ($errors->has('multiplier'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('multiplier') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
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
