<?php
    include 'header.php';
?>

<div class="container">

    <div class="menu-container">
    <div class="menu">
        <ul>
            <li><button class="btn-blue" onclick="account_fiok()">Saját adatok</button></li>
            <li><button class="btn-blue" onclick="account_rendelesek()">Rendeléseim</button></li>
            <li><button class="btn-blue" onclick="account_jelszo()">Jelszó változtatás</button></li>
        </ul>
    </div>
    </div>

    <div class="content">
        <?php
            include "includes/acc.fiok.php";
        ?>
    </div>

</div>



    <script src="scripts/ajax.js"></script>
    <footer>
        <a href="https://github.com/tkissMate/vizsgaremek"><img src="images/github-brand-logo-47401.webp" alt="github" style="height: 80px;"></a>
        <p>Tokai-Kiss Máté &copy; 2022</p>
    </footer>
    </body>
</html>