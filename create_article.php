<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_POST['author_id'];
    $category_id = $_POST['category_id'];

    $sql = "INSERT INTO articles (title, content, author_id, category_id)
            VALUES ('$title', '$content', '$author_id', '$category_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form action="create_article.php" method="post">
    Title: <input type="text" name="title"><br>
    Content: <textarea name="content"></textarea><br>
    Author: <select name="author_id">
        <?php
        $result = $conn->query("SELECT id, name FROM authors");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['name']}</option>";
        }
        ?>
    </select><br>
    Category: <select name="category_id">
        <?php
        $result = $conn->query("SELECT id, name FROM categories");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['name']}</option>";
        }
        ?>
    </select><br>
    <input type="submit" value="Submit">
</form>
