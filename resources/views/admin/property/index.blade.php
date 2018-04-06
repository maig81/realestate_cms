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
        var table = $('#properties').DataTable( {
            ajax: '/admin/properties/data',
            processing: true,
            serverSide: true,
            "dom": '<"top">frt<"bottom"p><"clear">',
            "columns": [
                { data: "id", title: "Id" },
                { data: "location", name:"location.name", title: "{{ trans('alfa.location') }}" },
                { data: "street", name:"street.name", title: "{{ trans('alfa.street') }}" },
                { data: "price", title: "{{ trans('alfa.price') }}", className: "right-align", render: $.fn.dataTable.render.number( ',', '.', 0, '€' ) },
                { data: "size", title: "{{ trans('alfa.size') }}", className: "right-align"},
                { data: "published", title: "{{ trans('alfa.published') }}", className: "center-align"},
                { data: "recomended", title: "{{ trans('alfa.recomended') }}", className: "center-align"},
                { data: "most_views", title: "{{ trans('alfa.most_views') }}", className: "center-align"},
                { data: "created_at", title: "{{ trans('alfa.created_at') }}", className: "center-align", searchable: false},
                { data: "id", title: "" },
            ],
            "order": [[ 8, "desc" ]],
            "pageLength":50,
            "columnDefs": [ {
                "targets": -1,
                "defaultContent": "",
                "className": "right-align",
                "render": function ( data, type, full, meta ) {
                    return "<a class='waves-effect waves-light btn btn-edit tooltipped' data-position='top' data-tooltip='{{ trans('alfa.edit') }}'><i class='material-icons'>mode_edit</i> </a> ";
                }
            }, {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    if (data == 1) {
                        return "<i class='material-icons green-text'>public</i>";    
                    } else {
                        return "<i class='material-icons red-text'>do_not_disturb</i>";    
                    }
                }
            }, {
                "targets": 6,
                "render": function ( data, type, full, meta ) {
                    if (data == 1) {
                        return "<i class='material-icons green-text'>star</i>";    
                    } 
                    return "";
                }
            },
            {
                "targets": 7,
                "render": function ( data, type, full, meta ) {
                    if (data == 1) {
                        return "<i class='material-icons green-text'>done_all</i>";    
                    } 
                    return "";
                }
            }

            ],
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
                $("div.top").html("<h4>{{ trans('alfa.locations') }}</h4>");
            }
        });


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