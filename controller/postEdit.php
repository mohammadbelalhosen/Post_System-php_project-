<?php
session_start();
include "../include/env.php";
// print_r($_POST);
// exit();



if (isset($_POST['update'])) {

    //all request are define with separate variable
    $id = $_POST['id'];
    $title = $_POST['title'];
    $details = $_POST['details'];
    $author = $_POST['author'];

    $errors = [];

    //error for title
    if (empty($title)) {
        $errors['title'] = "Plz write the post title !";
    }
    //error for details
    if (empty($details)) {

        $errors['details'] = "Plz write the post details !";
    }
    //error for author
    if (empty($author)) {
        $errors['author'] = "Plz write author name !";
    } elseif (strlen($author) > 10) {
        $errors['author'] = "Author name within 10 Character !";
    }

    if (count($errors) > 0) {
        //redirect
        header("location: ../edit_post.php?id= $id");
        $_SESSION['errors'] = $errors;
    } else {
        $query = "UPDATE all_post SET title='$title' ,details='$details',author='$author' WHERE id = $id";
        $res = mysqli_query($conn, $query);

        header("location:../all_post.php");
        $_SESSION['success'] = "Your Post Update Successfully";

        // if ($res) {
        //     header("location:../all_post.php");
        //     $_SESSION['success'] = "Your Post Update Successfully";
        // }
    }
} else {
    // header("location:../edit_post.php");
}
