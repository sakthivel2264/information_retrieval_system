<?php
include 'db.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $sql = "SELECT * FROM articles WHERE title LIKE '%$query%' OR content LIKE '%$query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Title: " . $row["title"]. " - Content: " . $row["content"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}
?>

<form action="search.php" method="get">
    Search: <input type="text" name="query">
    <input type="submit" value="Search">
</form>
