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

	$posts = mysqli_query($con, "SELECT * FROM posts");
?>
		<?php while ($row = mysqli_fetch_array($posts)) { 
			
			<div class="post">
				<?php echo $row['text']; ?>
				<div style="padding: 2px; margin-top: 5px;">
				<?php
					$result = mysqli_query($con, "SELECT *
FROM likes WHERE userid=1 AND postid=".$row['id']."");
					if (mysqli_num_rows($results) == 1):
?>
						<span class="unlike fa
fa-thumbs-up" data-id="<?php echo $row['id']; ?>"></span>
						<span class="like hide fa
fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span>
						<?php else: ?>

							<span class="like fa
fa-thumbs-o-up" data-id="<?php echo $row['id']; ?>"></span>
							<?php endif ?>
							<span class="unlike fa
fa-thumbs-up" data-id="<?php echo $row['id]; ?>"></span>
						<?php endif?>

						<span class="likes_count"><?php echo
$row['likes']; ?> likes</span>
					</div>
				</div>
			<?php } ?>