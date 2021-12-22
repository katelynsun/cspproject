<?php
	include 'header.php';
?>

<h1>Search page<h1>

<div class="misty-container">
<?php
    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM misty WHERE genre LIKE '%$search%' OR artist LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        echo "There are ".$queryResult." results!";

    if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<a href='genre.php?title=".$row['genre']."&artist=".$row['artist']><div class ='article-box'>
                    <h3>".$row['genre']."</h3>
                    <p>".$row['artist']."</p>
                </div></a>";
            }
        } else {
            echo "There are no results matching your search.";
        }
    }
?>
</div>