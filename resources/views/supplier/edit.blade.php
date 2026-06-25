<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>

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
        box-shadow:0 0 25px rgba(0,0,0,.4);
    }

    .form-control,
    .form-control:focus{
        background:#334155;
        border:1px solid #475569;
        color:white;
    }

    .form-control:focus{
        border-color:#8b5cf6;
        box-shadow:0 0 10px rgba(139,92,246,.4);
    }

    .btn-save{
        background:linear-gradient(135deg,#6366f1,#8b5cf6);
        border:none;
        color:white;
        font-weight:600;
        border-radius:10px;
        padding:10px 25px;
    }

    .btn-back{
        background:#475569;
        color:white;
        border-radius:10px;
        padding:10px 25px;
    }

    .btn-back:hover{
        background:#64748b;
        color:white;
    }

    label{
        font-weight:600;
        margin-bottom:8px;
    }

    .title-icon{
        width:60px;
        height:60px;
        border-radius:50%;
        display:flex;
        align-items:center;
        justify-content:center;
        background:linear-gradient(135deg,#f59e0b,#ef4444);
        font-size:24px;
    }
</style>
```

</head>
<body>

<div class="container py-5">

```
<div class="card card-custom">
    <div class="card-body p-5">

        <div class="d-flex align-items-center mb-4">

            <div class="title-icon me-3">
                ✏️
            </div>

            <div>
                <h2 class="fw-bold mb-1">
                    Edit Supplier
                </h2>

                <p class="text-secondary mb-0">
                    Ubah informasi supplier
                </p>
            </div>

        </div>

        <hr>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Supplier</label>

                <input type="text"
                       name="nama_supplier"
                       class="form-control"
                       value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
                       required>
            </div>

            <div class="mb-3">
                <label>Alamat</label>

                <textarea name="alamat"
                          rows="3"
                          class="form-control"
                          required>{{ old('alamat', $supplier->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Telepon</label>

                <input type="text"
                       name="telepon"
                       class="form-control"
                       value="{{ old('telepon', $supplier->telepon) }}"
                       required>
            </div>

            <div class="mb-4">
                <label>Email</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email', $supplier->email) }}">
            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('supplier.index') }}"
                   class="btn btn-back">
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-save">
                    Update Supplier
                </button>

            </div>

        </form>

    </div>
</div>
```

</div>

</body>
</html>
