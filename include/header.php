<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="stylesheet" type="text/css" href="style.css">

  <link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="target">
  <div class="container">

    <header class="jumbotron text-center">
      <img src="https://s3-ap-northeast-1.amazonaws.com/opentutorialsfile/course/94.png" alt="생활코딩" class="img-circle" id="logo">
        <h1><a href="index.php">JavaScript</a></h1>
    </header>
    <div class="row">

        <nav class="col-md-3">
          <ol class="nav nav-pills nav-stacked">
          <?php
          $result = mysqli_query($conn, "SELECT * FROM topic");
          while( $row = mysqli_fetch_assoc($result) ) {
            echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
          }
          ?>
          </ol>
        </nav>

      <div class="col-md-9">