<?php
/**
 * becute functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package becute
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function becute_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on becute, use a find and replace
		* to change 'becute' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'becute', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'becute' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'becute_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'becute_setup' );


/**
 * Получаем переключатель языков
 *
 * @return false|string
 */
function becute_get_language_switcher() {
    $args       = [
        'dropdown'               => 1,
        'show_names'             => 0,
        'display_names_as'       => 'slug',
        'show_flags'             => 1,
        'hide_if_empty'          => 0,
        'force_home'             => 0,
        'echo'                   => 0,
        'hide_if_no_translation' => 0,
        'hide_current'           => 0,
        'raw'                    => 1
    ];
    $lang_array = pll_the_languages( $args );

    $switcher = '';
    if ( ! empty( $lang_array ) ) {
        ob_start();

        $current_language = mb_strtoupper( pll_current_language() );
        ?>
        <nav aria-label="Language" class="flex items-center gap-[31px]">
            <?php foreach ( $lang_array as $code => $lang ) : ?>

                <a hreflang="<?php echo $lang['name']; ?>" lang="<?php echo $lang['name']; ?>" href="<?php echo $lang['url']; ?>"
                   class="menu-link uppercase"
                >
                    <?php echo $lang['name']; ?>
                </a>
            <?php endforeach; ?>
        </nav>
        <?php
        $switcher = ob_get_clean();
    }

    return $switcher;
}

function becute_add_menu_classes( $classes, $item, $args ) {
    if ( $args->theme_location === 'menu-1' ) {
        $classes[] = 'menu-link';
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'becute_add_menu_classes', 10, 3 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function becute_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'becute_content_width', 640 );
}
add_action( 'after_setup_theme', 'becute_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function becute_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'becute' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'becute' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'becute_widgets_init' );

/**
 * Определяет, доступен ли Vite dev-сервер.
 * @param string $url Базовый URL Vite dev server.
 * @return bool
 */
function becute_is_vite_running($url): bool
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_NOBODY => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 0.2,
    ]);
    curl_exec($ch);
    $ok = false;
    if (!curl_errno($ch)) {
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $ok = $code >= 200 && $code < 500;
    }
    curl_close($ch);
    return $ok;
}

/**
 * Подключение ассетов Vite (dev HMR / prod manifest) c type="module".
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function (): void {
    $dev_server = 'http://localhost:5173';
    $is_dev     = becute_is_vite_running($dev_server);
    $ver        = wp_get_theme()->get('Version');

    if ($is_dev) {
        // Dev: HMR
        wp_register_script_module(
            'vite-client', // Unique handle for your module
            $dev_server . '/@vite/client', // Path to your module file
            [], // Dependencies (other modules or scripts)
            null, // Version
            true // In footer
        );
        wp_enqueue_script_module( 'vite-client' );

        wp_register_script_module(
            'theme-main', // Unique handle for your module
            $dev_server . '/src/main.js', // Path to your module file
            [], // Dependencies (other modules or scripts)
            null, // Version
            true // In footer
        );
        wp_enqueue_script_module( 'theme-main' );

        // CSS в dev придёт через HMR из main.js
        return;
    }

    wp_register_script_module(
        'vite-client', // Unique handle for your module
        $dev_server . '/@vite/client', // Path to your module file
        [], // Dependencies (other modules or scripts)
        null, // Version
        true // In footer
    );
    wp_enqueue_script_module( 'vite-client' );

    // Prod: manifest.json
    $manifest_path = get_stylesheet_directory() . '/dist/manifest.json';
    if (!file_exists($manifest_path)) {
        return;
    }

    $manifest = json_decode(file_get_contents($manifest_path), true);
    $entry    = 'assets/src/main.js';

    if (!isset($manifest[$entry])) {
        return;
    }

    $base = get_stylesheet_directory_uri() . '/dist/';

    // CSS (может быть массивом)
    if (!empty($manifest[$entry]['css'])) {
        foreach ($manifest[$entry]['css'] as $css) {
            wp_enqueue_style('theme-style', $base . $css, [], $ver);
        }
    }

    // JS как ES-модуль
    $file = $manifest[$entry]['file'] ?? null;
    if ($file) {
        wp_enqueue_script('theme-main', $base . $file, [], $ver, true);
        wp_script_add_data('theme-main', 'type', 'module'); // ⬅️ ВАЖНО
    }

    // (Необязательно) modulepreload для импортов Vite — небольшой буст производительности
    if (!empty($manifest[$entry]['imports'])) {
        add_action('wp_head', function () use ($manifest, $base, $entry) {
            foreach ($manifest[$entry]['imports'] as $import) {
                $import_file = $manifest[$import]['file'] ?? null;
                if ($import_file) {
                    echo '<link rel="modulepreload" href="' . esc_url($base . $import_file) . '">' . "\n";
                }
            }
        }, 1);
    }
}, 20);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

