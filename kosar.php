<?php
    include 'header.php';
    require_once 'includes/connect.php';

    $_SESSION['url']= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>
<div class="container">
    <div></div>
    <div class="content">
    <div class="table-container">
        <table id="kosarTable">
<?php

 if (!empty($_SESSION['kosar'])) {

    foreach($_SESSION['kosar'] as $x => $x_value) {
        $row = $mysqli->query("SELECT * FROM `termek` WHERE termek_id=".$x)->fetch_assoc();
        echo '<tr>';
            echo '<td>NEV: <a href="product.php?termekid='.$row["termek_id"].'">'.$row["nev"].'</a></td>';
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