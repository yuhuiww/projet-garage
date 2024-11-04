// Sélectionne le menu
var menu = document.querySelector('.menu');

// Vérifie si le menu existe pour éviter les erreurs
if (menu) {
    // Ajoute un écouteur d'événements pour le défilement de la fenêtre
    window.addEventListener('scroll', function() {
        // Obtient la position de défilement verticale actuelle de la fenêtre
        var scrollPosition = window.scrollY;

        // Détermine la hauteur du menu pour ajuster le seuil de transparence
        var menuHeight = menu.offsetHeight;

        // Applique la transparence complète si la position de défilement est plus grande que la hauteur du menu
        if (scrollPosition > menuHeight) {
            menu.classList.add('transparent');
        } else {
            menu.classList.remove('transparent');
        }
    });
}
