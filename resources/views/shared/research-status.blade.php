@switch($research->getOriginal("status"))
    @case(App\Research::STATUS_UNAPPROVED)
        <span class="badge badge-pill badge-warning">
            {{ $research->status }}
        </span>
        @break

    @case(App\Research::STATUS_APPROVED)
        <span class="badge badge-pill badge-success">
            {{ $research->status }}
        </span>
        @break
    
    @case(App\Research::STATUS_REJECTED)
        <span class="badge badge-pill badge-danger">
            {{ $research->status }}
        </span>
        @break
@endswitch