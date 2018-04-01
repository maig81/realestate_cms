@extends('layouts.admin')

@section('content')

<div class="container">
    <table id="properties" class="display" width="100%"></table>

    <div class="fixed-action-btn">
         <a class="btn-floating btn-large waves-effect waves-light btn modal-trigger" href="#newUser">
            <i class="large material-icons">add</i>
         </a>
    </div>
    
</div>

<!-- Create Modal -->
{!! Form::open(['url' => '/admin/properties/create']) !!}
    <div id="newUser" class="modal">
        <div class="modal-content">
            <h4>{{ trans("alfa.new_property") }}</h4>
            <div class="row">
                <!-- NAME -->
                <div class="input-field col s12 m6">
                    <input placeholder="{{ trans('alfa.name') }}" id="name" name="name" type="text" class="validate" required>
                    <label for="name">{{ trans('alfa.name') }}</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="action" class="btn modal-action waves-effect waves-green">{{ trans("alfa.save") }}</button>
        </div>
    </div>
{!! Form::close() !!}        


<script>

    $(document).ready(function() {
        // Initialize DATATABLES
        var table = $('#users').DataTable( {
            "data": dataSet,
            "dom": '<"top">frt<"bottom"p><"clear">',
            "columns": [
                { data: "id", title: "Id" },
                { data: "name", title: "{{ trans('alfa.name') }}" },
                { data: "phones", title: "{{ trans('alfa.phone') }}" },
                { data: "email", title: "{{ trans('alfa.email') }}" },
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
                $("div.top").html("<h4>{{ trans('alfa.buyers') }}</h4>");
            }
        } );

        

        // EDIT BUTTON
        $('body').on('click', '#users .btn-edit', function() {
            var data = table.row( $(this).parents('tr') ).data();
            window.location.href = "/admin/properties/" + data["id"];
        });
        // RESTORE BUTTON
        $('body').on('click', '#users .btn-restore', function() {
            var data = table.row( $(this).parents('tr') ).data();
            window.location.href = "/admin/properties/restore/" + data["id"];
        });
        // DELETE BUTTON
        $('body').on('click', '#users .btn-delete', function() {
            var data = table.row( $(this).parents('tr') ).data();
            window.location.href = "/admin/properties/delete/" + data["id"];
        });        

    } );

</script>
@endsection 