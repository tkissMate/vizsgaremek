<?php   
session_start();

    if (isset($_POST['submit-login'])) {
        require_once 'connect.php';

        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        if (empty($email)||empty($pwd)) {
            header("Location: ".$_SESSION['url']."?error=uresMezok");
            exit();
        }else {

            if ($result = $mysqli->query('SELECT * FROM `vasarlo` WHERE email="'.$email.'"')) {
                while ($row = $result->fetch_assoc()) {

                    if (password_verify($pwd,$row['jelszo'])) {
                        session_start();
                        $_SESSION['vasarlo_id'] = $row['vasarlo_id'];
                        $_SESSION['vnev'] = $row['vnev'];
                        $_SESSION['knev'] = $row['knev'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['phone'] = $row['phone'];
                        $_SESSION['szallCim'] = $row['irszam'].','.$row['varos'].','.$row['utca'].','.$row['hazszam'];
                        
                        header("Location: ".$_SESSION['url']."?login=sikeres");
                        exit(); 
                    
                    }else {
                        header("Location: ".$_SESSION['url']."?error=hibasJelszo");
                        exit(); 
                    }
                }
            }if (!$result->num_rows) {
                header("Location: ".$_SESSION['url']."?error=hibasFelhasznalo");
            }
        }

    }else {
        header("Location: ".$_SESSION['url']);
        exit(); 
    }