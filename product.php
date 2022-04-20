<?php
    include 'header.php';
    if (!isset($_GET['termekid'])) {
        header("Location: products.php");
    }

    $termekid = $_GET['termekid'];

    if ($result = $mysqli->query('SELECT * FROM `termek` WHERE termek_id="'.$termekid.'" AND elerheto = 1')) {
        while ($row = $result->fetch_assoc()) {
            $nev = $row['nev'];
            $ar = $row['ar'];
            $foglalat = $row['foglalat'];
            $forma = $row['forma'];
            $teljesitmeny = $row['teljesitmeny'];
            $szinhomerseklet = $row['szinhomerseklet'];
            $termekkod = $row['termekkod'];
            $ean = $row['ean'];
            $leiras = $row['leiras'];
            $keszlet = $row['keszlet'];
        }
    }
    if (!$result->num_rows) {
        header("Location: products.php");
    }
?>
<table id="product">
    <tr>
        <td><?php echo $nev;?></td>
        <td style="text-align: left;"><h3>Ár</h3><p><?php echo $ar;?>;-</p></td>
    </tr>
    <tr>
        <td rowspan="8"><img src="images/2178329-200.png" alt="led-bulb"></td>
    </tr>
    <tr>
        <td><h3>Foglalat</h3><p><?php echo $foglalat;?></p></td>
    </tr>
    <tr>
        <td><h3>Forma</h3><p><?php echo $forma;?></p></td>
    </tr>
    <tr>
        <td><h3>Teljesítmény</h3><p><?php echo $teljesitmeny;?></p></td>
    </tr>
    <tr>
        <td><h3>Színhőmérséklet</h3><p><?php echo $szinhomerseklet;?></p></td>
    </tr>
    <tr>
        <td><h3>Termékkod</h3><p><?php echo $termekkod;?></p></td>
    </tr>
    <tr>
        <td><h3>EAN kod:</h3><p><?php echo $ean;?></p></td>
    </tr>
    <tr>
        <td><?php if ($keszlet>0) {
            echo 'Van készleten';
        }else {
            echo 'Nincs készleten';
        }?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $leiras;?></td>
    </tr>
</table>
<footer>
    <a href="https://github.com/tkissMate/vizsgaremek"><img src="images/github-brand-logo-47401.webp" alt="github" style="height: 80px;"></a>
    <p>Tokai-Kiss Máté &copy; 2022</p>
</footer>
</body>
</html>