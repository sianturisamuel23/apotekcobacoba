<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat - Sistem Apotek</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        background: linear-gradient(135deg,#0f172a,#020617);
        color:white;
        min-height:100vh;
    }

    .header-card{
        background: rgba(30,41,59,.95);
        backdrop-filter: blur(10px);
        border-radius:20px;
        padding:30px;
        margin-bottom:25px;
        box-shadow:0 10px 25px rgba(0,0,0,.3);
    }

    .table-card{
        background:#1e293b;
        border-radius:20px;
        padding:25px;
        box-shadow:0 10px 25px rgba(0,0,0,.3);
    }

    .btn-add{
        background:linear-gradient(135deg,#2563eb,#7c3aed);
        color:white;
        border:none;
        padding:12px 20px;
        border-radius:12px;
        font-weight:600;
    }

    .btn-add:hover{
        color:white;
        transform:translateY(-2px);
    }

    .table{
        color:white;
    }

    .table thead th{
        border:none;
        background:#334155;
        padding:15px;
    }

    .table tbody td{
        padding:15px;
        vertical-align:middle;
    }

    .table tbody tr:hover{
        background:rgba(255,255,255,.04);
    }

    .stock-badge{
        background:#22c55e;
        padding:8px 15px;
        border-radius:20px;
        font-weight:bold;
    }

    .btn-edit{
        background:#facc15;
        color:black;
        border:none;
        border-radius:10px;
        padding:8px 15px;
        font-weight:600;
    }

    .btn-delete{
        background:#ef4444;
        color:white;
        border:none;
        border-radius:10px;
        padding:8px 15px;
        font-weight:600;
    }

    .btn-edit:hover,
    .btn-delete:hover{
        opacity:.9;
    }

    .alert-success{
        border-radius:15px;
    }

    .empty-data{
        padding:40px;
        text-align:center;
        color:#94a3b8;
    }
</style>
```

</head>
<body>

<div class="container py-5">

```
<div class="header-card d-flex justify-content-between align-items-center">

    <div>
        <h1 class="fw-bold mb-2">
            💊 Data Obat
        </h1>

        <p class="text-secondary mb-0">
            Kelola seluruh data obat apotek
        </p>
    </div>

    <a href="{{ route('obat.create') }}" class="btn btn-add">
        + Tambah Obat
    </a>

</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-card">

    <div class="table-responsive">

        <table class="table align-middle">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>

            <tbody>

            @forelse($obat as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <strong>{{ $item->kode_obat }}</strong>
                    </td>

                    <td>{{ $item->nama_obat }}</td>

                    <td>
                        <span class="stock-badge">
                            {{ $item->stok }}
                        </span>
                    </td>

                    <td>
                        Rp {{ number_format($item->harga_jual,0,',','.') }}
                    </td>

                    <td>

                        <a href="{{ route('obat.edit',$item->id) }}"
                           class="btn btn-edit btn-sm">
                            ✏ Edit
                        </a>

                        <form action="{{ route('obat.destroy',$item->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-delete btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                🗑 Hapus
                            </button>

                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="empty-data">
                        Belum ada data obat
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
```

</div>

</body>
</html>
