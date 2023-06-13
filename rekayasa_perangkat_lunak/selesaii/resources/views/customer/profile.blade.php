<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keisuke's Boarding Hotel - Profile</title>
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
    @include('customer/inc/headerprofile')

    <div class="container">
        <div class="row">
            <div class="col-lg-9 ms-auto p-3">
                <h3 class="mb-4">Profile Page</h3>

                @if (session()->has('succes'))
                    <div class="alert alert-success" role="alert" style="width: 500px; text-align:center; margin-right:auto; margin-left:auto; ">
                        {{ session('succes') }}
                    </div>
                @endif

                <!-- General Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="col-lg-7 mb-4 px-lg-2" style="margin-right:auto; margin-left: auto">
                            <div class="card mb-4 border-2 shadow">
                                <div class="row g-0 p-5 align-items-center">
                                    <div class="conten">
                                        <img src="{{ asset('images/users/'.$user->image) }}" alt="Avatar" class="image" style="width:200px">
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
                                                            <input type="text" name="username" class="form-control shadow-none" value="{{ $user->username }}" disabled>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> E-mail </label>
                                                            <input type="text" name="email" class="form-control shadow-none" value="{{ $user->email }}" disabled>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> Telepon </label>
                                                            <input type="text" name="telepon" class="form-control shadow-none" value="{{ $user->telepon }}" disabled>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> Alamat </label>
                                                            <input type="text" name="alamat" class="form-control shadow-none" value="{{ $user->alamat }}" disabled>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> Tanggal Lahir </label>
                                                            <input type="text" name="tanggal_lahir" class="form-control shadow-none" value="{{ $user->tanggal_lahir }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="modal-footer">
                                                <a href="/editprofil/{{ $user->id }}/edit" class="btn btn-outline-dark w-175 shadow-none" data-bs-dismiss="modal"> Edit </a>
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

    <div class="modal fade" id="image-profil" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <form action="/updateimage/{{ $user->id }}" method="post" enctype="multipart/form-data">
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

    @include('admin/inc/script')
</body>
</html>