<?php
try {
    $conn=new PDO("mysql:host=localhost;dbname=niklas_stadie","root","");
} catch(PDOException $e) {
    echo $e->getMessage();
}

?>