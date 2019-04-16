@switch($status)
    @case(App\Article::STATUS_UNAPPROVED)
        <span class="badge badge-pill badge-warning">
            {{ $article->status }}
        </span>
        @break

    @case(App\Article::STATUS_APPROVED)
        <span class="badge badge-pill badge-success">
            {{ $article->status }}
        </span>
        @break
    
    @case(App\Article::STATUS_REJECTED)
        <span class="badge badge-pill badge-danger">
            {{ $article->status }}
        </span>
        @break
@endswitch