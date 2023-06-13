<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel PKPRI - Profile</title>
    @include('admin/inc/links')
    <style>
        img { 
            border: 2px solid; 
            border-radius: 100%; 
            margin-right: auto; 
            margin-left: auto
        }
        .conten {
            position: relative;
            margin-right: auto; 
            margin-left: auto;
            width: 50%;
        }
        .image {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }
        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%)
        }
        .conten:hover .image {
            opacity: 0.3;
        }
        .conten:hover .middle {
            opacity: 1;
        }
    </style>
</head>
<body>
    @include('admin/inc/header')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4">

                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h3 class="mb-4">Profile Page</h3>

                    <div class="div">
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#add-admin">
                            <i class="bi bi-plus-square"></i> Tambah Admin
                        </button>
    
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#add-pemilik">
                            <i class="bi bi-plus-square"></i> Registrasi Pemilik
                        </button>
                    </div>
                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert" style="width: 500px; text-align:center; margin-right:auto; margin-left:auto; ">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- General Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="col-lg-7 mb-4 px-lg-2" style="margin-right:auto; margin-left: auto">
                            <div class="card mb-4 border-2 shadow">
                                <div class="row g-0 p-5 align-items-center">
                                    <div class="conten">

                                        @if ($admin->image === "")
                                            <img src="{{ asset("assets/img/profil/profil.jpg") }}" alt="icon" class="image" style="width:200px">
                                        @else
                                            <img src="{{ asset('images/profil/'.$admin->image) }}" alt="icon" class="image" style="width:200px">   
                                        @endif
                                        
                                        <div class="middle">
                                            <div class="text">
                                                <button type="button" class="btn btn-outline-dark w-10 shadow-none" data-bs-toggle="modal" data-bs-target="#image-profil">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-0 p-5 align-items-center">
                                    <div class="">
                                        <form action="" id="rooms-setting" method="post">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> Username </label>
                                                            <input type="text" name="username" class="form-control shadow-none" value="{{ $admin->username }}" disabled>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> E-mail </label>
                                                            <input type="text" name="email" class="form-control shadow-none" value="{{ $admin->email }}" disabled>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> Telepon </label>
                                                            <input type="text" name="telepon" class="form-control shadow-none" value="{{ $admin->telepon }}" disabled>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> Alamat </label>
                                                            <input type="text" name="alamat" class="form-control shadow-none" value="{{ $admin->alamat }}" disabled>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> Tanggal Lahir </label>
                                                            <input type="text" name="tanggal_lahir" class="form-control shadow-none" value="{{ $admin->tanggal_lahir }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="modal-footer">
                                                <a href="/profiladmin/{{ $admin->id }}/edit" class="btn btn-outline-dark w-175 shadow-none" data-bs-dismiss="modal"> Edit </a>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Update Image --}}
    <div class="modal fade" id="image-profil" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form action="/updateprofilimage/{{ $admin->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Image</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input type="file" name="image" class="form-control shadow-none" accept="image/*">
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

    {{-- Add Admin --}}
    <div class="modal fade" id="add-admin" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/newadmin" method="POST" enctype="multipart/form-data">>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="registerModalLabel"><i class="bi bi-person-add me-2"></i>Admin Register</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control shadow-none @error('username') is-invalid @enderror" id="username" name="username" aria-describedby="username" value="{{ old('username') }}">
                            @error('username') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control shadow-none @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" value="{{ old('email') }}">
                            @error('email') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control shadow-none @error('telepon') is-invalid @enderror" id="phone" name="telepon" aria-describedby="phone" value="{{ old('telepon') }}">
                            @error('telepon') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control shadow-none @error('alamat') is-invalid @enderror" id="alamat" name="alamat"  aria-describedby="alamat" value="{{ old('alamat') }}">
                            @error('alamat') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="datebirth" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control shadow-none @error('tanggal_lahir') is-invalid @enderror"" id="datebirth" name="tanggal_lahir" aria-describedby="datebirth" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label">Foto Diri</label>
                            <input type="file" class="form-control shadow-none @error('image') is-invalid @enderror" id="picture" name="image" aria-describedby="picture" accept="image/*">
                            @error('image') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" name="kirim" class="btn btn-dark shadow-none">Submit</button>
                            <!-- <a href="javascript: void(0)" class="text-secondary text-secondary-none">Lupa Password?</a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Add Pemilik --}}
    <div class="modal fade" id="add-pemilik" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/newpemilik" method="POST" enctype="multipart/form-data">>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center" id="registerModalLabel"><i class="bi bi-person-add me-2"></i>Register Pemilik</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control shadow-none @error('username') is-invalid @enderror" id="username" name="username" aria-describedby="username" value="{{ old('username') }}">
                            @error('username') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control shadow-none @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" value="{{ old('email') }}">
                            @error('email') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control shadow-none @error('telepon') is-invalid @enderror" id="phone" name="telepon" aria-describedby="phone" value="{{ old('telepon') }}" placeholder="ex : 628xxxxxxxxxx">
                            @error('telepon') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control shadow-none @error('alamat') is-invalid @enderror" id="alamat" name="alamat"  aria-describedby="alamat" value="{{ old('alamat') }}">
                            @error('alamat') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="datebirth" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control shadow-none @error('tanggal_lahir') is-invalid @enderror"" id="datebirth" name="tanggal_lahir" aria-describedby="datebirth" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label">Foto Diri</label>
                            <input type="file" class="form-control shadow-none @error('image') is-invalid @enderror" id="picture" name="image" aria-describedby="picture" accept="image/*">
                            @error('image') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div> 
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" name="kirim" class="btn btn-dark shadow-none">Submit</button>
                            <!-- <a href="javascript: void(0)" class="text-secondary text-secondary-none">Lupa Password?</a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin/inc/script')
</body>
</html>