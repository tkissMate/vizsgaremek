<?php require_once 'connect.php';
if (!isset($_SESSION['vnev'])) {
    session_start();
}
?>
<form action="includes/acc.fiokScript.php" method="post">
        <div>
        <label for="vnev">Vezetéknév</label>
        <input type="text" class="form-control" name="vnev" value="<?php echo $_SESSION['vnev']?>">
        </div>
        <div>
            <label for="knev">Keresztnév</label>
            <input type="text" class="form-control" name="knev" value="<?php echo $_SESSION['knev']?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']?>">
            
        </div>
        <div>
            <label for="phone">Telefonszam</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $_SESSION['phone']?>">
            
        </div>
        <div>
            <label for="irszam">Irányítószám</label>
            <input type="text" class="form-control" name="irszam" value="<?php echo explode(',',$_SESSION['szallCim'])[0]?>">
            
        </div>
        <div>
            <label for="varos">Város</label>
            <input type="text" class="form-control" name="varos" value="<?php echo explode(',',$_SESSION['szallCim'])[1]?>">
            
        </div>
        <div>
            <label for="utca">Utca</label>
            <input type="text" class="form-control" name="utca" value="<?php echo explode(',',$_SESSION['szallCim'])[2]?>">
            
        </div>
        <div>
            <label for="hazszam">Házszám</label>
            <input type="text" class="form-control" name="hazszam" value="<?php echo explode(',',$_SESSION['szallCim'])[3]?>">
        </div>
        <button class="btn-green" type="submit" name="submit-change">Mentés</button>
        </form>