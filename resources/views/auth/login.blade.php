@extends('layouts.admin')

@section('content')
<div class="container">
    <!-- LOGIN -->
    <div class="row">
        <div class="col s12 offset-m3 m6 " style="margin-top:50px;">
            <h4 class="alfa-blue-text center"></h4>

            <div class="card">
                <div class="card-content">
                <span class="card-title">{!! trans('alfa.login') !!}</span>
            
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    
                    <input id="email" type="email" name="email" class="validate" value="{{ old('email') }}" required autofocus>
                    <label for="email">Email</label>
                    <span class="helper-text" data-error="{!! trans('alfa.wrong') !!}" data-success="{!! trans('alfa.right') !!}"></span>

                    <input id="password" type="password" name="password" class="validate" required>
                    <label for="email">{!! trans('alfa.password') !!}</label>
                    <span class="helper-text" data-error="{!! trans('alfa.wrong') !!}" data-success="{!! trans('alfa.right') !!}"></span>                
                    
                    <br><br>
                    <p>
                    <label>
                        <input type="checkbox"  class="filled-in" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                        <span>{!! trans('alfa.remember_me') !!}</span>
                    </label>  
                    </p>
                    
                    <p class="center">
                    <button type="submit" class="btn btn-primary center">
                        {!! trans('alfa.login') !!}
                    </button>
                    </p>
                    
                    <br>
                    <p class="center">
                        <a class="" href="{{ route('password.request') }}">
                            {!! trans('alfa.forgot_your_password') !!}
                        </a>
                    </p>

                </form>

            </div>            
        </div>
    </div>

</div>
@endsection

