<!-- <?php
session_start();
include 'config.php';

if (isset($_SESSION['email'])) {
    header('Location: member.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form_type'] == 'login') {
    $email = $_POST['email'] ?? null;
    $result = $conn->query("SELECT email FROM students WHERE email = '$email'");
    
    if ($result->num_rows == 1) {
        $_SESSION['email'] = $result->fetch_assoc()['email'];
        header('Location: member.php');
        exit;
    } else {
        echo '<p>Login failed: Invalid credentials.</p>';
    }
}

// Display contents of the table
$selectquery = "SELECT * FROM students";
$result = $conn->query($selectquery);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "name: " . $row['name'] . "<br>email: " . $row['email'] . "<br>course: " . $row['course'] . "<br><br>";
    }
} else {
    echo "No rows are selected";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <input type="hidden" name="form_type" value="login">
        <input type="submit" value="Login">
    </form>
</body>
</html> -->

<?php include 'header.php'; ?>
<?php

include 'config.php';

if (isset($_SESSION['email'])) {
    header('Location: member.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form_type'] == 'login') {
    $email = $_POST['email'] ?? null;
    $result = $conn->query("SELECT email FROM students WHERE email = '$email'");
    
    if ($result->num_rows == 1) {
        $_SESSION['email'] = $result->fetch_assoc()['email'];
        header('Location: member.php');
        exit;
    } else {
        echo '<p>Login failed: Invalid credentials.</p>';
    }
}

// Display contents of the table
$selectquery = "SELECT * FROM students";
$result = $conn->query($selectquery);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "name: " . $row['name'] . "<br>email: " . $row['email'] . "<br>courses: " . $row['courses'] . "<br><br>";
    }
} else {
    echo "No rows are selected";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <input type="hidden" name="form_type" value="login">
        <input type="submit" value="Login">
    </form>
</body>
</html>
<?php include 'footer.php'; ?>