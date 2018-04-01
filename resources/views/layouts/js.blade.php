<script>
    $(document).ready(function() {

        // TOASTS
        @foreach($errors->all() as $error)

            M.toast({
                html: '{!! $error !!} <i class="material-icons" style="padding-left:20px;">close</i>', 
                classes: 'red', 
                displayLength: 1000000
                });

        @endforeach  

        $(document).on('click', '.toast', function() {
            $(this).fadeOut(function(){
                $(this).remove();
            });
        });        


        // MODALS AND FORMS
        $('.modal').modal();
        $('select').formSelect();

        @foreach (session('flash_notification', collect())->toArray() as $message)

            @foreach($errors->all() as $error)
                M.toast({
                    html: "{!! $message['message'] !!}", 
                    classes: 'message-level-{{ $message['level'] }}',
                    @if ($message['important'])
                        displayLength: 10000000,
                    @endif
                    });
            @endforeach

        @endforeach

        // Dropdown menus
        $(".dropdown-trigger").dropdown();
        //$(".dropdown-trigger-mobile").dropdown();


    });
</script>

{{ session()->forget('flash_notification') }}
