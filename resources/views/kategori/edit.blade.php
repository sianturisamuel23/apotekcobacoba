<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kategori</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
```

</head>
<body style="background:#0f172a;color:white;">

<div class="container py-5">

```
<div class="card bg-dark text-white">

    <div class="card-body">

        <h2>✏️ Edit Kategori</h2>

        <hr>

        <form action="{{ route('kategori.update',$kategori->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Nama Kategori</label>

                <input type="text"
                       name="nama_kategori"
                       value="{{ $kategori->nama_kategori }}"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label>Deskripsi</label>

                <textarea name="deskripsi"
                          rows="4"
                          class="form-control">{{ $kategori->deskripsi }}</textarea>

            </div>

            <a href="{{ route('kategori.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

            <button type="submit"
                    class="btn btn-primary">
                Update
            </button>

        </form>

    </div>

</div>
```

</div>

</body>
</html>
