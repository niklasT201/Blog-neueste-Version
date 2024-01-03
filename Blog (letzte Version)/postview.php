<?php
include_once "postlogic.php";

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Fetch the post based on the 'id'
        $sql = "SELECT * FROM postdaten WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        // Display the post content
        if ($post) {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                <title>Blog Post</title>
            </head>
            <body>

            <div class="container mt-5">
                <div class="bg-dark p-5 rounded-lg text-white text-center">
                    <h1><?php echo htmlspecialchars($post['title']); ?></h1>

                    <div class="d-flex mt-2 justify-content-center align-items-center">
                        <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?php echo $post['id']; ?>" class="btn btn-danger">Delete</a>
                        <a href="index2.php?id=<?php echo $post['id']; ?>" class="btn btn-warning">Back</a>
                    </div>

                    <div>
                        <p class="mt-5 border-left border-dark pl-3"><?php echo htmlspecialchars($post['content']); ?></p>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            </body>
            </html>
            <?php
        } else {
            echo "<p>Post not found.</p>";
        }
    } catch (PDOException $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p>Invalid request. Please provide a post ID.</p>";
}
?>
