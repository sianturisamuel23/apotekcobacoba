<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#0f172a,#1e293b);
            min-height: 100vh;
            color: white;
        }

        .container-custom{
            max-width: 900px;
            margin: auto;
            padding-top: 50px;
        }

        .card-custom{
            background: #1e293b;
            border: none;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0,0,0,.3);
        }

        .card-header-custom{
            background: linear-gradient(135deg,#2563eb,#7c3aed);
            padding: 25px;
        }

        .card-header-custom h2{
            margin: 0;
            font-weight: bold;
        }

        .card-body{
            padding: 35px;
        }

        label{
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control{
            background: #334155;
            border: 1px solid #475569;
            color: white;
            padding: 12px;
            border-radius: 12px;
        }

        .form-control:focus{
            background: #334155;
            color: white;
            border-color: #7c3aed;
            box-shadow: 0 0 10px rgba(124,58,237,.4);
        }

        .input-group-text{
            background: #475569;
            color: white;
            border: none;
        }

        .btn-save{
            background: linear-gradient(135deg,#2563eb,#7c3aed);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-save:hover{
            opacity: .9;
            color: white;
        }

        .btn-back{
            background: #475569;
            color: white;
            padding: 12px 25px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-back:hover{
            background: #64748b;
            color: white;
        }

        .alert{
            border-radius: 15px;
        }

        .icon-title{
            font-size: 50px;
        }
    </style>
</head>
<body>

<div class="container container-custom">

    <div class="card card-custom">

        <div class="card-header-custom text-center">
            <div class="icon-title">💊</div>
            <h2>Tambah Data Obat</h2>
            <p class="mb-0">
                Tambahkan data obat baru ke dalam sistem apotek
            </p>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Terjadi Kesalahan:</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('obat.store') }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-4">
                        <label>Kode Obat</label>

                        <input
                            type="text"
                            name="kode_obat"
                            class="form-control"
                            value="{{ old('kode_obat') }}"
                            placeholder="Contoh: OBT001"
                            required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label>Nama Obat</label>

                        <input
                            type="text"
                            name="nama_obat"
                            class="form-control"
                            value="{{ old('nama_obat') }}"
                            placeholder="Masukkan nama obat"
                            required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label>Stok</label>

                        <input
                            type="number"
                            name="stok"
                            class="form-control"
                            value="{{ old('stok') }}"
                            placeholder="Masukkan stok"
                            required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label>Harga Jual</label>

                        <div class="input-group">

                            <span class="input-group-text">
                                Rp
                            </span>

                            <input
                                type="number"
                                name="harga_jual"
                                class="form-control"
                                value="{{ old('harga_jual') }}"
                                placeholder="Masukkan harga jual"
                                required>

                        </div>
                    </div>

                </div>

                <hr class="text-secondary">

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('obat.index') }}"
                       class="btn-back">
                        ← Kembali
                    </a>

                    <button type="submit"
                            class="btn-save">
                        💾 Simpan Obat
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>