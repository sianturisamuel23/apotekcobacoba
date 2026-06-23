<h1>Tambah Obat</h1>

<form action="{{ route('obat.store') }}" method="POST">
    @csrf

    <input type="text" name="nama_obat" placeholder="Nama Obat">

    <button type="submit">
        Simpan
    </button>
</form>