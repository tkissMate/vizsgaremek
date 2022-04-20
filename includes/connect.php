<?php
$mysqli = new mysqli("localhost","root","","vizsgaremek");
if ($mysqli->connect_errno) {
    echo "Hiba a csatlakozáskor!";
    exit();
}