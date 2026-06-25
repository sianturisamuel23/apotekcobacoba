<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penjualan</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        background:#0f172a;
        color:white;
        min-height:100vh;
    }

    .card-custom{
        background:#1e293b;
        border:none;
        border-radius:20px;
        box-shadow:0 0 20px rgba(0,0,0,.3);
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
    }

    .btn-save{
        background:linear-gradient(135deg,#6366f1,#8b5cf6);
        border:none;
        color:white;
    }

    .btn-back{
        background:#475569;
        color:white;
    }
</style>
```

</head>
<body>

<div class="container py-5">

```
<div class="card card-custom">

    <div class="card-body p-4">

        <h2 class="mb-4">
            ✏ Edit Penjualan
        </h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penjualan.update',$penjualan->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Kode Transaksi</label>

                <input type="text"
                       name="kode_transaksi"
                       class="form-control"
                       value="{{ old('kode_transaksi',$penjualan->kode_transaksi) }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>

                <input type="date"
                       name="tanggal"
                       class="form-control"
                       value="{{ old('tanggal',$penjualan->tanggal) }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Total Harga</label>

                <input type="number"
                       name="total_harga"
                       class="form-control"
                       value="{{ old('total_harga',$penjualan->total_harga) }}"
                       required>
            </div>

            <a href="{{ route('penjualan.index') }}"
               class="btn btn-back">
                Kembali
            </a>

            <button type="submit"
                    class="btn btn-save">
                Update
            </button>

        </form>

    </div>

</div>
```

</div>

</body>
</html>
