<?php
// Database connection details
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "university_registration"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Create courses table
/* $sql_create_courses = "CREATE TABLE courses (
    course_id INT(11) PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    description TEXT,
    max_capacity INT(11)
)";
$conn->query($sql_create_courses);

// Create students table 
$sql_create_students = "CREATE TABLE students (
    student_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    course_id INT(11),
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
)";
$conn->query($sql_create_students);


// Insert  courses
$sql_insert_courses = "INSERT INTO courses (course_id, course_name, description, max_capacity)
VALUES
(1, 'Science', 'Science & Technology', 40),
(2, 'Maths', 'Mathematics', 40),
(3, 'Computer', 'Computer Science', 25),
(4, 'English', 'English & Literature', 60),
(5, 'PHP', 'Hypertext Preprocessor', 30)";

if ($conn->query($sql_insert_courses) === TRUE) {
    echo "Courses inserted successfully";
} else {
    echo "Error inserting courses: " . $conn->error;
}
*/

// Fetch courses from the database
$sql = "SELECT course_id, course_name FROM courses";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Registration</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: beige;
            font-size: 24px;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin-bottom: 20px; /* Add margin for separation */
        }

        .message {
            background-color: #f1f1f1;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px; /* Add margin for separation */
        }

        h2 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: calc(100% - 22px); 
            font-size: 20px;
            font-weight: bold;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: blue;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Course Registration</h1>

        <?php
        // Database connection details
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "university_registration"; 

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            echo "<p class='error-message'>Connection failed: " . $conn->connect_error . "</p>";
        } else {
            echo "<p class='connection-message'>Database connected</p>";

            // Fetch courses from the database
            $sql = "SELECT course_id, course_name FROM courses";
            $result = $conn->query($sql);

            ?>

            <div class="form-container">
                <h2>New Registration</h2>

                <form action="demo.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="course">Select a course:</label>
                    <select id="course" name="course" required>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row["course_id"]}'>{$row["course_name"]}</option>";
                            }
                        }
                        ?>
                    </select>

                    <input type="hidden" name="form_type" value="login">
                    <input type="submit" value="Register">
                </form>

                <?php
                // PHP code for registration process
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form_type'] == 'login') {
                    $name = $_POST['name'] ?? '';
                    $email = $_POST['email'] ?? '';
                    $course_id = $_POST['course'] ?? '';

                    $email = isset($_POST['email']) ? $_POST['email'] : null;
                    $result = $conn->query("SELECT email FROM students WHERE email = '$email'");
                    
                    if ($name && $email && $course_id && $email !== null) {
                        $sql = "SELECT (SELECT max_capacity FROM courses WHERE course_id = $course_id) - 
                                (SELECT COUNT(student_id) FROM students WHERE course_id = $course_id) AS available_slots";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            if ($row['available_slots'] > 0) {
                                // Insert student
                                $insert_sql = "INSERT INTO students (name, email, course_id)
                                            VALUES ('$name', '$email', $course_id)";

                                if ($conn->query($insert_sql) === TRUE) {
                                    // Update course capacity
                                    $update_sql = "UPDATE courses
                                                SET max_capacity = max_capacity - 1
                                                WHERE course_id = $course_id";

                                    if ($conn->query($update_sql) === TRUE) {
                                        echo "<p class='message'>New registration successful!</p>";
                                    } else {
                                        echo "<p class='error-message'>Error updating course capacity: " . $conn->error . "</p>";
                                    }
                                } else {
                                    echo "<p class='error-message'>Error inserting student record: " . $conn->error . "</p>";
                                }
                            } else {
                                echo "<p class='error-message'>Selected course is full. Please select another course.</p>";
                            }
                        }
                    }
                }

                ?>

            </div>
        <?php
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
