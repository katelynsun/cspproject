<?php
	include 'header.php';
?>

<h1>Article page</h1>

<div class="article-containter">
	<?php
		$genre = mysqli_real_escape_string($conn, $_GET['genre']);
		$artist = mysqli_real_escape_string($conn, $_GET['artist']);

		$sql = "SELECT * FROM misty WHERE genre='$genre' AND artist='$artist'";
		$result = mysqli_query($conn, $sql);
		$queryResults = mysqli_num_rows($result);

		if ($queryResults > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<div class ='article-box'>
					<h3>".$row['genre']."</h3>
					<p>".$row['artist']."</p>
				</div>";
			}
		}
	?>
</div>

</body>
</html>