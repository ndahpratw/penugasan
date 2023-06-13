<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <title>Admin Panel - Tambah Kost</title>
    <style>
        a i{
            color: black
        }
    </style>
    @include('admin/inc/links')
</head>
<body class="bg-light">

    @include('admin/inc/header')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4"> Tambah Info Kost an </h3>

                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                 <!-- General Facilites Section -->
                 <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <form action="/kost/{{ $kost->id }}" id="rooms-setting" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Data</h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Kost an</label>
                                        <input type="text" name="nama" class="form-control shadow-none" value="{{ $kost->nama }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Pemilik</label>
                                        <select class="form-select" name="pemilik_id" id="pemilik_id" required>
                                            <option selected disabled>Pemilik</option>
                                                @foreach ($pemilik as $pk)
                                                    <option value="{{ $pk->id }}"> {{ $pk->username }} </option>
                                                @endforeach
                                        </select><br>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Jumlah Ruangan</label>
                                        <input type="number" name="tersedia" class="form-control shadow-none" value="{{ $kost->tersedia }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Penghuni (max)</label>
                                        <input type="number" min="0" name="penghuni" class="form-control shadow-none" value="{{ $kost->penghuni }}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Harga (hari)</label>
                                        <input type="number" min="0" name="harga" class="form-control shadow-none" value="{{ $kost->harga }}" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">Preview Image</label>
                                        <input type="file" name="image" class="form-control shadow-none" accept="image/*" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">Deskripsi</label>
                                        <textarea name="deskripsi" id="" rows="4" class="form-control shadow-none" required>{{ $kost->deskripsi }}</textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control shadow-none" value={{ $kost->lokasi }} required>
                                        <input type="hidden" name="status" class="form-control shadow-none" value="aktif">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-success text-white shadow-none">Kirim</button>
                            </div>
                            </div>
                        </form>                    
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('admin/inc/script')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#paket").select2({
                placeholder: "Silahkan Pilih"
            });
        });
    </script>
</body>
</html>