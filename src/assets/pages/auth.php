<?php
    include "dbConn.php";
    
    if(isset($_POST['email'],$_POST['password'])){
        $email = $_POST['email'];
        $sql = 'select * from users where email = ?' ;
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $res = $res->fetch_assoc();
        if($_POST['password'] == $res['pass']){
            if($res['isadmin'] == 1){
                echo 'admin';
            }else{
                header('location: ../../');
            }
        }else{
            header('location: login.php');
        }
    }
?>