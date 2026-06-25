<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        background:#0b1120;
        color:white;
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
    }

    .btn-add{
        background:linear-gradient(135deg,#6366f1,#8b5cf6);
        color:white;
        border:none;
    }
</style>
```

</head>
<body>

<div class="container py-5">

```
<div class="header-card d-flex justify-content-between align-items-center">

    <div>
        <h1>📂 Data Kategori</h1>
        <p class="text-secondary mb-0">
            Kelola kategori obat
        </p>
    </div>

    <a href="{{ route('kategori.create') }}"
       class="btn btn-add">
        + Tambah Kategori
    </a>

</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-card">

    <table class="table table-dark">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($kategori as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $item->nama_kategori }}</td>

                <td>{{ $item->deskripsi }}</td>

                <td>

                    <a href="{{ route('kategori.edit',$item->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('kategori.destroy',$item->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="4" class="text-center">
                    Belum ada data kategori
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
