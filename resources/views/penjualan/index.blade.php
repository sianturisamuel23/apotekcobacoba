<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penjualan</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        background:#0b1120;
        color:white;
        min-height:100vh;
    }

    .header-card{
        background:#1e293b;
        border-radius:20px;
        padding:25px;
        margin-bottom:25px;
    }

    .table-card{
        background:#1e293b;
        border-radius:20px;
        padding:20px;
        box-shadow:0 10px 30px rgba(0,0,0,.3);
    }

    .btn-add{
        background:linear-gradient(135deg,#6366f1,#8b5cf6);
        border:none;
        color:white;
    }

    .btn-edit{
        background:#facc15;
        color:black;
        border:none;
    }

    .btn-delete{
        background:#ef4444;
        color:white;
        border:none;
    }

    .table-dark{
        --bs-table-bg: transparent;
    }

    .table tbody tr:hover{
        background:rgba(255,255,255,0.05);
    }
</style>
```

</head>
<body>

<div class="container py-5">

```
<div class="header-card d-flex justify-content-between align-items-center">

    <div>
        <h1 class="fw-bold">🛒 Data Penjualan</h1>
        <p class="text-secondary mb-0">
            Kelola transaksi penjualan obat
        </p>
    </div>

    <a href="{{ route('penjualan.create') }}"
       class="btn btn-add">
        + Tambah Penjualan
    </a>

</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-card">

    <table class="table table-dark align-middle">

        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($penjualan as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->kode_transaksi }}</td>

                <td>{{ $item->tanggal }}</td>

                <td>
                    Rp {{ number_format($item->total_harga,0,',','.') }}
                </td>

                <td>

                    <a href="{{ route('penjualan.edit',$item->id) }}"
                       class="btn btn-edit btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('penjualan.destroy',$item->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-delete btn-sm"
                                onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="5" class="text-center text-secondary py-4">
                    Belum ada data penjualan
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>
```

</div>

</body>
</html>
