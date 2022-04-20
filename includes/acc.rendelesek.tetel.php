<?php
require_once "./connect.php";

$id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT);
$osszeg = 0;

$response = '<div class="table-container"><table><h4>Rendelés azonosító: '.$id."</h4>";
if($result =$mysqli->query('SELECT `termek_id`, `nev`, `mennyiseg`, `osszeg` FROM `rendelt_termek` JOIN termek USING(termek_id) WHERE `rendeles_id`='.$id)){
    while ($row =$result->fetch_assoc()) {
        $response.= '<tr>
                    <td><a href="product.php?termekid='.$row["termek_id"].'">'.$row["nev"]."</a></td>
                    <td>".$row["mennyiseg"]."db</td>
                    <td>".$row["osszeg"].";-</td>
                    </tr>";
        $osszeg+= $row["mennyiseg"]*$row["osszeg"];
    }
}
$response.="<tr><td></td><td>Összeg:</td><td>".$osszeg."</td></tr>";
$response.="</table></div>";
echo $response;