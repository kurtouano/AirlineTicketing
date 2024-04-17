<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "webdev");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

        if (isset($_GET['id'])) {
            $ticket_id = $_GET['id'];
        } else {
            echo "Error: Ticket ID not provided in the URL";
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submitBtn2'])) {
                header('Location: myticket.php');
                exit();
            } else if (isset($_POST['submitBtn'])) {
            $newDate = $_POST['date'];

            $sqlUpdate1 = "UPDATE booking_list 
                SET chosen_date = '$newDate'
                WHERE id='$ticket_id'";
            $sqlUpdate2 = "UPDATE booking_list 
                SET chosen_date = '$newDate'
                WHERE id='$ticket_id'";

            if (mysqli_query($conn, $sqlUpdate1 )) {
                if (mysqli_query($conn, $sqlUpdate2)) {
                    header('Location: myticket.php');
                    mysqli_close($conn);
                    exit();
                }
            } else {
                echo "Error Updating record: " . mysqli_error($conn);
            }

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ticket Date</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <style>

        body {
          background-image: url('assets/book-2.png');
          background-size: cover;
        }

        .edit {
            font-size: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            background-color: white;
            padding: 3%;
            margin: 5% 36%;
            color: rgb(25,35,45);
        }

        .edit label {
            font-size: 25px;
            font-weight: 700;
            margin-bottom: 20px;
        }


    </style>
</head>
<body>
    
        <header class="p-3 text-bg-dark" style="z-index: 2;">
            <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center logo mb-2 mb-lg-0 text-white text-decoration-none">
                </a>
        
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="index.php" class="nav-link px-2 text-white">About</a></li>
                    <li><a href="explore.php" class="nav-link px-2 text-white">Explore</a></li>
                    <li><a href="myticket.php" class="nav-link px-2 text-white">My Ticket</a></li>
                </ul>
        
                <form class="search-bar-div col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="search search-input form-control form-control-dark text-bg-dark" id="searchInput"placeholder= 'Search a Country' autocomplete="off" oninput="showSuggestions()";>
                    <div class="suggestions"></div>
                </form>
                
                <a href="index.php"><button type="button" class="btn btn-warning"><img style="margin-right: 10px;" width="20" height="20" src="https://img.icons8.com/ios-filled/50/airplane-take-off.png" alt="airplane-take-off"/>Book Now</button></a>
        </header>

        <form class="edit" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $ticket_id; ?>" method="POST">
            <label for="date">Change Date</label>
            <input type="date" name="date" id="date">
            <input class="submit" type="submit" name="submitBtn">
            <input class="submit" type="submit" name="submitBtn2" value="Go back">
        </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>