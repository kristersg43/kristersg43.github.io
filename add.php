<?php 
include 'db.php';
include 'styles.css';

if(isset($_POST['send'])) {
    
    $name = $_POST['task'];

    $sql = "insert into tasks (name) values ('$name')";

    $val = $db->query($sql);
    header('location: index.php'); //Go back to index
}

?>