<?php
    include_once "config.php";
    if(isset($_POST["u_username"]) && isset($_POST["u_password"]) && isset($_POST["u_firstname"]) && isset($_POST["u_lastname"]) ){
        try {
            $sql = "INSERT INTO tb_users (u_username,u_password,u_firstname, u_lastname) VALUES (?,?,?,?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$_POST["u_username"],$_POST["u_password"], $_POST["u_firstname"],$_POST["u_lastname"]]);
            header("location:index.php");
        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }     
?>