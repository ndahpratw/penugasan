<?php
  //mengaktifkan session
  session_start();

  if(isset($_SESSION['user']))
  {
      if($_SESSION['user']==$_SESSION['username'])
      {
          $_SESSION['login']=TRUE;
          header('location:./halaman_daftar_mahasiswa.php');
          exit();
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Halaman Login</title>
    <style type="text/css">
      body{
        background-color: gray;
      }
      form{
        width: 400px;
        border: 1px solid black;
        padding: 10px;
        background-color: white;
      }
      #atur{
        display: flex;
        justify-content: center;
      }
      #btn{
        margin-top: 10px;
      }
    </style>
  </head>

  <body>
    <div class="container mt-3" id="atur">
      <form action="proses_login.php" method="post">

        <!-- Username field -->
        <div class="mb-3 mt-3">
          <label><b>Username :</b></label>
          <input type="text" class="form-control" placeholder="Enter Username" name="username">
        </div>

        <!-- Password field -->
        <div class="mb-3">
          <label><b>Password :</b></label>
          <input type="password" class="form-control" placeholder="Enter Password" name="password">
        </div>

        <!-- Tombol login -->
        <div class="d-grid">
          <input type="submit" name="submit" value="login" class="btn btn-success btn-block">
        </div>

        <!-- checkbox remember me -->
        <div class="form-check mb-3">
          <label class="form-check-label" id="btn">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
          </label>
        </div>
        
      </form>
    </div>
  </body>
</html>