<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Alfa backend</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alfa.css') }}" rel="stylesheet">
</head>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/alfa.js') }}"></script>

<body class="grey-text text-darken-3">
    <nav class="alfa-blue-background darken-1" role="navigation">
        <div class="nav-wrapper container">

            <!-- Admin logo -->
            <a id="logo-container" href="./admin" class="brand-logo">Alfa sistem</a>

            @if(Auth::check())
                @role('admin')
                    <!-- ADMIN DROPDOWN -->
                    <ul id="dropdown-admin" class="dropdown-content">
                        <li><a href="/admin/admins">{!! trans('alfa.administrators') !!}</a></li>
                        <li><a href="/admin/buyers">{!! trans('alfa.buyers') !!}</a></li>
                        <li><a href="/admin/sellers">{!! trans('alfa.sellers') !!}</a></li>
                        <li><a href="/admin/city">{!! trans('alfa.cities') !!}</a></li>
                        <li><a href="/admin/municipality">{!! trans('alfa.municipalities') !!}</a></li>
                    </ul>
                    <!-- ADMIN DROPDOWN MOBILE-->
                    <ul id="dropdown-admin-mobile" class="dropdown-content">
                        <li><a href="/admin/admins">{!! trans('alfa.administrators') !!}</a></li>
                        <li><a href="/admin/buyers">{!! trans('alfa.buyers') !!}</a></li>
                        <li><a href="/admin/sellers">{!! trans('alfa.sellers') !!}</a></li>
                        <li><a href="/admin/municipality">{!! trans('alfa.municipalities') !!}</a></li>
                    </ul>                    
                @endrole

                <!-- USER DROPDOWN -->
                <ul id="dropdown-user" class="dropdown-content">
                    <li><a href="/admin/user/{!! Auth::user()->id !!}">{!! trans('alfa.profile') !!}</a></li>
                    <li><a href="/logout">{!! trans('alfa.logout') !!}</a></li>
                </ul>
                <!-- USER DROPDOWN MOBILE-->
                <ul id="dropdown-user-mobile" class="dropdown-content">
                    <li><a href="/admin/user/{!! Auth::user()->id !!}">{!! trans('alfa.profile') !!}</a></li>
                    <li><a href="/logout">{!! trans('alfa.logout') !!}</a></li>
                </ul>                


                <!-- Menu desktop -->
                <ul class="right hide-on-med-and-down">
                    <li><a href="/admin/properties">{!! trans('alfa.properties') !!}</a></li>
                    @role('admin')
                        <li><a class="dropdown-trigger" href="#!" data-target="dropdown-admin">{!! trans('alfa.administration') !!}<i class="material-icons right">arrow_drop_down</i></a></li>
                    @endrole
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown-user">{!! Auth::user()->name !!}<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>

                <!-- Menu mobile -->
                <ul id="nav-mobile" class="sidenav">
                    <li><a href="#">{!! trans('alfa.properties') !!}</a></li>
                    @role('admin')
                        <li><a class="dropdown-trigger-mobile" href="#!" data-target="dropdown-users-mobile">{!! trans('alfa.users') !!}<i class="material-icons right">arrow_drop_down</i></a></li>
                    @endrole
                    <li><a class="dropdown-trigger-mobile" href="#!" data-target="dropdown-user-mobile">{!! Auth::user()->name !!}<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>

                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            @endif
        </div>
    </nav>

    @yield('content')

    @include('flash::message')

    @include("layouts.js")

</body>
</html>

