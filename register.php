<?php
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    registerUser($_POST['username'], $_POST['email'], $_POST['password']);
    header('Location: login.php');
    exit;
}
?>

<form action="register.php" method="post">
    <label for="username">Username:</label><br />
    <input type="text" id="username" name="username"><br />
    <label for="email">Email:</label><br />
    <input type="email" id="email" name="email"><br />
    <label for="password">Password:</label><br />
    <input type="password" id="password" name="password"><br />
    <input type="submit" value="Register">
</form>