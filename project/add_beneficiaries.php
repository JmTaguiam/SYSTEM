<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beneficiaries</title>
    <link rel="stylesheet" href="style.css">
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        button {
    padding: 10px 20px; /* Adjust padding as needed */
    background-color: #007bff; /* Button background color */
    color: #fff; /* Button text color */
    border: none; /* Remove button border */
    border-radius: 5px; /* Rounded corners */
    font-size: 16px; /* Button text size */
    cursor: pointer; /* Change cursor to pointer on hover */
}

/* Hover effect */
button:hover {
    background-color: #0056b3; /* Darker background color on hover */
}

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            max-width: 600px;
            box-sizing: border-box;
            animation: modal-entry 0.3s ease-out;
        }

        @keyframes modal-entry {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin: 10px 0 5px;
            width: 100%;
            text-align: left;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin: 5px 0 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 5px 10px;
            margin-top: 5px;
            cursor: pointer;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
        }

        .action-buttons button {
            margin-right: 5px;
        }
        button#addBtn {
    position: absolute;
    top: 100px; /* Adjust as needed */
    right: 50px; /* Adjust as needed */
}

    </style>
</head>
<body>
    <h1>Beneficiaries</h1>
    <button id="addBtn">Add</button>
<br>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="add.php" method="POST">
                <label for="f_name">First Name:</label>
                <input type="text" id="f_name" name="f_name" required><br>
                
                <label for="l_name">Last Name:</label>
                <input type="text" id="l_name" name="l_name" required><br>

                <label for="m_name">Middle Name:</label>
                <input type="text" id="m_name" name="m_name" required><br>

                <label for="age">Age:</label>
                <input type="number" id="age" name="age"><br>

                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" required><br>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required><br>

                <input type="submit" value="Add Beneficiary">
            </form>
        </div>
    </div>
    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Middle Name</th>
            <th>Age</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php
        include 'db_config.php';
        $sql = "SELECT * FROM beneficiaries";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["beneficiariesid"] . "</td>
                        <td>" . $row["f_name"] . "</td>
                        <td>" . $row["l_name"] . "</td>
                        <td>" . $row["m_name"] . "</td>
                        <td>" . $row["age"] . "</td>
                        <td>" . $row["contact"] . "</td>
                        <td>" . $row["address"] . "</td>
                        <td class='action-buttons'>
                            <button>Edit</button>
                            <button>Delete</button>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No beneficiaries found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <br>
    <a href="UI.php"><button>BACK</button></a>

    <script>
    // Function to populate the form fields with row data
    function populateFormFields(row) {
        document.getElementById("f_name").value = row.cells[1].innerText;
        document.getElementById("l_name").value = row.cells[2].innerText;
        document.getElementById("m_name").value = row.cells[3].innerText;
        document.getElementById("age").value = row.cells[4].innerText;
        document.getElementById("contact").value = row.cells[5].innerText;
        document.getElementById("address").value = row.cells[6].innerText;
    }

    // Function to update the row data with the modified values
    function updateRowData(row) {
        row.cells[1].innerText = document.getElementById("f_name").value;
        row.cells[2].innerText = document.getElementById("l_name").value;
        row.cells[3].innerText = document.getElementById("m_name").value;
        row.cells[4].innerText = document.getElementById("age").value;
        row.cells[5].innerText = document.getElementById("contact").value;
        row.cells[6].innerText = document.getElementById("address").value;
    }

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("addBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Get all edit buttons
    var editButtons = document.querySelectorAll('.action-buttons button:nth-of-type(1)');

    // Get all delete buttons
    var deleteButtons = document.querySelectorAll('.action-buttons button:nth-of-type(2)');

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "flex";
        document.querySelector('input[type="submit"]').value = "Add Beneficiary";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Add event listeners to edit buttons
    editButtons.forEach(function(button, index) {
        button.addEventListener('click', function() {
            // Populate the form fields with row data
            var row = button.parentNode.parentNode;
            populateFormFields(row);

            // Change submit button text to "Save"
            document.querySelector('input[type="submit"]').value = "Save";

            // Change event listener to update row data and close modal
// Change event listener to update row data and close modal
document.querySelector('input[type="submit"]').onclick = function(event) {
    event.preventDefault(); // Prevent form submission

    // Assuming you have a PHP file to handle updates named update.php
    var formData = new FormData(); // Create FormData object to send data
    formData.append('f_name', document.getElementById("f_name").value);
    formData.append('l_name', document.getElementById("l_name").value);
    formData.append('m_name', document.getElementById("m_name").value);
    formData.append('age', document.getElementById("age").value);
    formData.append('contact', document.getElementById("contact").value);
    formData.append('address', document.getElementById("address").value);
    formData.append('beneficiary_id', row.cells[0].innerText); // Send beneficiary ID

    fetch('update.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            // Update row data
            updateRowData(row);
            modal.style.display = "none"; // Close modal
        } else {
            alert("Failed to update beneficiary information.");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred while updating beneficiary information.");
    });
};
            // Show the modal
            modal.style.display = "flex";
        });
    });

    // Add event listeners to delete buttons
    deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Confirm before deleting
        if (confirm("Are you sure you want to delete this beneficiary?")) {
            // Get the row of the beneficiary to be deleted
            var row = button.parentNode.parentNode;

            // Get the beneficiary ID from the first cell of the row
            var beneficiaryId = row.cells[0].innerText;

            // Send asynchronous request to delete.php
            fetch('delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'beneficiary_id=' + encodeURIComponent(beneficiaryId)
            })
            .then(response => {
                if (response.ok) {
                    // Remove the row from the table if deletion is successful
                    row.remove();
                } else {
                    // Show an error message if deletion fails
                    alert("Failed to delete beneficiary.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred while deleting beneficiary.");
            });
        }
    });
});
window.onload = function() {
            var isRefreshed = performance.navigation.type === 1;
            if (!isRefreshed) {
                modal.style.display = "none";
            }
        };
</script>

</body>
</html>
