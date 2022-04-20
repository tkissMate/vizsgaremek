<?php require_once 'connect.php';
    session_start();
?>
<div class="table-container">
<table>
    <tr>
        <td style="font-weight:bold">Rendelés azonosító</td>
        <th>Rendelés dátum</th>
        <th>Megjegyzés</th>
        <th>Összeg</th>
</tr>
            <?php
                if($result =$mysqli->query("SELECT `rendeles_id`, `rendeles_datum`, `megjegyzes`,`osszeg` FROM `rendeles` WHERE vasarlo_id=".$_SESSION['vasarlo_id'])){
                    while ($row =$result->fetch_assoc()) {
                        echo '<tr onclick="listaz('.$row['rendeles_id'].')">';
                            echo '<td>'.$row["rendeles_id"].'</td>';
                            echo '<td>'.$row["rendeles_datum"].'</td>';
                            echo '<td>'.$row["megjegyzes"].'</td>';
                            echo '<td>'.$row["osszeg"].'</td>';
                        echo "</tr>";
                    }
                }
                
            ?>
</table>
</div>