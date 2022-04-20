<?php
    include 'header.php';
    $_SESSION['url']= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    
    if (isset($_GET['keres'])) {
        $keres = $_GET['keres'];
        $ertek = $_GET['ertek'];
    }else{
        $keres = 1; 
        $ertek = 1; 
    }
?>

<div class="container">
    <div class="menu-container">
    <div class="menu">

    <ul>
        <li><h4>Foglalat</h4>
            <ul>
                <?php
                    if ($result = $mysqli->query("SELECT foglalat FROM `termek` WHERE 1 GROUP BY foglalat")) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<li>';
                            if ($row["foglalat"]==$ertek) {
                                echo '<input checked type="radio" name="foglalat_radio" value="'.$row["foglalat"].'" onclick='."'".'foglalat("'.$row["foglalat"].'")'."'>";
                            }else {
                                echo '<input type="radio" name="foglalat_radio" value="'.$row["foglalat"].'" onclick='."'".'foglalat("'.$row["foglalat"].'")'."'>";
                            }
                            echo '<label>'.$row["foglalat"].'</label>';
                            echo '</li>';
                            }
                        }
                ?>
            </ul>
        </li>
        <li><h4>Forma</h4>
            <ul>
                <?php
                    if ($result = $mysqli->query("SELECT forma FROM `termek` WHERE 1 GROUP BY forma")) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<li>';
                            if ($row["forma"]==$ertek) {
                                echo '<input checked type="radio" name="forma_radio" value="'.$row["forma"].'" onclick='."'".'forma("'.$row["forma"].'")'."'>";
                            }else {
                                echo '<input type="radio" name="forma_radio" value="'.$row["forma"].'" onclick='."'".'forma("'.$row["forma"].'")'."'>";
                            }
                            echo '<label>'.$row["forma"].'</label>';
                            echo '</li>';
                            }
                        }
                ?>
            </ul>
        </li>
        <li><h4>Teljesítmény</h4>
            <ul>
                <?php
                    if ($result = $mysqli->query("SELECT teljesitmeny FROM `termek` WHERE 1 GROUP BY teljesitmeny")) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<li>';
                            if ($row["teljesitmeny"]==$ertek) {
                                echo '<input checked type="radio" name="teljesitmeny_radio" value="'.$row["teljesitmeny"].'" onclick='."'".'teljesitmeny("'.$row["teljesitmeny"].'")'."'>";
                            }else {
                                echo '<input type="radio" name="teljesitmeny_radio" value="'.$row["teljesitmeny"].'" onclick='."'".'teljesitmeny("'.$row["teljesitmeny"].'")'."'>";
                            }
                            echo '<label>'.$row["teljesitmeny"].' W</label>';
                            echo '</li>';
                            }
                        }
                ?>
            </ul>
        </li>
    </ul>
    <button class="btn-blue" onclick="reset()">ÖSSZES</button>

    </div>
    </div>
    <div class="content">
        <div class="table-container">
        <table id="products_table">
<?php
    echo '<tr>';
        echo '<th>Név</th>';
        echo '<th>Ár</th>';
        echo '<th>Forma</th>';
        echo '<th>Teljesitmény</th>';
        echo '<th>Termékkód</th>';
        echo '<th></th>';
    echo '</tr>';
    if ($result = $mysqli->query("SELECT * FROM `termek` WHERE keszlet > 0 AND elerheto = 1 AND ".$keres.' LIKE "'.$ertek.'"')) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
                echo '<td><a href="product.php?termekid='.$row["termek_id"].'">'.$row["nev"].'</a></td>';
                echo '<td>'.$row["ar"].';-</td>';
                echo '<td>'.$row["forma"].'</td>';
                echo '<td>'.$row["teljesitmeny"].' W</td>';
                echo '<td>'.$row["termekkod"].'</td>';
                echo '<td onclick=kosarba('.$row["termek_id"].')><button class="cart-btn btn-yellow"><img src="/vizsgaremek/images/cart.webp" alt="cart"></button></td>';
            echo '</tr>';
        }
    }
    

?>
        </table>
    </div>
    </div>
</div>

    <script src="scripts/ajax.js"></script>
    <footer>
        <a href="https://github.com/tkissMate/vizsgaremek"><img src="images/github-brand-logo-47401.webp" alt="github" style="height: 80px;"></a>
        <p>Tokai-Kiss Máté &copy; 2022</p>
    </footer>
    </body>
</html>