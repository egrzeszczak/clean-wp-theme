<?php
/*
    Stylesheets
*/
function load_css()
{
    wp_register_style(
        "stylesheet",
        get_template_directory_uri() . "/css/style.css",
        array(),
        false,
        "all"
    );
    wp_enqueue_style("stylesheet");
}
add_action("wp_enqueue_scripts", 'load_css');

/*
    JavaScript
*/
function load_js() {
    wp_register_script( 
        "javascript", 
        get_template_directory_uri( ) . "/js/script.js", 
        "", 
        false, 
        true );
    wp_enqueue_script( "javascript" );
}

add_action( "wp_enqueue_scripts", "load_js" );

/*
    Menu
*/
add_theme_support("menus");
register_nav_menus(
    array(
        'navigation' => "Navigation",
    )
);

add_theme_support("widgets");
function load_sidebar()
{
    register_sidebar(array(
        'name' => 'Pasek boczny',
        'id' => 'sidebar',
        'before_title' => "<h3>",
        'after_title' => "</h3>"
    ));
}
add_action("widgets_init", 'load_sidebar');

/*
    Zmień logo
*/
function change_login_logo()
{
    ?>
        <style type="text/css">
        body.login div#login h1 a{
            background-image: url(/wp-content/themes/wp-theme-from-scratch/login.svg);
            padding-bottom: 30px;
        }
        </style>
    <?php
}
add_action("login_enqueue_scripts", "change_login_logo");

