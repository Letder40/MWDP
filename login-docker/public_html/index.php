<?php 
$ip_pub = "ip_pub.addr";
include "db.php";
if($_SERVER["REQUEST_METHOD"] == "POST" ){
$title = "Login";
$username = $_POST["username"];
$password = $_POST["password"];

$stmt = $conn->prepare("SELECT username,password from users where username = :username");
$stmt->bindParam(":username", $username);
$stmt->execute();

$data = $stmt->fetchAll();
$savedPassword = $data[0]["password"];
if(password_verify($password, $savedPassword)){
    header("Logged_in: true");
    header("Location: http://$ip_pub:80");
    die();
}else{
    $errorText = "Credenciales invalidas";
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
    <header class="default-flex">LOGIN</header>
    <div id="main-container" class="default-flex">
        <form action="" method="post">
            <h2>INICIAR SESIÓN</h2>
            <p id="errText"><?php echo $errorText ?></p>
            <div id="form-object1" class="default-flex">
                <input type="text" name="username">
            </div>
            <div id="form-object2" class="default-flex">
                <input type="password" name="password">
            </div>
            <div id="form-object3" class="default-flex">
                <input type="submit" value="login">
                <input type="button" value="registrarme" onclick='location.href = "http:/\/<?php echo $ip_pub ?>:8081" '>
            </div>
        </form>
    </div>
</body>
</html>
