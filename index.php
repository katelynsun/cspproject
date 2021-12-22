<?php
	include 'header.php';
?>

<form action="search.php" method="POST">
	<input type="text" name="search" placeholder="Search">
	<button type="submit" name="submit-search">Search</button>
</form>

<h1>Front page</h1>
<h2>All articles:</h2>

<div class="misty-containter">
	<?php
		$sql = "SELECT * FROM misty";
		$result = mysqli_query($conn, $sql);
		$queryResults = mysqli_num_rows($result);

		if ($queryResults > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<div class ='misty-box'>
					<h3>".$row['genre']."</h3>
					<p>".$row['artist']."</p>
				</div>";
			}
		}
	?>
</div>

</body>
</html>