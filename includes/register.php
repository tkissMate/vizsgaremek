<?php
    if(isset($_POST['submit-reg'])){
        require_once 'connect.php';

        $vnev = filter_input(INPUT_POST,"vnev");
        $knev = filter_input(INPUT_POST,"knev");
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);;
        $pwd = $_POST['pwd'];
        $pwdRep = $_POST['pwdRep'];
        $phone = filter_input(INPUT_POST,"phone");
        $irszam = filter_input(INPUT_POST,"irszam");
        $varos = filter_input(INPUT_POST,"varos");
        $utca = filter_input(INPUT_POST,"utca");
        $hazszam = filter_input(INPUT_POST,"hazszam");
        $accepted = date('Y-m-d H:i:s');

        if (empty($vnev)|| 
            empty($knev)|| 
            empty($email)|| 
            empty($pwd)|| 
            empty($pwdRep)|| 
            empty($phone)|| 
            empty($irszam)|| 
            empty($varos)|| 
            empty($utca)|| 
            empty($hazszam)|| 
            empty($accepted)
            ){
                header("Location: ../reg/register.html?error=uresMezok");
                exit();
                
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../reg/register.html?error=hibasEmail");
            exit();

        }else if($pwd !== $pwdRep) {
            header("Location: ../reg/register.html?error=hibasJelszo");
            exit();
            
        }else if(!preg_match("/^[+]?[0-9]{7,15}$/",$phone)) {
            header("Location: ../reg/register.html?error=hibasTelefon");
            exit();

        }else {
            $stmt = $mysqli->prepare("SELECT email FROM vasarlo WHERE email=?");
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $stmt->store_result();
            $result= $stmt->num_rows;

        }if ($result > 0) {
            header("Location: ../reg/register.html?error=foglaltEmail");
            exit();

        }else {
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

            $stmt = $mysqli->prepare("INSERT INTO `vasarlo`(`vasarlo_id`, `vnev`, `knev`, `email`, `phone`, `elfogadva`, `jelszo`, `irszam`, `varos`, `utca`, `hazszam`) 
                            VALUES (NULL,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssss",$vnev,$knev,$email,$phone,$accepted,$hashedPwd,$irszam,$varos,$utca,$hazszam);
            $stmt->execute();
            header("Location: ../index.php?regisztacio=sikeres");
            exit();
        }
        $stmt->close();
}
else {
    header("Location: ../reg/register.html");
    exit();
}
