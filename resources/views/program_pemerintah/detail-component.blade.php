@inject('formatter', 'App\Helpers\FormatterInterface')
<dl>
    <dt> Nama </dt>
    <dd> {{ $programPemerintah->nama }} </dd>
    <dt> Dana </dt>
    <dd> Rp. {{ $formatter->currency($programPemerintah->dana) }} </dd>
    <dt> Durasi </dt>
    <dd>
        {{ $formatter->localizedDate($programPemerintah->tanggal_mulai) }} -
        {{ $formatter->localizedDate($programPemerintah->tanggal_selesai) }}
    </dd>
    <dt> Penanggung Jawab </dt>
    <dd> {{ $programPemerintah->penanggung_jawab }} </dd>

    <dt> Nama Instansi </dt>
    <dd> {{ $programPemerintah->nama_instansi }} </dd>

    <dt> Nama Instansi Penerima </dt>
    <dd> {{ $programPemerintah->nama_instansi_penerima }} </dd>

    <dt> Penanggung Jawab Penerima </dt>
    <dd> {{ $programPemerintah->penanggung_jawab_penerima }} </dd>

    <dt> Bentuk </dt>
    <dd> {{ $programPemerintah->bentuk }} </dd>

    <dt> Hasil </dt>
    <dd> {{ $programPemerintah->hasil }} </dd>

    <dt> Persentase Hasil (%) </dt>
    <dd> {{ $programPemerintah->persentase_hasil }} % </dd>
</dl>
