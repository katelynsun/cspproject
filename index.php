<?php 
	$con = mysqli_connect('localhost', 'root', '', 'like');

	if (isset($_POST['liked'])) {
		$postid = $_POST['postid'];
		$result = mysqli_query($con, "SELECT * FROM posts 
WHERE id=$postid");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($con, "INSERT INTO likes (userid, postid)
VALUES (1, $postid)");

		mysqli_query($con, "UPDATE posts SET likes=$n+1 WHERE
id=$postid");

		echo $n+1;
		exit ();
	}
	if (isset($_POST['unliked'])) {
		$postid = $_POST['postid'];
		$result = mysqli_query($con, "SELECT * FROM posts 
WHERE id=$postid");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];

		mysqli_query($con, "UPDATE posts SET likes=$n-1 WHERE
id=$posted");

		echo $n-1;
		exit();
	}
