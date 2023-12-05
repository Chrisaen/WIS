<?php

// Database configuration
$servername = "localhost";  
$username = "root";          
$password = "";         
$dbname = "PHPScriptDemo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example 1: SELECT query
$sqlSelect = "SELECT * FROM Student";
$resultSelect = $conn->query($sqlSelect);

// Display results
if ($resultSelect->num_rows > 0) {
    echo "<h2>Student Table</h2>";
    while ($row = $resultSelect->fetch_assoc()) {
        echo "StudentID: " . $row["StudentID"] . " - Name: " . $row["FirstName"] . " " . $row["LastName"] . "<br>";
    }
} else {
    echo "0 results";
}

// Example 2: INSERT query
$sqlInsert = "INSERT INTO Course (CourseID, CourseName, Credits) VALUES (101, 'Introduction to PHP', 3)";
if ($conn->query($sqlInsert) === TRUE) {
    echo "New course added successfully<br>";
} else {
    echo "Error adding course: " . $conn->error . "<br>";
}

// Example 3: UPDATE query
$sqlUpdate = "UPDATE Student SET Phone = '999-888-7777' WHERE StudentID = 2";
if ($conn->query($sqlUpdate) === TRUE) {
    echo "Phone number updated successfully<br>";
} else {
    echo "Error updating phone number: " . $conn->error . "<br>";
}

// Close the database connection
$conn->close();

?>
