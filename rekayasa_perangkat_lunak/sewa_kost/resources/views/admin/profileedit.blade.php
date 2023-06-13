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
    </style>
</head>
<body>
    @include('admin/inc/header')

    <div class="container">
        <div class="row">
            <div class="col-lg-9 ms-auto p-3">
                <h3 class="mb-4">Profile Page</h3>

                <!-- General Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="col-lg-7 mb-4 px-lg-2" style="margin-right:auto; margin-left: auto">
                            <div class="card mb-4 border-2 shadow">
                                <div class="row g-0 p-5 align-items-center">
                                    <div class="conten">
                                        <img src="{{ asset('images/profil/'.$admin->image) }}" alt="Avatar" class="image" style="width:200px">
                                    </div>
                                </div>
                                <div class="row g-0 p-5 align-items-center">
                                    <div class="">
                                        <form action="/profiladmin/{{ $admin->id }}" id="rooms-setting" method="post">
                                            @method('put')
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> Username </label>
                                                            <input type="text" name="username" class="form-control shadow-none" value="{{ $admin->username }}">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> E-mail </label>
                                                            <input type="text" name="email" class="form-control shadow-none" value="{{ $admin->email }}">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> Telepon </label>
                                                            <input type="text" name="telepon" class="form-control shadow-none" value="{{ $admin->telepon }}">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> Alamat </label>
                                                            <input type="text" name="alamat" class="form-control shadow-none" value="{{ $admin->alamat }}">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label fw-bold"> Tanggal Lahir </label>
                                                            <input type="date" name="tanggal_lahir" class="form-control shadow-none" value="{{ $admin->tanggal_lahir }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-outline-dark w-175 shadow-none">Update</button>
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


    @include('admin/inc/script')
</body>
</html>