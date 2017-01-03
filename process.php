<?php
	require("config/config.php");
	require("lib/db.php");
	$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

	/* escaping */
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$author = mysqli_real_escape_string($conn, $_POST['author']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);

	$sql = "SELECT * FROM user WHERE name='".$author."'";
	$result  = mysqli_query($conn, $sql);

	/* 해당 값이 user table 에 없는 경우, user table에 새로 추가한 후, 그 id 값을 얻어냄 */
	if ( $result->num_rows == 0 ) {
  		$sql = "INSERT INTO user (name, password) VALUES('".$author."', '111111')";
  		mysqli_query($conn, $sql);
  		$user_id = mysqli_insert_id($conn);
	} else {
  		$row = mysqli_fetch_assoc($result);
  		$user_id = $row['id'];
	}

	$sql = "INSERT INTO topic (title,description,author,created) VALUES('".$title."', '".$description."', '".$user_id."', now())";
	$result = mysqli_query($conn, $sql);
	header('Location: index.php');
?>
