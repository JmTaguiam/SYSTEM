<?php
include 'db_config.php';

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $m_name = $_POST['m_name'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $beneficiary_id = $_POST['beneficiary_id'];

    // Prepare and execute update query
    $sql = "UPDATE beneficiaries SET f_name='$f_name', l_name='$l_name', m_name='$m_name', age='$age', contact='$contact', address='$address' WHERE beneficiariesid='$beneficiary_id'";
    if ($conn->query($sql) === TRUE) {
        // Update successful
        echo "Beneficiary information updated successfully";
    } else {
        // Update failed
        echo "Error updating beneficiary information: " . $conn->error;
    }
} else {
    // Request method is not POST
    echo "Invalid request method";
}

$conn->close();
?>
