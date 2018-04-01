@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="row">
        <div class="col s12">
            <h3>{{$city->name}}</h2>
        </div>
    </div>
    
    {!! Form::open(['url' => '/admin/city/update/' . $city->id]) !!}

    <div class="row">
        <!-- NAME -->
        <div class="input-field col s12 m6">
          <input placeholder="{{ trans('alfa.name') }}" id="name" name="name" type="text" class="validate" value="{{ $city->name }}">
          <label for="name">{{ trans('alfa.name') }}</label>
        </div>
       
    <div class="row">
        <div class="input-field col s12">
            <a class="waves-effect waves-light btn red" href="/admin/city">
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

