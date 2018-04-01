@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col s12">
            <h3>{{$user->name}} {{$user->lastname}}</h2>
        </div>
    </div>

    {!! Form::open(['url' => '/admin/admins/update/' . $user->id]) !!}

    <div class="row">
        <div class="input-field col s12 m6">
          <input placeholder="{{ trans('alfa.name') }}" id="name" name="name" type="text" class="validate" value="{{$user->name}}">
          <label for="name">{{ trans('alfa.name') }}</label>
        </div>
        <div class="input-field col s12 m6">
          <input placeholder="{{ trans('alfa.lastname') }}" id="lastname" name="lastname" type="text" class="validate" value="{{$user->lastname}}">
          <label for="lastname">{{ trans('alfa.lastname') }}</label>
        </div>
        <div class="input-field col s12 m6">
          <input placeholder="{{ trans('alfa.email') }}" id="email" name="email" type="text" class="validate" value="{{$user->email}}">
          <label for="email">{{ trans('alfa.email') }}</label>
        </div>        
        <div class="input-field col s12 m6">
            <select name="role" id="role">
                <option value="{!! $user->roles[0]->id !!}" selected>{!! trans('alfa.' . $user->roles[0]->slug) !!}</option>
                @foreach ($roles as $role)
                    <option value="{!! $role->id !!}">{!! trans('alfa.' . $role->slug) !!}</option>
                @endforeach
            </select>     
            <label for="role">{{ trans('alfa.access_level') }}</label>       
        </div>           
    </div>

    <div class="row">
        <div class="input-field col s12">
            <a class="waves-effect waves-light btn red" href="/admin/admins">
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

