<?php

try{
    $database = new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8','root','');
    $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(Exeption $e)
{
    die('ERROR:' .$e->getMessage());
}

?>