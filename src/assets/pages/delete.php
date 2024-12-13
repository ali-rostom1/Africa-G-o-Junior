<?php
    include "dbConn.php";
    
    if(isset($_GET["id_country"]) && !isset($_GET["id_city"])){
        $id_country = $_GET["id_country"];
        $sql = "DELETE FROM country where id_country = $id_country";
        $mysqli->query($sql);
        header("location: admin.php");
    }
    if(isset($_GET["id_city"]) && isset($_GET["id_country"])){
        $id_city = $_GET["id_city"];
        $id_country = $_GET["id_country"];
        $sql = "DELETE FROM city where id_city = $id_city";
        $mysqli->query($sql);
        $sql = "SELECT * from city where id_country=$id_country";
        $res = $mysqli->query($sql);
        if($res = $res->fetch_assoc()){
            header("location: admin.php?id_country=$id_country");
            exit;
        }
        $sql = "DELETE FROM country where id_country=$id_country";
        $mysqli->query($sql);
        header("location: admin.php");
    }
    
?>