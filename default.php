<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// database connection here
$conn = new mysqli('127.0.0.1:3306', 'u727120965_project', 'Rokie123@', 'u727120965_projectly');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO portfolio (name, email, message) VALUES (?, ?, ?)");
if ($stmt === false) {
    die('Error in SQL query: ' . $conn->error);
}

// Bind parameters and execute the statement
$stmt->bind_param("sss", $name, $email, $message);
$result = $stmt->execute();

if ($result === false) {
    die('Error executing the query: ' . $stmt->error);
}

$stmt->close();
$conn->close();

// Display an alert and redirect to index.html after successful submission
echo '<script>alert("Data Sent Successfully"); window.location.href = "index.html";</script>';
exit(); // Make sure to exit after sending the alert



// $file = 'assets/resume/SurbhiJainResume.pdf';

// if (file_exists($file)) {
//     header('Content-Type: application/octet-stream');
//     header('Content-Disposition: attachment; filename="SurbhiJainResume.pdf"');
//     header('Content-Length: ' . filesize($file));
//     readfile($file);
//     exit;
// } else {
//     echo "File not found.";
// }
// 
// 
?>
