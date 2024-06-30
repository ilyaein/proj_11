<?php
// Connect to database
$conn = mysqli_connect("id22364599_my_db", "id22364599_my_db_un", "13191319WHo?");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Register user
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    registerUser($_POST['username'], $_POST['email'], $_POST['password']);
    header('Location: login.php');
    exit;
}

// Login user
if (isset($_POST['username']) && isset($_POST['password'])) {
    if (loginUser($_POST['username'], $_POST['password'])) {
        header('Location: blog.php');
        exit;
    } else {
        echo 'Invalid username or password';
    }
}

// Display welcome message
echo '<h1>Welcome!</h1>';
echo '<p>Login or register to access more features</p>';
echo '<a href="register.php">Register</a>';
echo '<a href="login.php">Login</a>';

// Register user function
function registerUser($username, $email, $password) {
    // hash password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // insert user into database
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($conn, $query);
}

// Login user function
function loginUser($username, $password) {
    // retrieve user from database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        // check password
        if (password_verify($password, $row['password'])) {
            return true;
        }
    }
    return false;
}

// Add post function
function addPost($title, $content) {
    // insert post into database
    $query = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    mysqli_query($conn, $query);
}

// Display posts function
function displayPosts() {
    // retrieve all posts from database
    $query = "SELECT * FROM posts";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p>" . $row['content'] . "</p>";
    }
}

// Add comment function
function addComment($post_id, $username, $comment) {
    // insert comment into database
    $query = "INSERT INTO comments (post_id, username, comment) VALUES ('$post_id', '$username', '$comment')";
    mysqli_query($conn, $query);
}

// Display comments function
function displayComments($post_id) {
    // retrieve all comments for a specific post
    $query = "SELECT * FROM comments WHERE post_id = '$post_id'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>" . $row['comment'] . "</p>";
        echo "<small>" . $row['username'] . "</small>";
    }
}
?>