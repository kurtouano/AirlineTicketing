<?php
  session_start();

  $conn = mysqli_connect("localhost", "root", "", "webdev");

    if (!$conn) {
      echo 'Connection Error' . mysqli_connect_error();
    }

    $id = $_SESSION['id'];
    $passengers = $_SESSION['passengers'];
    $from = $_SESSION['from'];
    $to = $_SESSION['to'];
    $date = $_SESSION['date'];
    $passengers = $_SESSION['passengers'];
    $totalprice = ($passengers * 14000) + 500;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $payment_type = $_POST['payment_type'];
    $card_name = $_POST['card_name'];
    $card_number = $_POST['card_number'];
    $card_expiration = $_POST['card_expiration'];
    $card_cvv = $_POST['card-cvv'];

    $sqlInsertBooking = "INSERT INTO booking_list (id, from_country, chosen_country, chosen_date, passengers, current_date_time) VALUES ('$id', '$from', '$to', '$date', '$passengers', NOW())";
    $sqlInsertPayment = "INSERT INTO payment_list (id, f_name, l_name, email, payment_type, card_name, card_number, card_expiration, card_cvv) VALUES ('$id', '$f_name', '$l_name', '$email', '$payment_type', '$card_name', '$card_number', '$card_expiration', '$card_cvv')";

    // Execute the first SQL statement
    if (mysqli_query($conn, $sqlInsertBooking)) {
      // Execute the second SQL statement only if the first one was successful
      if (mysqli_query($conn, $sqlInsertPayment)) {
        header("Location: myticket.php");
        exit();
      } else {
        echo "Error: " . $sqlInsertPayment . "<br>" . mysqli_error($conn);
      }
    } else {
      echo "Error: " . $sqlInsertBooking . "<br>" . mysqli_error($conn);
    }
  }

  mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">

    <style>
      .billing-address {
        color: black;
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
                      <li><a href="myticket.php" class="nav-link px-2 text-white">My Ticket</a></li>
                  </ul>
          
                  <form class="search-bar-div col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                      <input type="search" class="search search-input form-control form-control-dark text-bg-dark" id="searchInput"placeholder= 'Search a Country' autocomplete="off" oninput="showSuggestions()";>
                      <div class="suggestions"></div>
                  </form>
                  
                  <a href="index.php"><button type="button" class="btn btn-warning"><img style="margin-right: 10px;" width="20" height="20" src="https://img.icons8.com/ios-filled/50/airplane-take-off.png" alt="airplane-take-off"/>Book Now</button></a>
        </header>

    <div class="payment-section container">
        <main>
          <div class="py-5 text-center">
            <h2>Booking Payment</h2>
            <p class="lead">Fill out your personal details and select from a range of payment methods for your booking ticket payment.</p>
          </div>
          <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Payment Summary</span>
                <span class="badge bg-primary rounded-pill">3</span>
              </h4>
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                  <div>
                    <h6 class="my-0">Plane Ticket</h6>
                  </div>
                  <span class="text-body-secondary">PHP 14,000</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                  <div>
                    <h6 class="my-0">Services</h6>
                  </div>
                  <span class="text-body-secondary">PHP 500</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                      <h6 class="my-0">Number of Passengers</h6>
                    </div>
                    <span class="text-body-secondary"><?php echo $passengers ?></span>
                  </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span>Total (PHP)</span>
                  <strong><?php echo $totalprice ?></strong>
                </li>
              </ul>
            </div>
            <div class="col-md-7 col-lg-8">
              <h4 class="mb-3">Billing Address</h4>
              
              <form id="paymentForm" class="billing-address needs-validation" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="row g-3">
                  <div class="col-sm-6">
                    <label for="f_name" class="form-label">First name</label>
                    <input type="text" class="form-control" id="f_name" name="f_name" placeholder="" value="" required>
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                  </div>
      
                  <div class="col-sm-6">
                    <label for="l_name" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="l_name" name="l_name" placeholder="" value="" required>
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>
      
                  <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                    <div class="invalid-feedback">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>
      
                <hr class="my-4">
      
                <h4 class="mb-3">Payment</h4>
      
                <div class="my-3">
                    <div class="form-check">
                        <input id="credit" name="payment_type" type="radio" class="form-check-input" value="credit" checked="" required>
                        <label class="form-check-label" for="credit">Credit card</label>
                    </div>
                    <div class="form-check">
                        <input id="debit" name="payment_type" type="radio" class="form-check-input" value="debit" required>
                        <label class="form-check-label" for="debit">Debit card</label>
                    </div>
                    <div class="form-check">
                        <input id="paypal" name="payment_type" type="radio" class="form-check-input" value="paypal" required>
                        <label class="form-check-label" for="paypal">PayPal</label>
                    </div>
                </div>

                <div class="row gy-3">
                  <div class="col-md-6">
                    <label for="card_name" class="form-label">Name on card</label>
                    <input type="text" class="form-control" id="card_name" name="card_name" placeholder="" required>
                    <small class="text-body-secondary">Full name as displayed on card</small>
                    <div class="invalid-feedback">
                      Name on card is required
                    </div>
                  </div>
      
                  <div class="col-md-6">
                    <label for="card_number" class="form-label">Credit card number</label>
                    <input type="text" class="form-control" id="card_number" name="card_number" placeholder="" required>
                    <div class="invalid-feedback">
                      Credit card number is required
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="card_expiration" class="form-label">Expiration</label>
                    <input type="text" class="form-control" id="card_expiration" name="card_expiration" placeholder="" required>
                    <div class="invalid-feedback">
                      Expiration date required
                    </div>
                  </div>
      
                  <div class="col-md-3">
                    <label for="card-cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" id="card-cvv" name="card-cvv" placeholder="" required>
                    <div class="invalid-feedback">
                      Security code required
                    </div>
                  </div>
                </div>
      
                <hr class="my-4">
      
                <input class="w-100 btn btn-primary btn-lg" type="submit"></input>
              </form>
            </div>
          </div>
        </main>
      
        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
          <p class="mb-1">© 2017–2023 Flynext</p>
        </footer>
      </div>
  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>