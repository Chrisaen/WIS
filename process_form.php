<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentinfo";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs (in a production environment, use more robust sanitization methods)
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    // Insert data into the users table
    $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Record created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
}


echo "<h2>Student List</h2>";
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Username: " . $row["username"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}


$conn->close();
?>
