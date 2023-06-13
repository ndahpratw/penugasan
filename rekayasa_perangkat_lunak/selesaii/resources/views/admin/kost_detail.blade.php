<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Kamar</title>
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
                <h3 class="mb-4 d-flex"><b>Daftar Kost - an Telang </b>  ~  <p> Detail Kost </p></h3>

                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- General Rooms Section -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <table class="table table-hover border">
                                <thead class="text-center">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Preview</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Pemilik</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Tersedia</th>
                                        <th scope="col">Penghuni</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" id="room-data">
                                    <tr>
                                        <td>{{ $kost->id }}</td>
                                        <td>
                                            <img src="{{ asset('images/photo/'.$kost->image) }}" class="card-img" style="width:250px">
                                        </td>
                                        <td>{{ $kost->nama }}</td>
                                        <td>{{ $kost->pemilik['username'] }}</td>
                                        <td>Rp {{ $kost->harga }}</td>
                                        <td>{{ $kost->tersedia }} Tersedia</td>
                                        <td> {{ $kost->penghuni }}</td>
                                        <td> {{ $kost->status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4> Fasilitas</h4>

                <div class="card border-0 shadow-sm" >
                    <div class="d-flex justify-content-between">
                        <div class="card-body col-lg-3" style="border: 1px solid">
                            <p>
                                Fasilitas yang disediakan :
                            </p>
                            <div class="table-responsive-lg">
                                <table class="table table-hover border">
                                    <thead class="text-center">
                                        <tr class="bg-dark text-light">
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" id="room-data">
                                        @foreach ($fasilitas as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $item['id']?>"><i class="bi bi-trash"></i></button>
                                                    <div class="modal fade" id="hapus<?php echo $item['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <p style="color: black">Apakah anda yakin untuk menghapus data fasilitas {{ $item->nama }}?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Tidak</button>
                                                                    <form action="/fasilitas/{{ $item->id }}" method="post" style="display: inline;">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <input type="submit" value="Hapus" class="btn btn-danger btn-sm shadow-none">
                                                                    </form> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body col-lg-3" style="border: 1px solid">
                            <form action="/fasilitasbaru" method="post">
                                @csrf
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Fasilitas</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label  @error('nama') is-invalid @enderror">Detail Fasilitas</label>
                                        <input type="text" name="nama" class="form-control shadow-none" value="{{ old('nama') }}">
                                        @error('nama') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="kost_id" class="form-control shadow-none" value="{{ $kost->id }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success text-white shadow-none">Kirim</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h4> Detail ruangan : </h4>

                <div class="card border-0 shadow-sm" >
                    <div class="d-flex justify-content-between">
                        <div class="card-body col-lg-3" style="border: 1px solid">
                            <form action="/photobaru" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Gambar</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label  @error('image') is-invalid @enderror">Detail Gambar</label>
                                        <input type="file" name="image" class="form-control shadow-none" value="{{ old('image') }}">
                                        @error('image') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="kost_id" class="form-control shadow-none" value="{{ $kost->id }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success text-white shadow-none">Kirim</button>
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body col-lg-5" style="border: 1px solid">
                            <p>
                                Detail ruangan :
                            </p>
                            @foreach ($photo as $item)
                            <div class="mb-3" >
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('images/photo/'.$item->image) }}" class="card-img">
                                    <div class="card-img-overlay text-end">
                                        <button type="button"  class="btn btn-danger btn-sm shadow-none"  data-bs-toggle="modal" data-bs-target="#hapus<?php echo $item['id']?>"><i class="bi bi-trash"></i> Hapus </button>
                                        <div class="modal fade" id="hapus<?php echo $item['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p style="color: black">Apakah anda yakin untuk menghapus gambar tersebut?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Tidak</button>
                                                        <form action="/photo/{{$item->id}}" method="POST" style="display: inline;">
                                                            @method('delete')
                                                            @csrf
                                                            <input type="submit" value="Hapus" class="btn btn-danger btn-sm shadow-none">
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
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @include('admin/inc/script')
</body>
</html>