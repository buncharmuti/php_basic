<?php
    include_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        html,body{
            margin:0;
            padding:0;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .container{
            width: 1000px;
            border: 1px solid #ddd;
            margin: 0 auto;
            padding:18px;
        }
        .form-con{

        }
    </style>
</head>
<body>
    <h2>Register</h2>
    <form action="OnRegister.php" method="POST" class="container">
        <div class="form-con">
            <label for="">Username :</label>
            <input type="text" name="u_username">
        </div>
        <div>
            <label for="">Password :</label>
            <input type="password" name="u_password">
        </div>
        <div>
            <label for="">First Name :</label>
            <input type="text" name="u_firstname">
        </div>
        <div>
            <label for="">Last Name :</label>
            <input type="text" name="u_lastname">
        </div>
        <div>
            <input type="submit" value="register">
        </div>
    
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>firstname</th>
                        <th>Lastname</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    try {
                        $sql = "SELECT * FROM tb_users";
                        $params = array("");
                        $result = $conn->prepare($sql);
                        $result -> execute($params);
                        while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                                   echo "<tr>";
                            echo "<td>".$row['u_username']."</td>";
                            echo "<td>".$row['u_firstname']."</td>";
                            echo "<td>".$row['u_lastname']."</td>";
                            echo "<td><a href='./OnEdit.php?edit=".$row['id']."'>edit</a></td>";
                            echo "<td><a href='./OnDelete.php?delete=".$row['id']."'>delete</a></td>";
                            echo "</tr>";
                        }
                       
                    }
                    catch(PDOException $e){
                        echo $sql . "<br>" . $e->getMessage();
                    }
                    $conn = null;
                ?>
                    <!-- <tr>
                        <td>aa</td>
                        <td>aa</td>
                        <td>aa</td>
                    </tr>
                    <tr>
                        <td>aa</td>
                        <td>aa</td>
                        <td>aa</td>
                    </tr> -->
                </tbody>
            </table>
            
        </div>


    </form>
</body>
</html>