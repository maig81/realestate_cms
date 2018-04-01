@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col s12">
            <h3>{{$user->name}} {{$user->lastname}}</h2>
        </div>
    </div>

    {!! Form::open(['url' => '/admin/buyers/update/' . $user->id]) !!}

    <div class="row">
        <!-- NAME -->
        <div class="input-field col s12 m6">
          <input placeholder="{{ trans('alfa.name') }}" id="name" name="name" type="text" class="validate" value="{{$user->name}}">
          <label for="name">{{ trans('alfa.name') }}</label>
        </div>
        <!-- LASTNAME -->
        <div class="input-field col s12 m6">
          <input placeholder="{{ trans('alfa.lastname') }}" id="lastname" name="lastname" type="text" class="validate" value="{{$user->lastname}}">
          <label for="lastname">{{ trans('alfa.lastname') }}</label>
        </div>
        <!-- EMAIL -->
        <div class="input-field col s12 m6">
          <input placeholder="{{ trans('alfa.email') }}" id="email" name="email" type="text" class="validate" value="{{$user->email}}">
          <label for="email">{{ trans('alfa.email') }}</label>
        </div>        
        <!-- ADDRESS -->
        <div class="input-field col s12 m6">
            <input placeholder="{{ trans('alfa.address') }}" id="address" name="address" type="text" class="validate" value="{{$user->address}}">
            <label for="address">{{ trans('alfa.address') }}</label>
        </div>
    </div>
    <div class="row">
        <!-- PHONES -->
        <div class="input-field col s4 m4">
            <input placeholder="{{ trans('alfa.phone') }} 1" id="phone1" type="text" name="phone1" value="{{$user->phone1}}">
            <label for="phone1">{{ trans('alfa.phone') }} 1</label>
        </div>
        <div class="input-field col s4 m4">
            <input placeholder="{{ trans('alfa.phone') }} 2" id="phone2" type="text" name="phone2" value="{{$user->phone2}}">
            <label for="phone2">{{ trans('alfa.phone') }} 2</label>
        </div>
        <div class="input-field col s4 m4">
            <input placeholder="{{ trans('alfa.phone') }} 3" id="phone3" type="text" name="phone3" value="{{$user->phone3}}">
            <label for="phone3">{{ trans('alfa.phone') }} 3</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <a class="waves-effect waves-light btn red" href="/admin/buyers">
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

