<?php
//including the database connection file
include '../connect_bdd.php';
$mysqli = mysqli_connect(SERVEUR, USER, PASSWORD, DATABASE);

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM videogame WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:myvideos.php");