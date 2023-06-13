<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Admin Panel - Pengaturan Umum</title>

    <style>
        .toggle {
            position: relative;
            width: 40px;
            height: 20px;
            border: 1px solid gray;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: .3s;
        }

        .circle {
            position: absolute;
            left: 0;
            width: 15px;
            height: 15px;
            border-radius: 20px;
            background-color: gray;
            transition: .3s;
           
        }

        .active {
            border-color:  rgb(39, 39, 131);
        }

        .active .circle {
            left: 100%;
            transform: translateX(-100%);
            transition: .3s;
            background-color:white;
        }
        .toggle.active{
            background-color: rgb(39, 39, 131);
            border: 1px solid gray;
        }
    </style>
    @include('admin/inc/links')
</head>
<body class="bg-light">

    @include('admin/inc/header')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">PENGATURAN UMUM</h3>

                @if (session()->has('succes'))
                    <div class="alert alert-success" role="alert">
                        {{ session('succes') }}
                    </div>
                @endif

                <!-- General Settings Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Pengaturan</h5>
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#general-settings">
                                <i class="bi bi-pencil-square"></i> Edit 
                                {{-- <a href="/editInformasi/1/edit" > --}}
                            </button>
                        </div>
                        @foreach($info as $a)
                        {{-- <h5 class="card-title">Card title</h5> --}}
                        <h6 class="card-subtitle mb-2 fw-bold">{{$a->site_title}}</h6>
                        <p class="card-text">{{$a->site_about}}</p>
                        {{-- <h6 class="card-subtitle mb-2 fw-bold">Tentang Kami</h6> --}}
                        <p class="card-text">{{$a->deskripsi}}</p>
                        @endforeach
                    </div>
                </div>

                <!-- General Settings Modal --> 
                <div class="modal fade" id="general-settings" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <form action="/updateInformasi/1" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pengaturan</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Site Title</label>
                                <input type="text" name="site_title" class="form-control shadow-none" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tentang Kami</label>
                                <input type="text" class="form-control shadow-none" name="site_about" required>
                                <textarea class="form-control shadow-none" rows="6" name="deskripsi" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit"  class="btn btn-success text-white shadow-none">Kirim</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>

                <!-- General Contact Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Pengaturan Kontak</h5>
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#contact-settings">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <div class="row">
                            @foreach ($kontak as $item)
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Alamat</h6>
                                    <p class="card-text" id="address">{{$item->alamat}}</p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">No Telepon</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span id="pn2">{{$item->telepon}}</span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                                    <p class="card-text" id="email">{{$item->email}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Media Sosial</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-instagram me-1"></i>
                                        <span id="ig">{{$item->media_sosial}}</span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe id="iframe" src="{{$item->iframe}}" class="border p-2 w-100" loading="lazy"></iframe>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- General Contact Modal -->
                <div class="modal fade" id="contact-settings" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <form action="/updateKontak/1" method="post">
                        @csrf
                        @method('put')
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pengaturan Kontak</h5>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid p-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Alamat</label>
                                            <input type="text" name="alamat" class="form-control shadow-none" required>
                                            <input type="text" name="maps" class="form-control shadow-none mt-1" placeholder="link rujukan alamat (maps)" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">No Telepon (Beserta Kode Telepon Negara)</label>
                                            <div class="input-group mb-1">
                                                <span class="input-group-text"> <i class="bi bi-telephone-fill"></i></span>
                                                <input type="text" name="telepon" value="(+62) " class="form-control shadow-none" required>
                                            </div>
                                                <input type="text" name="telepon_rujukan" class="form-control shadow-none mt-1" placeholder="link rujukan telepon" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Email</label>
                                            <div class="input-group mb-1">
                                                <span class="input-group-text"> <i class="bi bi-envelope-fill"></i></span>
                                                <input type="email" name="email" class="form-control shadow-none" required>
                                            </div>
                                                <input type="text" name="email_rujukan" class="form-control shadow-none mt-1" placeholder="link rujukan email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">Media Sosial</label>
                                            <div class="input-group mb-1">
                                                <span class="input-group-text"> <i class="bi bi-instagram me-1"></i></span>
                                                <input type="text" name="media_sosial" class="form-control shadow-none" required>
                                            </div>
                                                <input type="text" name="medsos_rujukan" class="form-control shadow-none" placeholder="link rujukan media sosial" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">iFrame</label>
                                            <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none" required>
                                        </div>
                                    </div>
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

                <!-- General Management Team Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Pengaturan Tim Manajemen</h5>
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#management-settings">
                                <i class="bi bi-plus-square"></i> Tambah
                            </button>
                        </div>
                        <div class="row" id="team-data">
                            @foreach ($team as $tm)
                            <div class="col-md-2 mb-3">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('images/profil/'.$tm->image) }}" class="card-img">
                                    <div class="card-img-overlay text-end">
                                        <button type="button" class="btn btn-danger btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $tm['id']?>"><i class="bi bi-trash"></i> Hapus</button>
                                        <div class="modal fade" id="hapus<?php echo $tm['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p style="color: black">Apakah anda yakin untuk menghapus data {{ $tm->nama }} ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Tidak</button>
                                                        <form action="/team/{{$tm->id}}" method="POST" style="display: inline;">
                                                            @method('delete')
                                                            @csrf
                                                            <i class="bi bi-trash"></i> <input type="submit" value="Yakin" class="btn btn-danger btn-sm shadow-none">
                                                        </form> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text text-center px-3 py-2">{{ $tm->nama}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                 <!-- General Team Management Modal --> 
                <div class="modal fade" id="management-settings" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <form action="/newteam" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pengaturan Tim Manajemen</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control shadow-none" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar</label>
                                <input type="file" name="image" class="form-control shadow-none" accept="image/*" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" name="kirim" class="btn btn-success text-white shadow-none">Kirim</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('admin/inc/script')

    {{-- <script>
        const body =document.querySelector('body'),
        toggle = document.querySelector('.toggle');

        let getStatus = localStorage.getItem("status");
        if(getStatus && getStatus === "tidak tersedia"){
            toggle.classList.add("active");
        }

        toggle.addEventListener("click", () => {
            toggle.classList.toggle("active")

            if(!toggle.classList.contains("active")){
                return localStorage.setItem("status", "tersedia");
            }

            return localStorage.setItem("status", "tidak tersedia");
        })
    </script> --}}
        
</body>
</html>