<?php 
include "db.php";
$ip_pub = "ip_pub.addr";
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    

    $title = "Register";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);
    
   
    try{
    
    $stmt = $conn->prepare("INSERT INTO users (username,password) VALUES (:username,:password) ");
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":password", $encrypted_password);
    $stmt->execute();
    
    header("Location: http://$ip_pub:8080");
    die();
    
    }catch(PDOExepion $e){
        die("Error: $e");
    }
    }
    ?>
       
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header class="default-flex">REGISTRO</header>
        <div id="main-container" class="default-flex">
            <form action="" method="post">
                <h2>REGISTRARSE</h2>
                <div id="form-object1" class="default-flex">
                    <input type="text" name="username" required>
                </div>
                <div id="form-object2" class="default-flex">
                    <input type="password" name="password" required>
                </div>
                <div id="form-object3" class="default-flex">
                    <input type="submit" value="registrarme">
                    <input type="button" value="ir a login" onclick='location.href = "http:/\/<?php echo $ip_pub ?>:8080" '>
                </div>
            </form>
        </div>
    </body>
    </html>
