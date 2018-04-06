@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="row">
        <div class="col s12">
            <h3>{{ $location->name }}</h2>
        </div>
    </div>
    
    {!! Form::open(['url' => '/admin/locations/update/' . $location->id]) !!}

    <div class="row">
        <!-- NAME -->
        <div class="input-field col s12 m6">
          <input placeholder="{{ trans('alfa.name') }}" id="name" name="name" type="text" class="validate" value="{{ $location->name }}">
          <label for="name">{{ trans('alfa.name') }}</label>
        </div>
        <!-- MUNICIPALITY -->
        <div class="input-field col s12 m6">
            {!! Form::select('municipality_id', $municipalities, $location->municipality_id ) !!}
        </div>      

    <div class="row">
        <div class="input-field col s12">
            <a class="waves-effect waves-light btn red" href="/admin/locations">
                {{ trans('alfa.back') }}<i class="material-icons right">close</i>
            </a>
            <button class="btn waves-effect waves-light" type="submit" name="action">{{ trans('alfa.save') }}
                <i class="material-icons right">done</i>
            </button>
        </div>
    </div>

    {!! Form::close() !!}


</div>

@endsection 

