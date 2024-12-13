<?php
    include "dbConn.php";
    if(isset($_POST["name"]) && isset($_POST["pop"]) && isset($_POST["lang"]) && isset($_GET["id_country"]) && !isset($_GET["id_city"])){
        $name = $mysqli->real_escape_string(trim($_POST["name"]));
        $pop = (int)$_POST["pop"];
        $lang = $mysqli->real_escape_string(trim($_POST["lang"]));
        $id_country = (int)$_GET["id_country"];
        if($_GET["name"] != $_POST["name"]){
            $sql = "SELECT COUNT(*) FROM country WHERE name='$name'";
            if($mysqli->query($sql)->fetch_assoc()["COUNT(*)"]){
                header("location: form.php?id_country=$id_country&error=".urlencode("duplicate name"));
                exit;
            }
        }
        if($pop<=0){
            header("location: form.php?id_country=$id_country&error=".urlencode("population should be positive"));
            exit;
        }
        if (preg_match('~[0-9]+~', $name)) {
            header("location: form.php?id_country=$id_country&error=".urlencode("name shouldn't contain numbers"));
            exit;
        }
        if (preg_match('~[0-9]+~', $lang)) {
            header("location: form.php?id_country=$id_country&error=".urlencode("languages shouldn't contain numbers"));
            exit;
        }
        $sql = "UPDATE country SET name='$name' , pop=$pop , lang='$lang' WHERE id_country=$id_country";
        if($mysqli->query($sql)){
            header("location: admin.php");
        }
    }
    if(isset($_POST["name"]) && isset($_POST["type"]) && isset($_GET["id_country"]) && isset($_GET["id_city"])){
        $name = $mysqli->real_escape_string(trim($_POST["name"]));
        $type = $mysqli->real_escape_string(trim($_POST["type"]));
        $id_city = (int)$_GET["id_city"];
        $id_country = (int)$_GET["id_country"];
        if($_GET["name"] != $_POST["name"]){
            $sql = "SELECT COUNT(*) FROM city WHERE name='$name'";
            if($mysqli->query($sql)->fetch_assoc()["COUNT(*)"]){
                header("location: form.php?id_country=$id_country&id_city=$id_city&error=".urlencode("duplicate name"));
                exit;
            }
        }   
        if($type != "Capital" && $type != "other"){
            header("location: form.php?id_country=$id_country&id_city=$id_city&error=".urlencode("wrong type(only Capital/other)"));
            exit;
        }
        if (preg_match('~[0-9]+~', $name)) {
            header("location: form.php?id_country=$id_country&id_city=$id_city&error=".urlencode("name shouldn't contain numbers"));
            exit;
        }
        $sql = "UPDATE city SET name='$name' , type='$type' WHERE id_city=$id_city";
        if($mysqli->query($sql)){
            header("location: admin.php?id_country=$id_country");
        }
    }

?>