<?php
include 'db_config.php';

// Check if beneficiary ID is received
if (isset($_POST['beneficiary_id'])) {
    $beneficiary_id = $_POST['beneficiary_id'];

    // Prepare and execute delete query
    $sql = "DELETE FROM beneficiaries WHERE beneficiariesid='$beneficiary_id'";
    if ($conn->query($sql) === TRUE) {
        // Deletion successful
        echo "Beneficiary deleted successfully";
    } else {
        // Deletion failed
        echo "Error deleting beneficiary: " . $conn->error;
    }
} else {
    // Beneficiary ID not received
    echo "Beneficiary ID not provided";
}

$conn->close();
?>