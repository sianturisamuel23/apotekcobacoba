<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        background:#0b1120;
        color:white;
        min-height:100vh;
    }

    .header-card{
        background:linear-gradient(135deg,#1e293b,#0f172a);
        border-radius:20px;
        padding:25px;
        margin-bottom:25px;
    }

    .table-card{
        background:#1e293b;
        border-radius:20px;
        padding:20px;
    }

    .btn-add{
        background:linear-gradient(135deg,#6366f1,#8b5cf6);
        color:white;
        border:none;
        border-radius:12px;
        padding:10px 20px;
        font-weight:600;
    }

    .btn-add:hover{
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
</style>
```

</head>
<body>

<div class="container py-5">

```
<div class="header-card d-flex justify-content-between align-items-center">

    <div>
        <h1 class="fw-bold">🏢 Data Supplier</h1>
        <p class="text-secondary mb-0">
            Kelola seluruh supplier apotek
        </p>
    </div>

    <a href="{{ route('supplier.create') }}" class="btn btn-add">
        + Tambah Supplier
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
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($supplier as $item)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_supplier }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->telepon }}</td>
                <td>{{ $item->email }}</td>

                <td>

                    <a href="{{ route('supplier.edit',$item->id) }}"
                       class="btn btn-edit btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('supplier.destroy',$item->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-delete btn-sm"
                                onclick="return confirm('Yakin ingin menghapus supplier ini?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    Belum ada data supplier
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
    