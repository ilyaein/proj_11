<?php
displayPosts();
?>

<form action="blog.php" method="post">
    <label for="title">Title:</label><br />
    <input type="text" id="title" name="title"><br />
    <label for="content">Content:</label><br />
    <textarea id="content" name="content"></textarea><br />
    <input type="submit" value="Add Post">
</form>

<?php
if (isset($_POST['title']) && isset($_POST['content'])) {
    addPost($_POST['title'], $_POST['content']);
    header('Location: blog.php');
    exit;
}
?>