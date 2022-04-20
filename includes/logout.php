<?php
session_start();
unset ($_SESSION['vasarlo_id']);
unset ($_SESSION['vnev']);
unset ($_SESSION['knev']);
unset ($_SESSION['email']);
unset ($_SESSION['phone']);
unset ($_SESSION['szallCim']);

header("Location: ".$_SESSION['url']);