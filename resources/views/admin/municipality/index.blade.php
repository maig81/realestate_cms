@extends('layouts.admin')

@section('content')

<div class="container">
    <table id="municipality" class="display" width="100%"></table>

    <div class="fixed-action-btn">
         <a class="btn-floating btn-large waves-effect waves-light btn modal-trigger" href="#newUser">
            <i class="large material-icons">add</i>
         </a>
    </div>
    
</div>

<!-- Create Modal -->
{!! Form::open(['url' => '/admin/municipality/create']) !!}
    <div id="newUser" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>{{ trans("alfa.new_municipality") }}</h4>
            <div class="row">
                <!-- NAME -->
                <div class="input-field col s12 m6">
                    <input placeholder="{{ trans('alfa.name') }}" id="name" name="name" type="text" class="validate" required>
                    <label for="name">{{ trans('alfa.name') }}</label>
                </div>
                <div class="input-field col s12 m6">
                    {!! Form::select('city_id', $cities, null) !!}
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
        var table = $('#municipality').DataTable( {
            ajax: '/admin/municipality/data',
            processing: true,
            serverSide: false,
            "dom": '<"top">frt<"bottom"p><"clear">',
            "columns": [
                { data: "id", title: "Id" },
                { data: "name", title: "{{ trans('alfa.name') }}" },
                { data: "city_name", title: "{{ trans('alfa.city') }}" },
                { data: "id", title: "" },
            ],
            "pageLength":50,
            "columnDefs": [ {
                "targets": -1,
                "defaultContent": "",
                "className": "right-align",
                "render": function ( data, type, full, meta ) {
                    return "<a class='waves-effect waves-light btn btn-edit tooltipped' data-position='top' data-tooltip='{{ trans('alfa.edit') }}'><i class='material-icons'>mode_edit</i> </a> ";
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
                $("div.top").html("<h4>{{ trans('alfa.municipalities') }}</h4>");
            }
        } );


        // EDIT BUTTON
        $('body').on('click', '#municipality .btn-edit', function() {
            var data = table.row( $(this).parents('tr') ).data();
            window.location.href = "/admin/municipality/" + data["id"];
        });
      
    } );

</script>
@endsection 