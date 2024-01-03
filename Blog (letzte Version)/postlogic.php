<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "niklas_stadie";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>Not able to establish Database Connection</h3>";
}

if (isset($_REQUEST["new_post"])) {
    $title = $_REQUEST["title"];
    $content = $_REQUEST["content"];

    $sql = "INSERT INTO postdaten(title, content) VALUES(:title, :content)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->execute();

    header("Location: index2.php?info=added");
    exit();
}

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM postdaten WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

if (isset($_REQUEST["update"])) {
    $id = $_REQUEST['id'];
    $title = $_REQUEST["title"];
    $content = $_REQUEST["content"];

    $sql = "UPDATE postdaten SET title=:title, content=:content WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->execute();

    header("Location: index2.php?info=updated");
    exit();
}

if (isset($_REQUEST['delete'])) {
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM postdaten WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: index2.php?info=deleted");
    exit();
}

if (isset($_REQUEST['back'])) {
    header("Location: index2.php");
    exit();
}
?>
