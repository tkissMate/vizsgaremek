<?php
    include 'header.php';
    require_once 'includes/connect.php';

    if (!isset($_SESSION['vasarlo_id'])) {
        header("Location: index.php");
    }
?>

<div class="container">
    <div class="menu-container">
        <div class="table-container">
            <table>
                <?php
                echo '<tr>';
                echo '<td>Név: '.$_SESSION["vnev"].' '.$_SESSION["knev"].'</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>E-Mail: '.$_SESSION["email"].'</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>Telefon: '.$_SESSION["phone"].'</td>';
                echo '</tr>';
                echo '<tr>';
                    echo '<td>Szállítási cím: '.$_SESSION["szallCim"].'</td>';
                echo '</tr>';
                ?>
            </table>
        </div>
    </div>
    <div class="content">
        <div class="table-container">
            <table>

<?php

    $osszeg = 0;
    foreach($_SESSION['kosar'] as $x => $x_value) {
        $row = $mysqli->query("SELECT * FROM `termek` WHERE termek_id=".$x)->fetch_assoc();
        echo '<tr>';
            echo '<td>TERMEK: '.$row['nev'].'</td>';
            echo '<td>AR: '.$row["ar"].'</td>';
            echo '<td>DB: '.$x_value.'</td>';
            $osszeg += $row["ar"]*$x_value;
        echo '</tr>';
    }   
        echo '<tr>';
            echo '<td></td><td>Végösszeg: '.$osszeg.' HUF</td>';
        echo '</tr>';

        

?>
            </table>
        </div>

        <form action="includes/rendelesFeladas.php" method="post">
            <label for="megjegyzes">Megjegyzés:</label>
                <textarea name="megjegyzes" rows="4" cols="50"></textarea><br>
                <button class="btn-green" type="submit" name="submit-order">VEGLEGESITES</button>
        </form>
    </div>
</div>

    <script src="scripts/kosarba.js"></script>
    <footer>
        <a href="https://github.com/tkissMate/vizsgaremek"><img src="images/github-brand-logo-47401.webp" alt="github" style="height: 80px;"></a>
        <p>Tokai-Kiss Máté &copy; 2022</p>
    </footer>
    </body>
</html>