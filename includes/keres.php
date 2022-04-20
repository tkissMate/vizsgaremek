<?php
require_once 'connect.php';
if (!isset($_POST['foglalat'])) {
    
}

echo '<tr>';
            echo '<th>név</th>';
            echo '<th>ár</th>';
            echo '<th>forma</th>';
            echo '<th>teljesitmeny</th>';
            echo '<th>termekkod</th>';
            echo '<th></th>';
echo '</tr>';

$foglalat = $_POST['foglalat'];
$forma = $_POST['forma'];
$teljesitmeny = $_POST['teljesitmeny'];

$query = "SELECT * FROM `termek` WHERE foglalat LIKE '".$foglalat."' AND 
                                        forma LIKE '".$forma."' AND 
                                        teljesitmeny LIKE '".$teljesitmeny."' AND elerheto = 1";

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
            echo '<td><a href="product.php?termekid='.$row["termek_id"].'">'.$row["nev"].'</td>';
            echo '<td>'.$row["ar"].';-</td>';
            echo '<td>'.$row["forma"].'</td>';
            echo '<td>'.$row["teljesitmeny"].' W</td>';
            echo '<td>'.$row["termekkod"].'</td>';
            echo '<td onclick=kosarba('.$row["termek_id"].')><button class="cart-btn btn-yellow"><img src="/vizsgaremek/images/cart.webp" alt="cart"></button></td>';
        echo '</tr>';
    }
}if (!$result->num_rows) {
    echo '<tr><td>Nincs találat</td></tr>';
}