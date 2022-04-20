<?php
require_once 'connect.php';
session_start();
if (isset($_POST['submit-change'])) {
    

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        header("Location: http://".$_SERVER['HTTP_HOST']."/vizsgaremek/account.php?error=hibasEmail");
        exit();
    }
    if(!preg_match("/^[+]?[0-9]*$/",$_POST['phone'])) {
        header("Location: http://".$_SERVER['HTTP_HOST']."/vizsgaremek/account.php?error=hibasTelefon");
        exit();
    }

    $_SESSION['vnev'] = $_POST['vnev'];
    $_SESSION['knev'] = $_POST['knev'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['szallCim'] = $_POST['irszam'].','.$_POST['varos'].','.$_POST['utca'].','.$_POST['hazszam'];
    
    $mysqli->query("UPDATE `vasarlo` SET `vnev`='".$_POST['vnev']."',`knev`='".$_POST['knev']."',`email`='".$_POST['email']."',`phone`='".$_POST['phone']."',`irszam`='".$_POST['irszam']."',`varos`='".$_POST['varos']."',`utca`='".$_POST['utca']."',`hazszam`='".$_POST['hazszam']."' WHERE vasarlo_id =".$_SESSION['vasarlo_id']);
    header("Location: http://".$_SERVER['HTTP_HOST']."/vizsgaremek/account.php");
    exit();
}else {
    header("Location: ".$_SESSION['url']);
    exit();
}