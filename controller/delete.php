<?php
session_start();

$id = $_GET['id'];

include '../include/env.php'; // include database

$query = "DELETE FROM all_post WHERE id =$id "; //delete Query
$ex = mysqli_query($conn, $query);  // query execution

header("location:../all_post.php"); //redirection the page

$_SESSION['success'] = "Your Post Deleted Successfully"; //session for save this massage on client site