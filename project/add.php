<?php
include 'db_config.php';

$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$m_name = $_POST['m_name'];
$age = $_POST['age'];
$contact = $_POST['contact'];
$address = $_POST['address'];

$sql = "INSERT INTO beneficiaries (f_name, l_name, m_name, age, contact, address)
VALUES ('$f_name', '$l_name', '$m_name', '$age', '$contact', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: add_beneficiaries.php"); // Redirect back to the main page
exit();
?>
