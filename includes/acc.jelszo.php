<?php require_once 'connect.php';
    session_start();
?>
<form action="includes/acc.jelszoScript.php" method="post">
        <div>
        <label for="pwd">Régi Jelszó</label>
        <input type="password" class="form-control" name="pwd">
        </div>
        <div>
            <label for="pwd_new">Új jelszó</label>
            <input type="password" class="form-control" name="pwd_new" >
        </div>
        <div>
            <label for="pwd_new2">Új jelszó ismét</label>
            <input type="password" class="form-control" name="pwd_new2">
        </div>
        <button class="btn-green" type="submit" name="submit-change">Mentés</button>
</form>