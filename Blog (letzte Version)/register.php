<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
<br><br><center><h1>Create Your Account</h1></center><br><br><br> 
    <form method="post">
        Enter Name:<br>
        <input type="text"  name="postsname" placeholder="Name" class="form-control my-3 text-body"> <br>

        Enter E-Mail:<br>
        <input type="text"  name="postmail" placeholder="email123@email.com" class="form-control my-3 text-body"> <br>

        Enter Password:<br>
        <input type="text"  name="password" placeholder="**********" class="form-control my-3 text-body"> <br>

        Enter Password Again:<br>
        <input type="text"  name="repeat" placeholder="Password Again" class="form-control my-3 text-body"> <br>
        <button class = "btn btn-dark" name="new_post">Sign In</button>
    </form>
</div>

<?php
     $servername= "localhost";
     $user = "root";
     $pw = "";
     $db = "niklas_stadie";
 
     session_start();
     try{$conn = new PDO("mysql:host=$servername;dbname=$db",$user,$pw);
//Error reporting, throw exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "<br>";
        echo "<div style=\"text-align:center\">";   
        echo "Connection Successful";
        echo "</div>";
//Fehler abfangen
            } catch(PDOException $e) {
                echo "<div style=\"text-align:center\">";  
                echo "<center>Connection Failed" . "<br>" .  "</div>" . $e->getMessage();
                    } 

if(isset($_POST['new_post'])){
    $postname = $_POST['postsname'];
    $postmail = $_POST['postmail'];
    $postpw = $_POST['password'];
    $postpwa = $_POST['repeat'];

//Überprüfung Textboxen
if(empty($postname) || empty($postmail) || empty($postpw) || empty($postpwa)) {
    echo "<div style=\"text-align:center\">";
    echo  "<br>You Have To Fill in All Boxes";
    echo "</div>";
}else{

//neue Datensätze, insert
$insert = $conn->prepare("INSERT INTO blog_daten(name, email, password, passwordagain) 
    VALUES (:name, :email, :password, :passwordagain)");

//Bindet einen Parameter an den angegebenen Variablennamen
    $insert->bindParam(':name',$postname);
    $insert->bindParam(':email',$postmail);
    $insert->bindParam(':password',$postpw);
    $insert->bindParam(':passwordagain',$postpwa);

//Führt externes Programm aus
    $insert->execute();

    echo "<br>Data Successfully Arrived";
    echo "<div style=\"text-align:center\">";
    echo "</div>";
    header("Location: index.php?info=angemeldet");
    exit();
    	}
    }

    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
</body>
</html>