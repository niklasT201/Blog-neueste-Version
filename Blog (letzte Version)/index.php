<?php 
include_once "postlogic.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Blog</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<nav class="nav justify-content-center fixed-top navbar-dark bg-dark" style="position: fixed;">
		<form class="form-inline my-lg-3">
		<div class="container-fluid">
			<a class="navbar-brand" href="Registrieren.php">Registrieren</a>
			<a class="navbar-brand" href="Login.php">Log In</a>
		</div>
		</form>
	  </nav>
    <br>
<div class="container mt-5">
    <?php if(isset($_REQUEST['info'])){?>
        <?php if($_REQUEST['info']=="added"){?>
            <div class="alert alert-success" role="alert">
                 Post was added
             </div>

        <?php } else if ($_REQUEST['info'] == "updated"){?>
            <div class="alert alert-success" role="alert">
                 Post was updated
             </div>
        
             <?php } else if ($_REQUEST['info'] == "deleted"){?>
            <div class="alert alert-danger" role="alert">
                 Post was deleted
             </div>
             
        <?php } else if ($_REQUEST['info'] == "signedin"){?>
            <div class="alert alert-success" role="alert">
                You Are Now Logged In
            </div>


            <nav class="nav justify-content-center fixed-top navbar-dark bg-dark" style="position: fixed;">
		<form class="form-inline my-lg-3">
		<div class="container-fluid">
			<a class="navbar-brand" href="Ausloggen.php">Ausloggen</a>
		</div>
		</form>
	  </nav>
      
           
        <?php } ?>
    <?php } ?>

    <br>
		
        <div class="row">
           <?php
        $sql = "SELECT * FROM postdaten";
        $stmt = $conn->query($sql);
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($posts as $q) {
        ?>
            <div class="col-4 d-flex justify-content-center align-items-center">
                <div class="card text-white bg-dark mt-5">
                    <div class="card-body" style="width: 18rem;">
                        <h5 class="card-title"><?php echo $q['title']; ?></h5>
                        <p class="card-text"><?php echo $q['content']; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

