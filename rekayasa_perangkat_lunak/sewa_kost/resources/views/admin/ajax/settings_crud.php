<?php
    include '../inc/config.php';
    include '../index.php';

    if(isset($_POST['get_general'])) {
        $q = "select * from 'setting' where 'id_setting'=?";
        $values = [1];
        $result = select($q,$result,"i");
        $data = mysqli_fetch_assoc($result);
        $json_data = json_encode($data);
        echo $json_data;
    }

    if(isset($_POST['upd_general'])) {
        $frm_data = filteration($_POST);

        $q = "UPDATE `setting` SET `site_title`=?,`site_about`=? WHERE 'id_setting'=?";
        $values = [$frm_data['site_title'],$frm_data['site_about'],1];
        $res = update($q,$values,'ssi');
    }
?>