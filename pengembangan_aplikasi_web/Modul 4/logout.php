<?php
    //mengaktifkan session
    session_start();

    //menghapus session
    session_destroy(); 

    //redirect ke halaman login
    header('location:./halaman_login.php'); 
    exit();
?>