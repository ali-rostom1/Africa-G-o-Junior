<?php
    include "dbConn.php";
    if(isset($_GET["id_country"])){
        $id_country = $_GET["id_country"];
        $sql = "DELETE FROM country where id_country = $id_country";
        $mysqli->query($sql);
    }
    header("location: admin.php");
?>