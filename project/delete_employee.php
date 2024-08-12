<?php
include 'db_config.php';

// Check if employee ID is received
if (isset($_POST['employeeid'])) { // Change to 'employeeid'
    $employee_id = $_POST['employeeid']; // Change to 'employeeid'

    // Prepare and execute delete query
    $sql = "DELETE FROM employees WHERE employeeid='$employee_id'";
    if ($conn->query($sql) === TRUE) {
        // Deletion successful
        echo "Employee deleted successfully";
    } else {
        // Deletion failed
        echo "Error deleting employee: " . $conn->error;
    }
} else {
    // Employee ID not received
    echo "Employee ID not provided";
}

$conn->close();
?>
