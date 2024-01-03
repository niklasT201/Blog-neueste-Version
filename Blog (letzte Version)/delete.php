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

    // Check if the post exists
    if (!$post) {
        echo "<p>Post not found.</p>";
        exit();
    }

    // Check if the delete button is clicked
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM postdaten WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Redirect to index.php after deleting
        header("Location: index.php?info=deleted");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Delete Post</title>
</head>
<body>

<div class="container mt-5">
    <form method="POST">
        <input type="text" hidden value='<?php echo $post['id']; ?>' name="id">
        <h2>Are you sure you want to delete this post?</h2>
        <p>Title: <?php echo $post['title']; ?></p>
        <p>Content: <?php echo $post['content']; ?></p>
        <button name="delete" class="btn btn-danger">Delete</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
