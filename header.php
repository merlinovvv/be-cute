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
$main = get_field('main_block');
$bg = $main['bg-image']['url'] ?? '';

$contacts = get_field('contacts', 'option');
$contacts_title = get_field('contacts_title', 'option');

$mail_icon = '<svg aria-hidden="true" width="12" height="13" viewBox="0 0 12 13" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.79922 3.55313L5.99922 6.25313L10.4992 3.55313M2.39922 10.0488C1.73648 10.0488 1.19922 9.51152 1.19922 8.84878V4.15313C1.19922 3.49038 1.73648 2.95312 2.39922 2.95312H9.59922C10.262 2.95312 10.7992 3.49038 10.7992 4.15313V8.84878C10.7992 9.51152 10.262 10.0488 9.59922 10.0488H2.39922Z"
                                              stroke="black" stroke-width="0.8" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>';
$address_icon = '<svg aria-hidden="true" width="12" height="13" viewBox="0 0 12 13" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.00066 11.2992C6.00066 11.2992 9.75718 7.96009 9.75718 5.45574C9.75718 3.38107 8.07533 1.69922 6.00066 1.69922C3.92599 1.69922 2.24414 3.38107 2.24414 5.45574C2.24414 7.96009 6.00066 11.2992 6.00066 11.2992Z"
                                              stroke="black" stroke-width="0.8"/>
                                        <path d="M7.20082 5.29929C7.20082 5.96204 6.66356 6.49929 6.00082 6.49929C5.33807 6.49929 4.80082 5.96204 4.80082 5.29929C4.80082 4.63655 5.33807 4.09929 6.00082 4.09929C6.66356 4.09929 7.20082 4.63655 7.20082 5.29929Z"
                                              stroke="black" stroke-width="0.8"/>
                                    </svg>';
$tel_icon = '<svg aria-hidden="true" width="12" height="13" viewBox="0 0 12 13" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.3309 9.88575C10.3309 9.88575 9.7516 10.4548 9.60963 10.6216C9.37835 10.8684 9.10586 10.9849 8.74865 10.9849C8.7143 10.9849 8.67766 10.9849 8.64331 10.9826C7.96323 10.9392 7.33123 10.6741 6.85723 10.4479C5.56118 9.82177 4.42312 8.93283 3.47741 7.80625C2.69657 6.86704 2.17449 5.99868 1.82872 5.06633C1.61577 4.49732 1.53791 4.054 1.57226 3.63581C1.59516 3.36845 1.6982 3.14678 1.88826 2.95712L2.6691 2.17787C2.7813 2.07275 2.90037 2.01562 3.01715 2.01562C3.16141 2.01562 3.2782 2.10246 3.35147 2.17559C3.35376 2.17787 3.35605 2.18016 3.35834 2.18244C3.49802 2.3127 3.63083 2.44752 3.77051 2.59149C3.8415 2.66461 3.91477 2.73774 3.98805 2.81315L4.61318 3.437C4.8559 3.67923 4.8559 3.90318 4.61318 4.1454C4.54677 4.21167 4.48266 4.27794 4.41625 4.34193C4.2239 4.53845 4.375 4.38766 4.17579 4.5659C4.17121 4.57047 4.16663 4.57276 4.16434 4.57733C3.96741 4.77385 4.00405 4.96581 4.04527 5.09606C4.04756 5.10292 4.04985 5.10977 4.05213 5.11663C4.21471 5.50968 4.4437 5.87988 4.79176 6.32091L4.79405 6.3232C5.42604 7.10016 6.09239 7.70573 6.82743 8.16962C6.92132 8.22903 7.01749 8.27702 7.10908 8.32272C7.19152 8.36386 7.26937 8.4027 7.33578 8.44384C7.34494 8.44841 7.3541 8.45526 7.36326 8.45983C7.44111 8.49868 7.51439 8.51696 7.58995 8.51696C7.78001 8.51696 7.89908 8.39813 7.93801 8.35929L8.38685 7.91136C8.4647 7.83367 8.58836 7.73998 8.73262 7.73998C8.87459 7.73998 8.99137 7.8291 9.06236 7.90679C9.06464 7.90908 9.06465 7.90908 9.06694 7.91136L10.3286 9.17049C10.5645 9.40358 10.3309 9.88575 10.3309 9.88575Z"
                                              stroke="black" stroke-width="0.8" stroke-linecap="round"
                                              stroke-linejoin="round"/>
                                    </svg>';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body class="bg-no-repeat sm:bg-right-top bg-[60%_top] sm:bg-auto bg-size-[239%]"
      style="background-image: url('<?php echo esc_url($bg) ?>')" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="md:mt-[37px] mt-[6px] relative z-20">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="header-logo order-1">
                <?php the_custom_logo(); ?>
            </div>

            <button aria-expanded="false"
                    aria-controls="primary-menu" type="button" class="menu-burger-btn z-30 order-3">
                <span class="sr-only">Открыть меню</span>
                <span></span>
            </button>
            <nav aria-label="Primary" class="menu-header md:order-2 z-10">
                <span class="md:hidden block absolute top-[15px] left-[14px] menu-title">menu</span>
                <div class="bg-black h-[1px] w-full mt-[25px] mb-[5px] md:hidden"></div>
                <?php
                wp_nav_menu([
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                    'container' => false,
                    // Tailwind-классы на <ul>
                    'menu_class' => 'menu-list flex items-center md:gap-[31px] gap-[7px]',
                    // Жёстко задаём разметку UL, чтобы WP не подмешивал контейнер
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                ]);
                ?>
                <?php if (!empty($contacts)) : ?>
                    <address class="not-italic w-full header-menu-social">
                        <p class="lg:text-[25px] md:text-[18px] text-[12px] lowercase text-black lg:mb-[17px] md:mb-[14px] mb-[4px]">
                            <?php echo esc_html($contacts_title); ?>
                        </p>
                        <?php foreach ($contacts as $contact): ?>
                            <div class="border-t-black border-t pt-[5px] md:pb-[17px] pb-[5px]">
                                <p class="flex items-center gap-[3.5px] md:text-[15px] text-[12px] text-black font-light leading-[normal]">
                                    <?php
                                    if (str_contains($contact['link']['url'], 'mailto:')) {
                                        echo $mail_icon;
                                    } elseif (str_contains($contact['link']['url'], 'tel:')) {
                                        echo $tel_icon;
                                    } else echo $address_icon;
                                    ?>
                                    <?php echo esc_html($contact['name']); ?>:
                                </p>
                                <?php if (str_contains($contact['link']['url'], 'tel:')): ?>
                                    <div itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
                                        <meta itemprop="contactType" content="customer service" />
                                        <a itemprop="telephone" class="md:text-[17px]/[normal] text-[12px]/[normal] text-[#2A2A2A]"
                                           href="<?php echo esc_url($contact['link']['url']); ?>"><?php echo esc_html($contact['link']['title']); ?></a>
                                    </div>
                                <?php else: ?>
                                    <a class="md:text-[17px]/[normal] text-[12px]/[normal] text-[#2A2A2A]"
                                       href="<?php echo esc_url($contact['link']['url']); ?>"><?php echo esc_html($contact['link']['title']); ?></a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </address>
                <?php endif; ?>
            </nav>
            <!-- #site-navigation -->

            <?php echo becute_get_language_switcher(); ?>
        </div>
    </div>
</header>
