<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "webdev");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the specific ticket based on the user's ID
    $sql = "SELECT id, chosen_country, chosen_date, passengers FROM booking_list";
    $result = $conn->query($sql);

    // Close the connection
    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="index.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@500;700&family=Playfair+Display:wght@700&display=swap');
        
        body {
            background-image: url('assets/book-2.png');
            background-size: cover;
        }

        .tickets-section-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .tickets-section { 
            border: 20px solid rgb(25, 35, 45);
            width: 100%;
            max-width: 800px;
            margin: 3%;
            border-radius: 20px;
            background-color: rgb(25, 35, 45);
            box-shadow: 0 0 5px rgb(25, 35, 45);
          }

        .tickets-header {
            font-family: "Mulish";
            font-size: 40px;
            font-style: italic;
            color: white;
            padding: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse:separate;
            border-spacing:0 20px;
        }

        th, td {
            text-align: center;
        }

        .table>:not(caption)>*>* {
          font-family: 'Mulish';
          font-size: 16px;
          padding: 20px 0px;
          border: none;
        }

        .verify {
          top: 50%;
        }

    </style>
</head>

<body>

        <header class="p-3 text-bg-dark" style="z-index: 2;">
            <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center logo mb-2 mb-lg-0 text-white text-decoration-none">
                <!-- <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg> -->
                </a>
        
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="index.php" class="nav-link px-2 text-white">About</a></li>
                    <li><a href="explore.php" class="nav-link px-2 text-white">Explore</a></li>
                    <li><a href="#3" class="nav-link px-2 text-white">My Ticket</a></li>
                </ul>
        
                <form class="search-bar-div col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="search search-input form-control form-control-dark text-bg-dark" id="searchInput"placeholder= 'Search a Country' autocomplete="off" oninput="showSuggestions()";>
                    <div class="suggestions"></div>
                </form>
                
                <a href="index.php"><button type="button" class="btn btn-warning"><img style="margin-right: 10px;" width="20" height="20" src="https://img.icons8.com/ios-filled/50/airplane-take-off.png" alt="airplane-take-off"/>Book Now</button></a>
        </header>

<div class="tickets-section-center">
        <div class="tickets-section">
            <header>
                <div class="tickets-header">My Tickets</div>
            </header>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Chosen Country</th>
                        <th>Chosen Date</th>
                        <th>Passengers</th>
                        <th>Actions</th> <!-- New column for Edit and Delete buttons -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are rows in the result
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["chosen_country"] . "</td>";
                            echo "<td>" . $row["chosen_date"] . "</td>";
                            echo "<td>" . $row["passengers"] . "</td>";
                            echo "<td>";
                            echo "<a href='edit.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit Date</a>";
                            echo "&nbsp;";
                            echo "<a href='refund.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'> Refund </a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No Ticket Found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="search.js"></script>;
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
