<?php session_start(); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom" aria-label="Menu principal">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/sections/accueil.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sections/services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sections/usedCars.php">Voitures d'occasion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sections/contact.php">Contact</a>
                </li>

                <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] && $_SESSION['user_role'] === 'admin') : ?>
                    <!-- Onglets supplémentaires pour l'admin -->
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/dashboard_admin.php">Dashboard Admin</a>
                    </li>
                <?php endif; ?>

            </ul>
            <form class="d-flex ms-auto">
                <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) : ?>
                    <a id="logoutButton" class="btn btn-outline-danger" href="/sections/logout.php">Se déconnecter</a>
                <?php else : ?>
                    <a id="loginButton" class="btn btn-outline-success" href="/sections/login.php">Se connecter</a>
                <?php endif; ?>
            </form>
        </div>
    </div>
</nav>