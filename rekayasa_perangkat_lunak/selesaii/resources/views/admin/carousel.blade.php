<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Carousel</title>
    @include('admin/inc/links')
</head>
<body class="bg-light">

    @include('admin/inc/header')

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">CAROUSEL</h3>

                @if (session()->has('succes'))
                    <div class="alert alert-success" role="alert">
                        {{ session('succes') }}
                    </div>
                @endif

                <!-- General Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Gambar</h5>
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#carousel-settings">
                                <i class="bi bi-plus-square"></i> Tambah
                            </button>
                        </div>

                        @if (count($carousel))
                            <div class="row" id="team-data">
                                @foreach ($carousel as $cr)
                                <div class="mb-3" >
                                    <div class="card bg-dark text-white">
                                        <img src="{{ asset('images/pengumuman/'.$cr->image) }}" class="card-img">
                                        <div class="card-img-overlay text-end">
                                            <button type="button" class="btn btn-danger btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $cr['id']?>"><i class="bi bi-trash"></i> Hapus</button>
                                            <div class="modal fade" id="hapus<?php echo $cr['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p style="color: black">Apakah anda yakin untuk menghapus gambar tersebut?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Tidak</button>
                                                            <form action="/carousel/{{$cr->id}}" method="POST" style="display: inline;">
                                                                @method('delete')
                                                                @csrf
                                                                <i class="bi bi-trash"></i> <input type="submit" value="Hapus" class="btn btn-danger btn-sm shadow-none">
                                                            </form> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center"> Belum Ada Gambar </p>
                        @endif

                    </div>
                </div>

                 <!-- General Carousel Modal --> 
                 <div class="modal fade" id="carousel-settings" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <form action="/newcarousel" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Carousel</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Gambar</label>
                                <input type="file" name="image" id="site_title_inp" class="form-control shadow-none" accept="image/*" required>
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
</body>
</html>