<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        background: linear-gradient(135deg,#0f172a,#020617);
        min-height:100vh;
        color:white;
    }

    .card-custom{
        background:#1e293b;
        border:none;
        border-radius:20px;
        box-shadow:0 10px 30px rgba(0,0,0,.3);
    }

    .header-custom{
        background:linear-gradient(135deg,#2563eb,#7c3aed);
        border-radius:20px 20px 0 0;
        padding:25px;
    }

    .form-control{
        background:#334155;
        border:1px solid #475569;
        color:white;
    }

    .form-control:focus{
        background:#334155;
        color:white;
        border-color:#8b5cf6;
        box-shadow:0 0 10px rgba(139,92,246,.4);
    }

    .btn-save{
        background:linear-gradient(135deg,#2563eb,#7c3aed);
        border:none;
        color:white;
        font-weight:600;
        padding:10px 20px;
        border-radius:10px;
    }

    .btn-back{
        background:#475569;
        color:white;
        border-radius:10px;
        padding:10px 20px;
        text-decoration:none;
    }

    .btn-back:hover{
        background:#64748b;
        color:white;
    }
</style>
```

</head>
<body>

<div class="container py-5">

```
<div class="card card-custom">

    <div class="header-custom">
        <h2 class="mb-0">
            ✏ Edit Data Obat
        </h2>
    </div>

    <div class="card-body p-4">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('obat.update', $obat->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kode Obat</label>

                <input
                    type="text"
                    name="kode_obat"
                    class="form-control"
                    value="{{ old('kode_obat', $obat->kode_obat) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Obat</label>

                <input
                    type="text"
                    name="nama_obat"
                    class="form-control"
                    value="{{ old('nama_obat', $obat->nama_obat) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>

                <input
                    type="number"
                    name="stok"
                    class="form-control"
                    value="{{ old('stok', $obat->stok) }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="form-label">Harga Jual</label>

                <input
                    type="number"
                    name="harga_jual"
                    class="form-control"
                    value="{{ old('harga_jual', $obat->harga_jual) }}"
                    required>
            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('obat.index') }}"
                   class="btn-back">
                    Kembali
                </a>

                <button type="submit"
                        class="btn-save">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>
```

</div>

</body>
</html>
