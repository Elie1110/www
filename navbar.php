<style>
/* Styles pour la navbar */
.navbar {
    background-color: #dc3545; /* Couleur de fond de la navbar */
    padding: 10px 20px; /* Espacement interne */
}

/* Styles pour le logo (navbar-brand) */
.navbar-brand {
    font-size: 24px;
    font-weight: bold;
    color: black; /* Couleur du texte */
    text-decoration:underline
}

/* Styles pour les liens dans la navbar */
.navbar-nav .nav-link {
    font-size: 18px;
    color: black; /* Couleur du texte */
    text-decoration: none;
    padding: 8px 12px; /* Espacement interne des liens */
}

.navbar-nav .nav-link:hover {
    background-color:deepskyblue; /* Couleur de fond au survol */
    border-radius: 5px; /* Coins arrondis au survol */
}

/* Styles pour le bouton "Logout" */
.navbar-nav .btn-outline-danger {
    font-size: 16px;
    color: #dc3545; /* Couleur du texte */
    border-color: #dc3545; /* Couleur de la bordure */
    border-radius: 5px; /* Coins arrondis */
    padding: 8px 16px; /* Espacement interne */
    margin-left: 10px; /* Marge entre le lien et le bouton */
}

.navbar-nav .btn-outline-danger:hover {
    background-color: #dc3545; /* Couleur de fond au survol */
    color: #dc3545; /* Couleur du texte au survol */
}
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/index.php">Car shopping</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
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
