<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tupad Record Management</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .navbar-custom {
            background-color: #343a40; /* Custom background color */
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff; /* Custom text color */
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes typeWriter {
            from { width: 0; }
            to { width: 80%; }
        }

        h1 {
    font-size: 150px;
    text-align: center;
    overflow: hidden; /* Hide overflow text */
    white-space: nowrap; /* Prevent text wrapping */
    animation: typeWriter 5s steps(20) infinite alternate; /* Apply animation */
    color: #343a40; /* Text color */
    position: absolute; /* Positioning */
    top: 50%; /* Move to 50% from the top */
    left: 50%; /* Move to 50% from the left */
    transform: translate(-50%, -50%); /* Centering trick */
}

    </style>
</head>
<body>
    <?php
    // PHP array to hold the menu items
    $menuItems = [
        ['name' => 'Home', 'link' => '#'],
        ['name' => 'Beneficiaries', 'link' => 'add_beneficiaries.php'],
        ['name' => 'Employees', 'link' => 'add_employees.php'],
    ];
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="#">Tupad Record</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <?php foreach ($menuItems as $item): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $item['link']; ?>"><?php echo $item['name']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
    <h1>Coming Soon...</h1>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
