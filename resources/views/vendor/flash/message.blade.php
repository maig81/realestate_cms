@foreach (session('flash_notification', collect())->toArray() as $message)
    <script>
        M.toast({
            html: "{!! $message['message'] !!}", 
            classes: 'toast-{{ $message['level'] }}',
            @if ($message['important'])
                displayLength: 10000000,
            @endif
        });
    </script>
@endforeach

{{ session()->forget('flash_notification') }}
