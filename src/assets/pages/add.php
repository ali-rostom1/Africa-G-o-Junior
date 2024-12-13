<?php
    include "dbConn.php";
    //add country 
    if(isset($_POST["name"]) && isset($_POST["pop"]) && isset($_POST["lang"]) && isset($_GET["id_continent"])){
        $name = $mysqli->real_escape_string(trim($_POST["name"]));
        $pop = (int)$_POST["pop"];
        $lang = $mysqli->real_escape_string(trim($_POST["lang"]));
        $id_continent = (int)$_GET["id_continent"];
        
        $flag=0;
        $error="";

        $sql = "SELECT COUNT(*) FROM country WHERE name='$name'";
        if($mysqli->query($sql)->fetch_assoc()["COUNT(*)"]){
            $flag = 1;
            $error .="duplicate name<br>";
        }
        if(preg_match('~[0-9]+~', $name)) {
            $flag = 1;
            $error .="name shouldn't contain numbers<br>";
        }
        if(preg_match('~[0-9]+~', $lang)) {
            $flag = 1;
            $error .="languages shouldn't contain numbers<br>";
        }
        if($pop <= 0){
            $flag = 1;
            $error .="population should be positive<br>";
            header("location: index.php");
        }
        if($flag){
            header("location: form.php?add&id_continent=$id_continent&error=".urlencode($error));
            exit;
        } 
        $sql = "INSERT INTO country(name,pop,lang,id_continent) VALUES('$name',$pop,'$lang',$id_continent)";
        $mysqli->query($sql);
        $sql = "SELECT id_country from country WHERE name='$name'";
        $res = $mysqli->query($sql);
        $res = $res->fetch_assoc();
        $res = $res["id_country"];
        header("location: admin.php?id_country=$res");
    }
    //add city
    if(isset($_POST["name"]) && isset($_POST["type"]) && isset($_GET["id_country"])){
        $name = $mysqli->real_escape_string(trim($_POST["name"]));
        $type = $mysqli->real_escape_string(trim($_POST["type"]));
        $id_country = (int)$_GET["id_country"];

        $flag=0;
        $error="";
        $sql = "SELECT COUNT(*) FROM city WHERE name='$name'";
        if($mysqli->query($sql)->fetch_assoc()["COUNT(*)"]){
            $flag = 1;
            $error .="duplicate name<br>";
        } 
        if(preg_match('~[0-9]+~', $name)) {
            $flag = 1;
            $error .="name shouldn't contain numbers<br>";
        }
        if($type != "Capital" && $type != "other") {
            $flag = 1;
            $error .="wrong type(only Capital/other)<br>";
        }

        if($flag){
            header("location: form.php?add&id_country=$id_country&error=".urlencode($error));
            exit;
        }
        $sql = "INSERT INTO city(name,type,id_country) VALUES('$name','$type',$id_country)";
        $mysqli->query($sql);
        header("location: admin.php?id_country=$id_country");
    }
?>