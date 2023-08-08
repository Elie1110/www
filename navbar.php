<link rel="stylesheet" href="css/navbar.css" />
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/index.php">Car shopping</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/my_cars.php">My cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Sell a car</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart.php">My cart</a>
                </li>
            </ul>
            <?php
            if (isset($_SESSION['email'])) {
                echo '<ul class="navbar-nav ms-auto mb-2 mb-lg-0">';
                echo '<li class="nav-item">';
                echo '<span class="nav-link">' . $_SESSION['email'] . '</span>';
                echo '</li>';
                echo '<li class="nav-item">';
                echo '<a class="nav-link btn btn-outline-danger" href="?logout=true">Logout</a>';
                echo '</li>';
                echo '</ul>';
            } else {
                echo '<ul class="navbar-nav ms-auto mb-2 mb-lg-0">';
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="/login.php">Login</a>';
                echo '</li>';
                echo '</ul>';
            }

            if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
                session_unset();
                session_destroy();
                header("Location: login.php");
                exit;
            }
            ?>
        </div>
    </div>
</nav>
</div>
</div>
</nav>