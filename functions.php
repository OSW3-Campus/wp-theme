<?php

// Pour savoir si WordPress exécute l'interface de Back-Office, On utilise la 
// fonction is_admin()
// https://developer.wordpress.org/reference/functions/is_admin/
// https://codex.wordpress.org/Function_Reference/is_admin
// is_admin();

// La plupart des fonctions sont déclenchées par des évènements.
// On utilise la méthode "add_action" pour associer le déclenchement d'une 
// fonction à un évènement.
// https://developer.wordpress.org/reference/functions/add_action/

// active la gestion des menus
function register_menu() 
{
    register_nav_menu("new-menu", __("New Menu", "myWpTheme_TextDomain" ));
}
add_action("init", "register_menu");


// Ajout de bootstrap
function load_bootstrap()
{
    if (!is_admin()) {
        // Ajout de Bootstrap CSS
        // https://developer.wordpress.org/reference/functions/wp_enqueue_style/
        wp_enqueue_style("bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css");

        // Ajout de Bootstrap JS
        // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
        wp_enqueue_script("bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js",    ["jquery-3", "popperjs"], false, true);
        wp_enqueue_script("popperjs", "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js",  [], false, true);
        wp_enqueue_script("jquery-3", "https://code.jquery.com/jquery-3.3.1.min.js",                                [], false, true);

    }
}
add_action("wp_loaded", "load_bootstrap");


// Ajout de la balise <title>
function ajoute_le_titre()
{
    if (!is_admin()) {
        add_theme_support("title-tag");
    } 
}
add_action("after_setup_theme", "ajoute_le_titre");


// Supprimer la balise <meta> generator
remove_action("wp_head", "wp_generator");

