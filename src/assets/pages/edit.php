<?php
    include "dbConn.php";
    if(isset($_POST["name"]) && isset($_POST["pop"]) && isset($_POST["lang"]) && isset($_GET["id_country"]) && !isset($_GET["id_city"])){
        $name = $_POST["name"];
        $pop = $_POST["pop"];
        $lang = $_POST["lang"];
        $id_country = $_GET["id_country"];
        $sql = "UPDATE country SET name='$name' , pop=$pop , lang='$lang' WHERE id_country=$id_country";
        if($mysqli->query($sql)){
            header("location: admin.php");
        }
    }
    if(isset($_POST["name"]) && isset($_POST["type"]) && isset($_GET["id_country"]) && isset($_GET["id_city"])){
        $name = $_POST["name"];
        $type = $_POST["type"];
        $id_city = $_GET["id_city"];
        $id_country = $_GET["id_country"];
        $sql = "UPDATE city SET name='$name' , type='$type' WHERE id_city=$id_city";
        if($mysqli->query($sql)){
            header("location: admin.php?id_country=$id_country");
        }  
    }

?>