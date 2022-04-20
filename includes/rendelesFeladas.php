<?php
session_start();
require_once 'connect.php';

if (!isset($_SESSION['vasarlo_id'])) {
    header("Location: ../index.php");
}else{
    


$osszeg = 0;

foreach($_SESSION['kosar'] as $x => $x_value) {
    $row = $mysqli->query("SELECT * FROM `termek` WHERE termek_id=".$x)->fetch_assoc();
        $osszeg += $row["ar"]*$x_value;
}

$datum = date("Y-m-d H:i:s");

$megjegyzes = $_POST['megjegyzes'];

$mysqli->query("INSERT INTO `rendeles`(`rendeles_id`, `vasarlo_id`, `rendeles_datum`, `osszeg`, `megjegyzes`) 
                    VALUES (NULL,'".$_SESSION['vasarlo_id']."','".$datum."','".$osszeg."','".$megjegyzes."')");

$id = $mysqli->insert_id;
echo $id;


foreach($_SESSION['kosar'] as $x => $x_value) {
    $row = $mysqli->query("SELECT * FROM `termek` WHERE termek_id=".$x)->fetch_assoc();

    $mysqli->query("INSERT INTO `rendelt_termek`(`rendeles_id`, `termek_id`, `mennyiseg`, `osszeg`) 
                    VALUES ('".$id."','".$x."','".$x_value."','".$row["ar"]."')");

}

unset ($_SESSION['kosar']);
header("Location: ../index.php?rendeles=sikeres");
}






