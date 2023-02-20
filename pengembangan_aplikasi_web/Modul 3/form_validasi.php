<!-- UNTUK VALIDASI FORM -->
<?php

    $name = $email = $website = $website = $comment = $gender = "";
    $nama_error = $email_error = $website_error = $comment_error =  $gender_error = $all_error = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        # ---> Validasi nama jika disubmit dalam keadaan kosong
        if (empty($_POST["nama"])) {
            $nama_error = "* name is required";
        # ---> Validasi nama terhadap kesalahan input
        } elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST["nama"])) {
            $nama_error = "* only letters and white space allowed"; 
        } else {
            $name = $_POST["nama"];}

        # ---> Validasi email jika disubmit dalam keadaan kosong
        if (empty($_POST["email"])) {
            $email_error = "* email is required";
        # ---> Validasi email terhadap kesalahan input
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email_error = "* invalid email format"; 
        } else {
            $email = $_POST["email"];}

        if (empty($_POST["web"])) {
            $website_error = " ";
        # ---> Validasi terhadap kesalahan input
        } else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST['web'])) {
            $website_error = "* invalid URL"; 
        } else {
            $website = $_POST["web"];}

        if (empty($_POST["comment"])) {
            $comment_error = "";
        } else {
            $comment = $_POST["comment"];}
        
        # ---> Validasi gender jika disubmit dalam keadaan kosong
        if (empty($_POST["gender"])) {
            $gender_error = "* genders is required";
        } else {
            $gender = $_POST["gender"];}

        # ---> Validasi nama, email dan gender jika disubmit dalam keadaan kosong
        if ((empty($_POST["nama"])) || (empty($_POST["email"])) || (empty($_POST["gender"]))) {
            $all_error = "* required filed";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Form Validation</title>
        <!-- UNTUK MEMPERINDAH TAMPILAN WEB -->
        <style type="text/css">
            body{
                background-color: gray;
            }
            h2 {
                text-align: center;
                margin-bottom: 0px;
            }
            p {
                text-align: center;
                color: white;
                margin-top:0px;
            }
            form{
                width: fit-content;
                border: 1px solid black;
                border-radius: 5px;
                padding : 10px;
                background-color: white;
            }
            input, textarea{
                margin: 3px;
            }
            .nama::after{
                content: ":";
                margin-left: 27px;
                margin-right: 5px;
            }
            .email::after{
                content: ":";
                margin-left: 14px;
                margin-right: 5px;
            }
            .web::after{
                content: ":";
                margin-left: 15px;
                margin-right: 5px;
            }
            .comment::after{
                content: "";
                margin-left: 13px;
            }
            .gender::after{
                content: "";
                margin-left: 25px;
            }
            .atur{
                display: flex;
                justify-content: center;
            }
            h4{
                margin: 10px 5px;
            }
            section{
                margin-top: 10px;
                background-color: white;
                width: 250px;
                padding: 5px;
                border: 1px solid black;
                border-radius: 5px;
                background-color: #6d7973;
            }
            .error {
                color: red;
            }
            .button {
                border: 1px solid black;
                border-radius: 5px;
                background-color: #6d7973;
                margin-left: 10px;
                padding: 3px;

            }
            .button:hover {
                background-color: #c0c0c0;
            }
        </style>
    </head>

    <body>
        
        <h2>PHP Form Validation Example</h2>
        <p>Nama : Indah Pratiwi | NIM : 210411100050</p>

        <div class="atur">
            <!-- UNTUK MEMBUAT FORM INPUTAN -->
            <form action="<?php $_SERVER["PHP_SELF"];?>" method=post>

                <span class="error"><?php echo $all_error?></span><br>

                <label class="nama">Name</label>
                <input type="text" name="nama" value="<?php echo $name;?>"><span class="error"><?php echo $nama_error?></span><br>

                <label class="email">E - mail</label>
                <input type="text" name="email" value="<?php echo $email;?>"><span class="error"><?php echo $email_error?></span><br>

                <label class="web">Website</label>
                <input type="text" name="web" value="<?php echo $website;?>"><span class="error"><?php echo $website_error?></span><br>
                
                <label class="comment">Comment</label>
                <textarea name="comment" ><?php echo $comment;?></textarea><br>

                <label class="gender">Gender</label>
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
                <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other   <span class="error"><?php echo $gender_error?></span><br>
                
                <input type="submit" value="submit" class="button">

            </form>
        </div>
        <div class="atur">
            <section>
                <!-- UNTUK MENAMPILKAN HASIL INPUTAN -->
                <h4>Your Input : </h4>
                <pre><?php echo "   Nama    : ". $name?></pre>
                <pre><?php echo "   Email   : ". $email?></pre>
                <pre><?php echo "   Website : ". $website?></pre>
                <pre><?php echo "   Comment : ". $comment?></pre>
                <pre><?php echo "   Gender  : ". $gender?></pre>
            </section>
        </div>
    </body>
</html>