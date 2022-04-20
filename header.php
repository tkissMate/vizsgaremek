<?php
    session_start();
    require_once 'includes/connect.php';
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Vizsgaremek</title>
</head>
<body>
    <script src="scripts/scroll.js"></script>
    <header>
        <div class="login-bar">
            <?php
                echo '<a href="kosar.php"><button class="btn-yellow">KOSAR</button></a>';
                if (isset($_SESSION['email'])) {
                    echo '<a href="account.php"><button class="btn-blue">Fiók</button></a>';
                    echo '<form class="login-form" action="includes/logout.php" method="post">                
                            
                            <button class="btn-red" type="submit" name="submit-logout">Kijelentkezés</button>
                        </form>'
                        ;
                }
                else{
                    echo '
                <form class="login-form" action="includes/login.php" method="post">
                <table>
                    <tr>
                    <td><input type="text" name="email" placeholder="e-mail..."></td>
                    <td><button class="btn-green" type="submit" name="submit-login">Bejelentkezés</button></td>
                    </tr>
                    <tr>
                    <td><input type="password" name="pwd" placeholder="password.."></td>
                    <td><button class="btn-red"><a href="reg/register.html">Regisztrácio</a></button></td>
                    </tr>
                </table>
                </form>';
                }
            ?>

        </div>
        <h1><a href="index.php">WEBSHOP</a></h1>
            <nav class="nav-bar">
                <ul>
                    <li><a href="index.php?keres=akcio&ertek=1">Akcios</a></li>
                    <li>
                        <div class="dropdown">
                            <a href="index.php">Foglalatok</a>
                            <div class="dropdown-content">
                                <?php
                                if ($result = $mysqli->query("SELECT foglalat FROM `termek` WHERE 1 GROUP BY foglalat")) {
                                    while ($row = $result->fetch_assoc()) {
                                            echo '<a href="?keres=foglalat&ertek='.$row["foglalat"].'">'.$row["foglalat"].'</a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown">
                            <a href="index.php">Formák</a>
                            <div class="dropdown-content">
                                <?php
                                if ($result = $mysqli->query("SELECT forma FROM `termek` WHERE 1 GROUP BY forma")) {
                                    while ($row = $result->fetch_assoc()) {
                                            echo '<a href="?keres=forma&ertek='.$row["forma"].'">'.$row["forma"].'</a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                    <li>
                    <div class="dropdown">
                            <a href="index.php">Teljesítmény</a>
                            <div class="dropdown-content">
                                <?php
                                if ($result = $mysqli->query("SELECT teljesitmeny FROM `termek` WHERE 1 GROUP BY teljesitmeny")) {
                                    while ($row = $result->fetch_assoc()) {
                                            echo '<a href="?keres=teljesitmeny&ertek='.$row["teljesitmeny"].'">'.$row["teljesitmeny"].' W</a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </li>
                    <li><a href="index.php">Összes</a></li>
                </ul>
            </nav>
            <div class="nav-placeholder"></div>
    </header>