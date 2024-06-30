<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    sendMessage($_POST['name'], $_POST['email'], $_POST['message']);
    header('Location: contact.php');
    exit;
}
?>

<form action="contact.php" method="post">
    <label for="name">Name:</label><br />
    <input type="text" id="name" name="name"><br />
    <label for="email">Email:</label><br />
    <input type="email" id="email" name="email"><br />
    <label for="message">Message:</label><br />
    <textarea id="message" name="message"></textarea><br />
    <input type="submit" value="Send">
</form>

<?php
function sendMessage($name, $email, $message) {
    $query = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    mysqli_query($conn, $query);
}
?>