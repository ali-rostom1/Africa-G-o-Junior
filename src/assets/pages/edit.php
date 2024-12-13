<?php
    include "dbConn.php";
    if(isset($_POST["name"]) && isset($_POST["pop"]) && isset($_POST["lang"]) && isset($_GET["id_country"])){
        $name = $_POST["name"];
        $pop = $_POST["pop"];
        $lang = $_POST["lang"];
        $id_country = $_GET["id_country"];
        $sql = "UPDATE country SET name='$name' , pop=$pop , lang='$lang' WHERE id_country=$id_country";
        if($res = $mysqli->query($sql)){
            header("location: admin.php");
        }else{
            header("location: index.php");
        }   
    }

?>