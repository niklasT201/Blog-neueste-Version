<?php session_start();
if (!isset($_SESSION["username"])){
    header("location:login1.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div>
    <h1>
        Welcome <?php echo $_SESSION["username"];?><br>
        Login Success...<br><br>
        <a href="index2.php?info=signedin">Angemeldet Bleiben</a>
        <a href="logout.php">Exit</a>
    </h1></div>
</body>
</html>