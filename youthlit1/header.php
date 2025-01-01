<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username']; // Fetch the logged-in user's username

// Get the current page's filename
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <title>Welcome to YouthLit</title>

    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-softy-pinko.css">
</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="assets/images/yllogo2.png" alt="YouthLit Logo">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="welcome.php" class="<?php echo ($currentPage == 'welcome.php') ? 'active' : ''; ?>">Home</a></li>
                            <li><a href="about.php" class="<?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>">About</a></li>
                            <li><a href="quiz.php" class="<?php echo ($currentPage == 'quiz.php') ? 'active' : ''; ?>">Quiz</a></li>
                            <li><a href="book.php" class="<?php echo ($currentPage == 'book.php') ? 'active' : ''; ?>">Book</a></li>
                            <li><a href="dashboard.php" class="<?php echo ($currentPage == 'dashboard.php') ? 'active' : ''; ?>">Dashboard</a></li>

                            <!-- Username Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo htmlspecialchars($username); ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="profile.php">Favorite</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                </div>
                            </li>
                        </ul>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
