<?php
include 'db.php';

$sql = "SELECT articles.title, articles.content, authors.name AS author, categories.name AS category 
        FROM articles 
        JOIN authors ON articles.author_id = authors.id 
        JOIN categories ON articles.category_id = categories.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Title</th><th>Content</th><th>Author</th><th>Category</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['title']}</td><td>{$row['content']}</td><td>{$row['author']}</td><td>{$row['category']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
