<?php
    include_once "config.php";
    if(isset($_GET["edit"])){
        try{
        $sql = "SELECT * FROM tb_users WHERE id=?";
        $params = array($_GET["edit"]);
        $result = $conn->prepare($sql);
        $result -> execute($params);
        $row = $result->fetch(PDO::FETCH_ASSOC);

 
        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h2>Register</h2>
    <form action="SetEdit.php" method="POST">
        <div>
            <input type="hidden" name="e_id" value="<?php echo $row["id"]; ?>" >
            <label for="">Username :</label>
            <input type="text" name="u_username" value="<?php echo $row["u_username"]; ?>" >
        </div>
        <div>
            <label for="">First Name :</label>
            <input type="text" name="u_firstname" value="<?php echo $row["u_firstname"]; ?>">
        </div>
        <div>
            <label for="">Last Name :</label>
            <input type="text" name="u_lastname" value="<?php echo $row["u_lastname"]; ?>">
        </div>
        <div>
            <input type="submit" value="Update">
            <a href="index.php">Home</a>
        </div>
        
    



    </form>
</body>
</html>