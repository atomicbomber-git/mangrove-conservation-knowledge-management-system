@if(session($session_key))
    <div class="alert alert-{{ $state }} my-3">
        <i class="fa fa-check"></i>
        {{ session($session_key) }}
    </div>
@endif

@if(session("message_text"))
<div class="alert alert-{{ session("message_state") }} my-3">
    {{ session("message_text") }}
</div>
@endif