<?php
    include "dbConn.php";
    if(isset($_POST["name"]) && isset($_POST["pop"]) && isset($_POST["lang"]) && isset($_GET["id_continent"])){
        $name = $_POST["name"];
        $pop = $_POST["pop"];
        $lang = $_POST["lang"];
        $id_continent = $_GET["id_continent"];
        $sql = "INSERT INTO country(name,pop,lang,id_continent) VALUES('$name',$pop,'$lang',$id_continent)";
        $mysqli->query($sql);
        $sql = "SELECT id_country from country WHERE name='$name'";
        $res = $mysqli->query($sql);
        $res = $res->fetch_assoc();
        $res = $res["id_country"];
        header("location: admin.php?id_country=$res");
    }
    if(isset($_POST["name"]) && isset($_POST["type"]) && isset($_GET["id_country"])){
        $name = $_POST["name"];
        $type = $_POST["type"];
        $id_country = $_GET["id_country"];
        $sql = "INSERT INTO city(name,type,id_country) VALUES('$name','$type',$id_country)";
        $mysqli->query($sql);
        header("location: admin.php?id_country=$id_country");
    }
?>