<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package becute
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="mt-[37px]">
    <div class="container">
        <div class="flex items-center justify-between">
            <?php the_custom_logo(); ?>

            <nav aria-label="Primary" class="main-navigation">
                <?php
                wp_nav_menu([
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                    'container' => false,
                    // Tailwind-классы на <ul>
                    'menu_class' => 'flex items-center gap-[31px]',
                    // Жёстко задаём разметку UL, чтобы WP не подмешивал контейнер
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ]);
                ?>
            </nav><!-- #site-navigation -->

            <?php echo becute_get_language_switcher(); ?>
        </div>
    </div>
</header>
