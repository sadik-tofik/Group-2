<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

  
    if (empty($name) || empty($email) || empty($number) || empty($subject) || empty($message)) {
        $error_message = "Please fill out all fields.";
    } else {

        $host = "localhost";
        $dbname = "hulutravel";
        $username = "root";
        $password = "";

   
        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (mysqli_connect_errno()) {
            die("Connection error: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO contact (name, email, number, subject, message)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            die(mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "ssiss", $name, $email, $number, $subject, $message);
        mysqli_stmt_execute($stmt);

        $success_message = "Message sent successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

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

        <!-- <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn"></i>
        </div> -->
<!-- 
        <form action="" class="search-bar-container">
            <input type="search" name="" id="search-bar" placeholder="search here... ">
            <label for="search-bar" class="fas fa-search"></label>
        </form> -->
    </header>
     
    <section class="contact" id="contact">
        <h1 class="heading">
            <span>C</span>
            <span>o</span>
            <span>n</span>
            <span>t</span>
            <span>a</span>
            <span>c</span>
            <span>t</span>
        </h1>

        <div class="row">
            <div class="image">
                <img src="assets/27933.jpg" alt="">
            </div>
            
            <form action="" method="POST">
                <div class="inputBox">
                    <input type="text" placeholder="Name" name="name" required>
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="inputBox">
                    <input id="" type="number" placeholder="Number" name="number" required>
                    <input type="text" placeholder="Subject" name="subject" required>
                </div>
                <textarea placeholder="Message" name="message" cols="30" rows="10" required></textarea>
                <input type="submit" class="btn" name="submit" value="Submit">
            </form>

            <?php
            // Display success or error messages
            if (isset($success_message)) {
                echo "<p style='color: green; text-align: center;font-size: 23px;'>$success_message</p>";
            } elseif (isset($error_message)) {
                echo "<p style='color: red; text-align: center; font-size:23px;'>Message wasn't sent </p>";
            }
            ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>