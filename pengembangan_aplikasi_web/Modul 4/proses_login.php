<?php
$name=$_POST['username'];
$password=md5($_POST['password']);

session_start();
$_SESSION['login']=TRUE;
if(isset($_POST['remember']))
{
    $_SESSION['username']=$name;
    $_SESSION['user']=$_SESSION['username'];
    $_SESSION['password']=$password;
    $_SESSION['pswd']=$_SESSION['password'];
    header('location:./halaman_data_mahasiswa.php');
    exit();
}
header('location:./halaman_data_mahasiswa.php');
exit();
?> 