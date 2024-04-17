<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "webdev");

    if (!$conn) {
        echo 'Connection Error' . mysqli_connect_error();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['from'] = $_POST['from'];
        $_SESSION['to'] = $_POST['to'];
        $_SESSION['date'] = $_POST['date'];
        $_SESSION['passengers'] = $_POST['passengers'];
        $id = time();
        $_SESSION['id'] = $id; // pass to other page the variable value
        
        session_write_close();
        
        header("Location: flights.php");
        exit();
    }
 
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>
<body>

        <header class="p-3 text-bg-dark" style="z-index: 2;">
            <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php" class="d-flex align-items-center logo mb-2 mb-lg-0 text-white text-decoration-none">
                </a>
        
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="#about-us" class="nav-link px-2 text-white">About</a></li>
                <li><a href="explore.php" class="nav-link px-2 text-white">Explore</a></li>
                <li><a href="myticket.php" class="nav-link px-2 text-white">My Ticket</a></li>
                </ul>
        
                <form class="search-bar-div col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                  <input type="search" class="search search-input form-control form-control-dark text-bg-dark" id="searchInput"placeholder= 'Search a Country' autocomplete="off" oninput="showSuggestions()";>
                  <div class="suggestions"></div>
                </form>
                
        
                <a href="#book"><button type="button" class="btn btn-warning"><img style="margin-right: 10px;" width="20" height="20" src="https://img.icons8.com/ios-filled/50/airplane-take-off.png" alt="airplane-take-off"/>Book Now</button></a>
        </header>

        <div class="landing-bg-color">
            <div class="landing-bg-img">    
                <div class="container col-xxl-8 px-4 py-5">
                    <div style="position: relative" class="row flex-lg-row align-items-center g-5 py-5">
                        <div style="position: absolute; right: 0; z-index: -2;" class="col-12 col-sm-10 col-lg-8">
                            <img src="assets/Landingpage_image2.png" class="d-block mx-lg-auto img-fluid landingpage_image" alt="Bootstrap Themes" width="1200" height="900" loading="lazy">
                        </div>              
                        <div class="col-lg-6";>
                            <span class="sub-title"><span class="fly-text">Fly</span>next</span>
                            <h1 class="display-5 fw-bold lh-1 mb-3">Omnia Ticketing Airline</h1>
                            <p class="landing-text lead">Welcome to Flynext, your gateway to seamless travel experiences with Omnia Ticketing Airlines. At Flynext, we are dedicated to simplifying your journey from booking to boarding, ensuring every step is as smooth as the flight itself. </p>
                            <a href="explore.php"><button class="explore-btn">Explore</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <img src='assets/book-2.png' style='position: absolute; width: 100%; height: 830px; z-index: -15;'>
    <div class="booking-container" id="book">
        <div class="booking-bg">
        </div>
            <div class="booking-header">
                <p class = "booking-text1"><span>Fly</span>next</p>
                <p class = "booking-text2">Book A Personal Flight</p>
            </div>
            <form id="bookingForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="from">From:</label>
                <select id="from" name="from">
                    <option value="phil">Philippines</option>
                <!-- Add more countries as needed -->
                </select>

                <label for="to">To:</label>
                <select id="to" name="to">
                <option value="Japan">Japan</option>
                <option value="Canada">Canada</option>
                <option value="Singapore">Singapore</option>   
                <!-- Add more countries as needed -->
                </select>

                <label for="date">Date:</label>
                <input class="date" type="date" id="date" name="date" required>

                <label for="passengers">Number of Passengers:</label>
                <input class="passengers" type="number" id="passengers" name="passengers" min="1" required>

                <input class="submit" type="submit" value="Search">
            </form>
      </div>


      <section class="about-us-bg" id="about-us">
      <div class="container my-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center about_content">
          <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h2 class="pb-2"><span style="color: rgb(255, 193, 7);">About</span> Flynext</h2>
            <p class="lead">
                As a leading platform for Omnia Ticketing Airlines, we pride ourselves on delivering exceptional travel solutions, ensuring your journeys are not just trips but remarkable adventures. Our commitment lies in providing unparalleled services, making Flynext your preferred choice for a world-class travel experience.</p>
            <div class="about_booknow">
              <div class="call_book">
                <h3>Call to book an order</h2>
                <h3>8-800-10-500</h2>
              </div>
              <div class="about_button">
                <a href="#book"><button type="button" class="btn btn-warning btn-lg px-4 me-md-2 herobtn">Book now</button></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
              <img class="rounded-lg-3" src="bootstrap-docs.png" alt="" width="720">
          </div>
        </div>
      </div>
    </section>

          <div style="margin-top: 120px;" class="container">
            <footer class="py-3 my-4 border-top">
              <ul class="nav justify-content-center  pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#about-us" class="nav-link px-2 text-body-secondary">About</a></li>
                <li class="nav-item"><a href="#book" class="nav-link px-2 text-body-secondary">Book</a></li>
              </ul>
              <p class="text-center text-body-secondary">© 2023 Flynext, Inc</p>
            </footer>
          </div>

<script src="search.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>