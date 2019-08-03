<dl>
    <img
        class="img-fluid d-block mx-auto mb-3"
        src="{{ route('bibit.image', $bibit) }}"
        alt="Gambar {{ $bibit->spesies }}">
    <dt> Famili: </dt>
    <dd> {{ $bibit->famili }} </dd>
    <dt> Deskripsi: </dt>
    <dd> {{ $bibit->deskripsi }} </dd>
    <dt> Daun: </dt>
    <dd> {{ $bibit->daun }} </dd>
    <dt> Bunga: </dt>
    <dd> {{ $bibit->bunga }} </dd>
    <dt> Buah: </dt>
    <dd> {{ $bibit->buah }} </dd>
    <dt> Ekologi: </dt>
    <dd> {{ $bibit->ekologi }} </dd>
    <dt> Penyebaran: </dt>
    <dd> {{ $bibit->penyebaran }} </dd>
    <dt> Kelimpahan: </dt>
    <dd> {{ $bibit->kelimpahan }} </dd>
    <dt> Manfaat: </dt>
    <dd> {{ $bibit->manfaat }} </dd>
    <dt> Catatan: </dt>
    <dd> {{ $bibit->catatan }} </dd>
</dl>
