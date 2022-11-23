<?php
// start session
session_start();
include '../include/env.php';

// print_r($_POST);

if (isset($_POST['submit'])) {
    // all errors
    $errors = [];
    //all request are in separate variable
    $request = $_POST;
    $title = $request['title'];
    $details = $request['details'];
    $author = $request['author'];



    //error for title
    if (empty($title)) {
        $error_msg =  "Plz write the post title !";
        $errors['title'] = $error_msg;
    }
    //error for details
    if (empty($details)) {
        $error_msg =  "Plz write the post details !";
        $errors['details'] = $error_msg;
    }
    //error for author
    if (empty($author)) {
        $error_msg = "Plz write author name !";
        $errors['author'] = $error_msg;
    } elseif (strlen($author) > 10) {
        $error_msg = "Author name within 10 Character !";
        $errors['author'] = $error_msg;
    }



    // print_r($errors);


    if (count($errors) > 0) {
        //redirection to index.php
        header("Location:../index.php");

        // some data save on client site for few times

        $_SESSION['errors'] = $errors;
        $_SESSION['oldValue'] = $request;
    } else {
        //    echo "nothing error";
        // //    print_r( $errors);
        

        $query = "INSERT INTO all_post (title, details, author) VALUES (' $title','$details','$author')";

        $insert = mysqli_query($conn, $query);
        if($insert){
            header("location:../index.php");
             $_SESSION['success'] = "Your Post Successfully Submitted";
        }
        // echo "success";

       
    }
} else {
    //if anyone doing another way to submitting form So show this massage

    echo "Please Fill The Form And Submit Post";
};
