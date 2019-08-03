
@if(null === request('keyword'))

<div class="alert alert-info mb-5">
    Menampilkan seluruh definisi
</div>

@endif

@if(isset($definisis))

@forelse ($definisis as $definisi)
<h5> {{ $definisi->title }} </h5>
<p>
</p>
<p> {{ str_limit($definisi->content, 200) }} </p>
<a href="{{ route('definisi.show', $definisi) }}"> Detail </a>
<hr/>
@empty
@endforelse
@endif

<div class="d-flex justify-content-center p-4">
<div style="overflow-x: scroll">
    {{ $definisis->appends(['keyword' => request('keyword'), 'mode' => request('mode')])->links() }}
</div>
</div>
