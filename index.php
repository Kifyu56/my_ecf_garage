<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    // Verification de l'existence du fichier head.php
    $headFilePath = "includes/head.php";

    if (file_exists($headFilePath)) {
        include_once $headFilePath;
    } else {
        echo "Erreur : Impossible de charger le header.";
        exit;
    }
    ?>
</head>


<body>
    <!-- Banniere-->
    <section role="banner">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">

                <?php
                // Verification de l'existence de l'image
                $bannerImgPath = "images/logo/logo.png";

                if (file_exists($bannerImgPath)) {

                    // Image du logo
                    echo "<img src='$bannerImgPath' alt='Logo du garage V.Parrot' class='img-fluid'>";
                } else {

                    // Texte alternatif par défaut
                    echo "<p>Erreur : Impossible de charger le logo dans la baniere.</p>";
                    exit;
                }
                ?>

            </div>
        </div>
    </section>

    <header>
        <?php
        // Verification de l'existence du fichier header.php
        $headerFilePath = "includes/header.php";

        if (file_exists($headerFilePath)) {
            include_once $headerFilePath;
        } else {
            echo "Erreur : Impossible de charger le header.";
            exit;
        }

        ?>
    </header>


    <section id="dynamic-content">
        <!-- Contenu de la section dynamique -->
    </section>
    <footer class="footer-custom">
        <?php
        // Verification de l'existence du fichier footer.php
        $footerFilePath = "includes/footer.php";

        if (file_exists($footerFilePath)) {
            include_once $footerFilePath;
        } else {
            echo "Erreur : Impossible de charger le footer.";
            exit;
        }
        ?>
    </footer>
    <!-- Import de script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
</body>

</html>