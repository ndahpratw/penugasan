<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @include('admin/inc/links')
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
        }
        .custom-alert {
            position: fixed;
            top: 25px;
            right: 25px;
        }
    </style>
</head>
<body class="bg-light">

        @if (session()->has('wrong'))
            <div class="alert alert-danger" style="margin: 75px auto 0px; width: 750px; text-align: center;" role="alert">
                {{ session('wrong') }} 
            </div>
        @endif

    <div class="login-form text-center rounded bg-white shadow overflow-none">
        <h4 class="bg-dark text-white py-3">ADMIN LOGIN</h4>
        <div class="panel-body">
            <form method="POST" action="/succesLoginAdmin">
                @csrf
                <div class="p-4">
                    <div class="mb-3">
                        <input name="email" type="email" class="form-control shadow-none text-center" id="username" placeholder="Admin Email" required>
                    </div>
                <div class="mb-3">
                    <input name="password" type="password" class="form-control shadow-none text-center" id="password" placeholder="Admin Password" required>
                </div>
                <div class="input-group">
                </div>
                <button type="submit" name="login" class="btn btn-success shadow-none">Login</button>
                </div>
            </form>
        </div>
    </div>


    @include('admin/inc/script')
</body>
</html>