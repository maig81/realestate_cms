@extends('layouts.admin')

@section('content')

<div class="container">
    <table id="users" class="display" width="100%"></table>

    <div class="fixed-action-btn">
         <a class="btn-floating btn-large waves-effect waves-light btn modal-trigger" href="#newUser">
            <i class="large material-icons">add</i>
         </a>
    </div>
    
</div>

<!-- Create Modal -->
{!! Form::open(['url' => '/admin/admins/create']) !!}
    <div id="newUser" class="modal">
        <div class="modal-content">
            <h4>{{ trans("alfa.new_user") }}</h4>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input placeholder="{{ trans('alfa.name') }}" id="name" name="name" type="text" class="validate" required>
                    <label for="name">{{ trans('alfa.name') }}</label>
                </div>
                <div class="input-field col s12 m6">
                    <input placeholder="{{ trans('alfa.lastname') }}" id="lastname" name="lastname" type="text" class="validate">
                    <label for="lastname">{{ trans('alfa.lastname') }}</label>
                </div>
                <div class="input-field col s12 m6">
                    <input placeholder="{{ trans('alfa.email') }}" id="email" name="email" type="email" class="validate" required>
                    <label for="email">{{ trans('alfa.email') }}</label>
                </div>
                <div class="input-field col s12 m6">
                    <input placeholder="{{ trans('alfa.password') }}" id="password" name="password" type="password" class="validate" required>
                    <label for="email">{{ trans('alfa.password') }}</label>
                </div>
                <div class="input-field col s12 m6">
                    <select name="role" id="role">
                        @foreach ($roles as $role)
                            <option value="{!! $role->id !!}">{!! trans('alfa.' . $role->slug) !!}</option>
                        @endforeach
                    </select>
                    <label for="role">{{ trans('alfa.access_level') }}</label>
                </div>         
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" name="action" class="btn modal-action waves-effect waves-green">{{ trans("alfa.save") }}</button>
        </div>
    </div>
{!! Form::close() !!}        


<script>

    var dataSet = [
        @foreach ($users as $user) { 
            'id': '{{ $user->id }}', 
            'name': '{{ $user->name }} {{ $user->lastname }}', 
            'lastname': '{{ $user->lastname }}', 
            'slug': '{{ trans("alfa." . $user->roles[0]->slug) }}', 
            'deleted_at': '{{ $user->deleted_at }}' 
         } ,
        @endforeach
    ];

    $(document).ready(function() {
        // Initialize DATATABLES
        var table = $('#users').DataTable( {
            "data": dataSet,
            "dom": '<"top">frt<"bottom"p><"clear">',
            "columns": [
                { data: "id", title: "Id" },
                { data: "name", title: "{{ trans('alfa.name') }}" },
                { data: "lastname", title: "{{ trans('alfa.lastname') }}" },
                { data: "slug", title: "{{ trans('alfa.access_level') }}" },
                { data: "deleted_at", "visible": false },
                { data: "", title: "" }
            ],
            "pageLength":50,
            "columnDefs": [ {
                "targets": -1,
                "defaultContent": "",
                "className": "right-align",
                "render": function ( data, type, full, meta ) {
                    if (full.deleted_at) {
                        return "<a class='waves-effect waves-light btn tooltipped orange btn-restore' data-position='top' data-tooltip='{{ trans('alfa.restore') }}'><i class='material-icons'>undo</i> </a> ";    
                    } else {
                        return "<a class='waves-effect waves-light btn btn-edit tooltipped' data-position='top' data-tooltip='{{ trans('alfa.edit') }}'><i class='material-icons'>mode_edit</i> </a> <a class='waves-effect waves-light btn tooltipped red btn-delete' data-position='top' data-tooltip='{{ trans('alfa.delete') }}'><i class='material-icons'>close</i> </a> ";
                    }
                 }

            }, {
                "targets": 0,
                "visible": false
            }],
            "language": { 
                url: "../../js/datatables_translations/{{ App::getLocale() }}.json",
            },
            rowCallback: function(row, data, index) {
                if (data.deleted_at) {
                    $(row).addClass("red lighten-4");
                }
            },
            initComplete: function() {
                $('.tooltipped').tooltip();
                $("div.top").html("<h4>{{ trans('alfa.administrators') }}</h4>");
            }
        } );


        // EDIT BUTTON
        $('body').on('click', '#users .btn-edit', function() {
            var data = table.row( $(this).parents('tr') ).data();
            window.location.href = "/admin/admins/" + data["id"];
        });
        // RESTORE BUTTON
        $('body').on('click', '#users .btn-restore', function() {
            var data = table.row( $(this).parents('tr') ).data();
            window.location.href = "/admin/users/restore/" + data["id"];
        });
        // DELETE BUTTON
        $('body').on('click', '#users .btn-delete', function() {
            var data = table.row( $(this).parents('tr') ).data();
            window.location.href = "/admin/users/delete/" + data["id"];
        });        

    } );

</script>
@endsection 