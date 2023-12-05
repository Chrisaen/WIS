<?php

// Database configuration
$servername = "localhost";  
$username = "root";         
$password = "";          
$dbname = "PHPScriptDemo";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the PHPScriptDemo database
$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sqlCreateDatabase) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

// Switch to the PHPScriptDemo database
$conn->select_db($dbname);

// Create the Student table
$sqlCreateStudentTable = "
    CREATE TABLE IF NOT EXISTS Student (
        StudentID INT PRIMARY KEY,
        FirstName VARCHAR(255),
        LastName VARCHAR(255),
        DateOfBirth DATE,
        Email VARCHAR(255),
        Phone VARCHAR(11)
        -- Add other attributes as needed
    )";

if ($conn->query($sqlCreateStudentTable) === TRUE) {
    echo "Student table created successfully\n";
} else {
    echo "Error creating Student table: " . $conn->error . "\n";
}

// Create the Course table
$sqlCreateCourseTable = "
    CREATE TABLE IF NOT EXISTS Course (
        CourseID INT PRIMARY KEY,
        CourseName VARCHAR(255),
        Credits INT
        -- Add other attributes as needed
    )";

if ($conn->query($sqlCreateCourseTable) === TRUE) {
    echo "Course table created successfully\n";
} else {
    echo "Error creating Course table: " . $conn->error . "\n";
}

// Create the Instructor table
$sqlCreateInstructorTable = "
    CREATE TABLE IF NOT EXISTS Instructor (
        InstructorID INT PRIMARY KEY,
        FirstName VARCHAR(255),
        LastName VARCHAR(255),
        Email VARCHAR(255),
        Phone VARCHAR(11)
        -- Add other attributes as needed
    )";

if ($conn->query($sqlCreateInstructorTable) === TRUE) {
    echo "Instructor table created successfully\n";
} else {
    echo "Error creating Instructor table: " . $conn->error . "\n";
}

// Create the Enrollment table
$sqlCreateEnrollmentTable = "
    CREATE TABLE IF NOT EXISTS Enrollment (
        EnrollmentID INT PRIMARY KEY,
        StudentID INT,
        CourseID INT,
        EnrollmentDate DATE,
        Grade VARCHAR(2),
        FOREIGN KEY (StudentID) REFERENCES Student(StudentID),
        FOREIGN KEY (CourseID) REFERENCES Course(CourseID)
        -- Add other attributes as needed
    )";

if ($conn->query($sqlCreateEnrollmentTable) === TRUE) {
    echo "Enrollment table created successfully\n";
} else {
    echo "Error creating Enrollment table: " . $conn->error . "\n";
}

// Close the database connection
$conn->close();

?>
