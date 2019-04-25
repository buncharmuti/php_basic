<?php
    include_once "config.php";
    if(isset($_GET["delete"])){
        try {
            $sql = "DELETE FROM tb_users WHERE id = ?";
            echo $sql;
            $params = array($_GET["delete"]);
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