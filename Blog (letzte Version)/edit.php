<?php 
include_once "postlogic.php";

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the post based on the 'id'
    $sql = "SELECT * FROM postdaten WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Blog</title>
</head>
<body>

<div class="container mt-5">
        <?php if ($post) { ?>
            <form method="POST">
                <input type="text" hidden value='<?php echo $post['id']; ?>' name="id">
                <input type="text" placeholder="Blog Title" class="form-control my-3 bg-dark text-white text-center" name="title" value="<?php echo $post["title"]; ?>">
                <textarea name="content" class="form-control my-3 bg-dark text-white"><?php echo $post['content'] ?></textarea>
                <button name="update" class="btn btn-dark">Update</button>
            </form>
        <?php } else { ?>
            <p>Post not found.</p>
        <?php } ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

   