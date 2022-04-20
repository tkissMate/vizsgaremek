<?php
require_once 'connect.php';
session_start();
if (isset($_GET['termek_id'])) {
$termek_id = $_GET['termek_id'];


if ($_SESSION['kosar'][$termek_id]==1) {
    unset($_SESSION['kosar'][$termek_id]);
}else {
    $_SESSION['kosar'][$termek_id]--;
}

  /* foreach($_SESSION['kosar'] as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
  }  */

  if (!empty($_SESSION['kosar'])) {
  
      foreach($_SESSION['kosar'] as $x => $x_value) {
          $row = $mysqli->query("SELECT * FROM `termek` WHERE termek_id=".$x)->fetch_assoc();
          echo '<tr>';
              echo '<td>NEV: '.$row['nev'].'</td>';
              echo '<td>AR: '.$row["ar"].'</td>';
              echo '<td><button class="btn-red" onclick="kosarbol('.$x.')">-</button></td>';
              echo '<td>DB: '.$x_value.'</td>';
              echo '<td><button class="btn-green" onclick="kosarba('.$x.')">+</button></td>';
          echo '</tr>';
      }
  }else {
      echo '<tr><td>A KOSAR JELENLEG URES</td></tr>';
  }
  echo '<tr><td></td><td></td><td></td><td>';
    if (isset($_SESSION['kosar'])) {
        if (isset($_SESSION['vasarlo_id'])) {
            echo '<button class="btn-green"><a href="rendel.php">RENDEL</a></button>';
        }else {
            echo '<button disabled>RENDELESHEZ BELEPES SZUKSEGES</button>';
        }
    }
    echo '</td><td></td></tr>';
}else{
    header("Location: ../index.php");
}
  
?>