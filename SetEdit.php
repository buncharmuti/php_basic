<?php
include_once "config.php";
if(isset($_POST["u_username"])  && isset($_POST["u_firstname"]) && isset($_POST["u_lastname"]) && isset($_POST["e_id"]) ){
    try {
        $sql = "UPDATE tb_users SET u_username = ?, u_firstname = ?, u_lastname = ? WHERE id = ?";
        $params = array($_POST["u_username"], $_POST["u_firstname"],$_POST["u_lastname"],$_POST["e_id"]);
        $result = $conn->prepare($sql);
        $result -> execute($params);
        
        header("location:index.php");
    }
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}     



?>