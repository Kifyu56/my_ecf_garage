
// Chemin de l'image
let bannerImgPath = "images/logo/logo.png";

// Texte alternatif par défaut
let altText = "Logo du garage V.Parrot";

// Vérification de l'existence de l'image
let img = new Image();
img.onload = function() {
                // L'image est chargée avec succès, remplacez le contenu par l'image
                let bannerContent = document.getElementById("banner-content");
bannerContent.innerHTML = "<img src='" + bannerImgPath + "' alt='" + altText + "' class='img-fluid'>";
            };
    img.onerror = function() {
                // Erreur de chargement de l'image, affichez le texte alternatif par défaut
                var bannerContent = document.getElementById("banner-content");
    bannerContent.innerHTML = "<p>" + altText + "</p>";
            };
    img.src = bannerImgPath;



// Fonction qui permet de charger les pages dans la section dynamique
$(document).ready(function () {

    // Charge la page d'accueil par défaut
    $("#dynamic-content").load("sections/accueil.php");

    // Ecoute la navBar
    $("a.nav-link").click(function (e) {
        
        e.preventDefault(); // Empêche le comportement de lien par défaut

        let page = $(this).attr("href"); // Obtient le lien href

        $.ajax({
            url: page,
            success: function (data) {

                // Met à jour le contenu de la section
                $("#dynamic-content").html(data);

                // Met à jour l'URL (optionnel)
                history.pushState(null, '', page);
            },
            error: function () {
                alert("Erreur lors du chargement de la page");
            }
        });
    });
});

