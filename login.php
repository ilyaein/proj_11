<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    if (loginUser($_POST['username'], $_POST['password'])) {
        header('Location: blog.php');
        exit;
    } else {
        echo 'Invalid username or password';
    }
}
?>

<form action="login.php" method="post">
    <label for="username">Username:</label><br />
    <input type="text" id="username" name="username"><br />
    <label for="password">Password:</label><br />
    <input type="password" id="password" name="password"><br />
    <input type="submit" value="Login">
</form>