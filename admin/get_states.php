<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$country = isset($_GET['country']) ? strtolower($_GET['country']) : '';

if ($country === 'india') {
    // Fetch states from 'states' table
    $sql = "SELECT name FROM states";
} else {
    // Fetch states from 'global' table
    $sql = "SELECT name FROM global";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<option value="">Select State</option>';
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . htmlspecialchars($row["name"]) . "'>" . htmlspecialchars($row["name"]) . "</option>";
    }
} else {
    echo '<option value="">No States Found</option>';
}

$conn->close();
?>
