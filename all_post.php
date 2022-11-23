<?php

session_start();
include 'include/env.php';

$query = "SELECT * FROM all_post";
// $query = "SELECT * FROM all_post WHERE author = 'belal'";  //for single person query

$result = mysqli_query($conn, $query);

// print_r(mysqli_num_rows($result));

$posts = mysqli_fetch_all($result, 1);

// var_dump($posts);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Post</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="./src/post-card.png">


  <style>

  </style>
</head>

<body>

  <!-- ----------for nav--------- -->


  <nav class=" col-6 mx-auto rounded navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand " href="index.php">Article Post</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="all_post.php">All Post</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>


  <!-- ------php for successs massage------- -->


  <!-- -------------toast massage for success------ -->
  <?php
  if (isset($_SESSION['success'])) {
  ?>
    <div class="toast show" role="alert" style="position:absolute;bottom:20px;right:20px;" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Article Post</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        <?= $_SESSION['success'] ?>
      </div>
    </div>
  <?php
  }
  ?>

  <!-- -------------table------ -->

  <!-- <div class="container col-8"> -->
  <table class="table table-responsive">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Post Title</th>
        <th scope="col">Post Details</th>
        <th scope="col">Author</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <!-- -------php code------ -->
    <?php
    foreach ($posts as $key => $post) {
    ?>


      <tbody>
        <tr>
          <th scope="row"><?= ++$key ?></th>
          <td><?= $post['title'] ?></td>
          <td><?= strlen($post['details']) > 50 ? substr($post['details'], 0, 50) . "...." : $post['details'] ?></td>
          <td><?= $post['author'] ?></td>
          <td>

            <div class="btn-group " role="group" aria-label="Basic mixed styles example">
              <button type="button" class="btn btn-danger">

                <a class="btn" href="./show_post.php?id= <?= $post['id'] ?>">Show</a>
              </button>
              <button type="button" class="btn btn-warning">

                <a class="btn" href="./edit_post.php?id= <?= $post['id'] ?>">Edit</a>
              </button>

              <button type="button" class="btn btn-success">

                <a class="btn" href="./controller/delete.php?id= <?= $post['id'] ?>">Delete</a>
              </button>
            </div>

          </td>
        </tr>



      </tbody>

    <?php
    }
    ?>

    <?php
    if (mysqli_num_rows($result) == 0) {
    ?>

      <tr class="text-center">
        <td colspan="5"><?= "No Post Hare😭" ?></td>
      </tr>

    <?php
    }
    ?>

  </table>




  <!-- </div> -->

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>


<!-- //session end -->
<?php
session_unset();
?>