@if(null !== request('keyword'))

<div class="alert alert-info mb-5">
    Menampilkan hasil pencarian ke {{ $researches->firstItem() }}-{{ $researches->lastItem() }}
    dari {{ $researches->total() }} hasil
    untuk kata kunci: <strong> {{ implode(", ", $splitted_keywords) }} </strong>
</div>

@else

<div class="alert alert-info mb-5">
    Menampilkan seluruh hasil penelitian
</div>

@endif

@if(isset($researches))

@forelse ($researches as $research)
    <h5> {{ $research->title }} ({{ $research->year }}) </h5>
    <p>
    @foreach ($research->authors as $author)
        <span class="text-success font-weight-bold">
            {{ $author->name }}{{ !$loop->last ? ', ' : '' }}
        </span>
    @endforeach
    </p>
    <p> {{ str_limit($research->description, 200) }} </p>
    <a href="{{ route('user-research.detail', $research) }}"> Detail </a> | <a href="{{ route('research.document', $research) }}"> Unduh Dokumen </a>
    <hr/>
@empty

@endforelse

@endif

<div class="d-flex justify-content-center p-4">
<div style="overflow-x: scroll">
    {{ $researches->appends(['keyword' => request('keyword'), 'mode' => request('mode')])->links() }}
</div>
</div>
