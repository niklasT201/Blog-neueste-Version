<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login Page</title>
</head>
<body>
<?php session_start();
include_once "connect.php";
if(isset($_POST["login"])){
if($_POST["username"]=="" or $_POST["email"]=="" or $_POST["password"]==""){
    echo "<center><h1>Username,Email and Password cannot be empty...!</h1></center>";

}else{
$email=trim($_POST["email"]);
$username=strip_tags(trim($_POST["username"]));
$password=strip_tags(trim($_POST["password"]));
$query=$conn->prepare("SELECT * FROM blog_daten WHERE email=? AND password=?");
$query->execute(array($email,$password));
$control=$query->fetch(PDO::FETCH_OBJ);
if($control>0){
    $_SESSION["username"]=$username;
    header("Location:Login.php");
}
echo "<center><h1>incorrect Password or Email...!</h1></center>";
}
}
?>

<div class="container">
<br><br><center><h1>Log In</h1></center> <br><br><br>
        <form method="post">
        Enter Name: <br>
        <input type="text"  name="username" placeholder="Name" class="form-control my-3 text-body"><br>

        Enter E-Mail:<br>
            <input type="text"  name="email" placeholder="email123@email.com" class="form-control my-3 text-body"> <br>

        Enter Password:<br>
            <input type="text"  name="password" placeholder="**********" class="form-control my-3 text-body"> <br>
            <button class = "btn btn-dark" name="login">Login</button>
        </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>