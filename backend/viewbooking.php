<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$host = "localhost";
$dbname = "hulutravel";
$username = "root";
$password = "";


$conn = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}


$sql = "SELECT * FROM bookingdetails";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    $bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $bookings = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <div id="menu-bar" class="fas fa-bars"></div>
        <img src="assets/logo.jpg" alt="holo-logo" class="logo-img">
        <h1 class="hulutravel">
            <span>H</span>
            <span>U</span>
            <span>L</span>
            <span>U</span>
            <span class="space"></span>
            <span>T</span> 
            <span>R</span>
            <span>A</span>
            <span>V</span> 
            <span>E</span>
            <span>L</span>
        </h1>

        <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="book.php">Book</a>
            <a href="packages.html">Packages</a>
            <a href="services.html">Services</a>
            <a href="gallery.html">Gallery</a>           
            <a href="contact.php">Contact</a>
            <a href="viewbook.php">view bookings</a>
        </nav>
<!-- 
        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn"></i>
        </div>

        <form action="" class="search-bar-container">
            <input type="search" name="" id="search-bar" placeholder="search here... ">
            <label for="search-bar" class="fas fa-search"></label>
        </form> -->
    </header>
     
    <section class="viewbook" id="viewbook">
        <h1 class="heading">
            <span>V</span>
            <span>i</span>
            <span>e</span>
            <span>w</span>
            <span class="space"></span>
            <span>B</span> 
            <span>o</span>
            <span>o</span>
            <span>k</span>
            <span>i</span>
            <span>n</span>
            <span>g</span>
            <span>s</span>
        </h1>

        <div class="bookings-container">
            <?php if (!empty($bookings)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Place Name</th>
                            <th>Number of Guests</th>
                            <th>Arrival Date</th>
                            <th>Leaving Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bookings as $booking): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($booking['placename']); ?></td>
                                <td><?php echo htmlspecialchars($booking['numberofguests']); ?></td>
                                <td><?php echo htmlspecialchars($booking['arrivaldate']); ?></td>
                                <td><?php echo htmlspecialchars($booking['leavingdate']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p style="text-align: center; color: red;">No bookings found.</p>
            <?php endif; ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>