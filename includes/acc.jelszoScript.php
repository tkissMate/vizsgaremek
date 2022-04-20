<?php
require_once 'connect.php';
session_start();

if (isset($_POST['submit-change'])) {
    if (empty($_POST['pwd_new']) || empty($_POST['pwd_new2']) || empty($_POST['pwd'])) {
        header("Location: http://".$_SERVER['HTTP_HOST']."/vizsgaremek/account.php?error=uresMezok");
        exit();
    }
    if ($_POST['pwd_new']==$_POST['pwd_new2']) {
    
        if ($result = $mysqli->query('SELECT * FROM `vasarlo` WHERE vasarlo_id='.$_SESSION['vasarlo_id'])) {
            while ($row = $result->fetch_assoc()) {
                if (password_verify($_POST['pwd'],$row['jelszo'])) {
                    $hashedPwd = password_hash($_POST['pwd_new'], PASSWORD_DEFAULT);

                    $mysqli->query("UPDATE `vasarlo` SET `jelszo`='".$hashedPwd."' WHERE vasarlo_id =".$_SESSION['vasarlo_id']);

                    header("Location: http://".$_SERVER['HTTP_HOST']."/vizsgaremek/account.php?jelszo=sikeres");
                    exit(); 
                
                }else {
                    header("Location: http://".$_SERVER['HTTP_HOST']."/vizsgaremek/account.php?error=hibasJelszo");
                    exit();
                }
            }
        }
    }
    header("Location: http://".$_SERVER['HTTP_HOST']."/vizsgaremek/account.php?error=elteroJelszavak");
    exit();
}else {
    header("Location: ".$_SESSION['url']);
    exit();
}