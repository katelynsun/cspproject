<?php
	include 'header.php';
?>

<h1>Article page</h1>

<div class="article-containter">
	<?php
		$sql = "SELECT * FROM genre";
		$result = mysqli_query($conn, $sql);
		$queryResults = mysqli_num_rows($result);

		if ($queryResults > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<div class ='article-box'>
					<h3>".$row[genre]."</h3>
					<p>".$row[artist]."</p>
				</div>";
			}
		}
	?>
</div>

</body>
</html>