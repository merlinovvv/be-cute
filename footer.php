<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package becute
 */

$footer = get_field('footer');

if ($footer):
    $socials_title = $footer['socials_title'];
    $menu_title = $footer['menu_title'];
    $contacts_title = $footer['contacts_title'];
    $work_time_title = $footer['work-time_title'];
    $top_button = $footer['top_button'];

    $socials = get_field('socials', 'option');
    $email = get_field('email', 'option');
    $address = get_field('address', 'option');
    $phone = get_field('phone', 'option');
    $work_time = get_field('work_time', 'option');
    $work_days = get_field('work_days', 'option');

    ?>
    <footer class="py-10">
        <div class="container">
            <div class="flex gap-[60px] w-full">
                <div class="flex flex-col justify-between">
                    <div class="footer-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                    <?php if (!empty($socials)): ?>
                        <div class="flex gap-6 flex-col max-w-[120px]">
                            <p class="font-medium text-[35px]/[normal] text-white"><?php echo esc_html($socials_title); ?></p>
                            <address class="grid grid-cols-2 gap-[18px]">
                                <?php foreach ($socials as $social):
                                    $social_icon = $social['icon'];
                                    $social_link = $social['link'];
                                    ?>
                                    <a href="<?php echo !empty($social_link) ? esc_url($social_link['url']) : ''; ?>">
                                        <img alt="<?php echo !empty($social_link) ? esc_attr($social_link['title']) : ''; ?>"
                                             src="<?php echo esc_url($social_icon['url']); ?>"/>
                                    </a>
                                <?php endforeach; ?>
                            </address>
                        </div>
                    <?php endif; ?>
                    <div class="text-[#EEEEF0] text-[25px]">
                        Made by: <br>
                        <a target="_blank" class="text-secondary" href="https://www.instagram.com/valeria.fess/">Valeriia Fesenko</a>,
                        <br>
                        <a target="_blank" class="text-secondary" href="https://t.me/merlinovvv">Andriy Merlinov</a>
                    </div>
                </div>
                <div class="flex gap-[22px] w-auto flex-auto">
                    <div class="bg-primary outline outline-secondary border-[9px] border-background max-w-[421px] w-full rounded-[25px] py-[98px] text-white">
                        <div class="max-w-[182px] flex flex-col gap-[19px] mx-auto">
                            <h4 class="text-[35px]/[normal] font-medium"><?php echo esc_html($menu_title); ?></h4>
                            <nav aria-label="Primary" class="main-navigation">
                                <?php
                                wp_nav_menu([
                                    'theme_location' => 'menu-2',
                                    'menu_id' => 'primary-menu',
                                    'container' => false,
                                    // Tailwind-классы на <ul>
                                    'menu_class' => 'flex flex-col gap-[27px]',
                                    // Жёстко задаём разметку UL, чтобы WP не подмешивал контейнер
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                ]);
                                ?>
                            </nav>
                        </div>
                    </div>
                    <div class="outline outline-secondary border-[9px] border-background max-w-[421px] w-full rounded-[25px] py-[98px] text-white">
                        <div class="flex max-w-[244px] flex-col gap-6 mx-auto">
                            <h4 class="max-w-[182px] text-[35px]/[normal] font-medium"><?php echo esc_html($contacts_title); ?></h4>
                            <?php if (!empty($phone) || !empty($email) || !empty($address)) : ?>
                                <address class="not-italic">
                                    <?php if (!empty($email)) : ?>
                                        <div class="border-t-[#EEEEF0] border-t pt-[5px] pb-[17px]">
                                            <p class="flex items-center gap-[3.5px] text-[15px] text-white font-light leading-[normal]">
                                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.79922 3.55313L5.99922 6.25313L10.4992 3.55313M2.39922 10.0488C1.73648 10.0488 1.19922 9.51152 1.19922 8.84878V4.15313C1.19922 3.49038 1.73648 2.95312 2.39922 2.95312H9.59922C10.262 2.95312 10.7992 3.49038 10.7992 4.15313V8.84878C10.7992 9.51152 10.262 10.0488 9.59922 10.0488H2.39922Z"
                                                          stroke="white" stroke-width="0.8" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                                email:
                                            </p>
                                            <a class="text-[17px]/[normal] text-secondary"
                                               href="<?php echo $email['url']; ?>"><?php echo esc_html($email['title']); ?></a>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($address)) : ?>
                                        <div class="border-t-secondary/50 border-t pt-[5px] pb-[17px]">
                                            <p class="flex items-center gap-[3.5px] text-[15px] text-white font-light">
                                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.00066 11.2992C6.00066 11.2992 9.75718 7.96009 9.75718 5.45574C9.75718 3.38107 8.07533 1.69922 6.00066 1.69922C3.92599 1.69922 2.24414 3.38107 2.24414 5.45574C2.24414 7.96009 6.00066 11.2992 6.00066 11.2992Z"
                                                          stroke="white" stroke-width="0.8"/>
                                                    <path d="M7.20082 5.29929C7.20082 5.96204 6.66356 6.49929 6.00082 6.49929C5.33807 6.49929 4.80082 5.96204 4.80082 5.29929C4.80082 4.63655 5.33807 4.09929 6.00082 4.09929C6.66356 4.09929 7.20082 4.63655 7.20082 5.29929Z"
                                                          stroke="white" stroke-width="0.8"/>
                                                </svg>
                                                address:
                                            </p>
                                            <a target="_blank" class="text-[17px] text-secondary"
                                               href="<?php echo $address['url']; ?>"><?php echo esc_html($address['title']); ?></a>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($phone)) : ?>
                                        <div class="border-t-secondary border-t pt-[5px] pb-[17px]">
                                            <p class="flex items-center gap-[3.5px] text-[15px] text-white font-light">
                                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.3309 9.88575C10.3309 9.88575 9.7516 10.4548 9.60963 10.6216C9.37835 10.8684 9.10586 10.9849 8.74865 10.9849C8.7143 10.9849 8.67766 10.9849 8.64331 10.9826C7.96323 10.9392 7.33123 10.6741 6.85723 10.4479C5.56118 9.82177 4.42312 8.93283 3.47741 7.80625C2.69657 6.86704 2.17449 5.99868 1.82872 5.06633C1.61577 4.49732 1.53791 4.054 1.57226 3.63581C1.59516 3.36845 1.6982 3.14678 1.88826 2.95712L2.6691 2.17787C2.7813 2.07275 2.90037 2.01562 3.01715 2.01562C3.16141 2.01562 3.2782 2.10246 3.35147 2.17559C3.35376 2.17787 3.35605 2.18016 3.35834 2.18244C3.49802 2.3127 3.63083 2.44752 3.77051 2.59149C3.8415 2.66461 3.91477 2.73774 3.98805 2.81315L4.61318 3.437C4.8559 3.67923 4.8559 3.90318 4.61318 4.1454C4.54677 4.21167 4.48266 4.27794 4.41625 4.34193C4.2239 4.53845 4.375 4.38766 4.17579 4.5659C4.17121 4.57047 4.16663 4.57276 4.16434 4.57733C3.96741 4.77385 4.00405 4.96581 4.04527 5.09606C4.04756 5.10292 4.04985 5.10977 4.05213 5.11663C4.21471 5.50968 4.4437 5.87988 4.79176 6.32091L4.79405 6.3232C5.42604 7.10016 6.09239 7.70573 6.82743 8.16962C6.92132 8.22903 7.01749 8.27702 7.10908 8.32272C7.19152 8.36386 7.26937 8.4027 7.33578 8.44384C7.34494 8.44841 7.3541 8.45526 7.36326 8.45983C7.44111 8.49868 7.51439 8.51696 7.58995 8.51696C7.78001 8.51696 7.89908 8.39813 7.93801 8.35929L8.38685 7.91136C8.4647 7.83367 8.58836 7.73998 8.73262 7.73998C8.87459 7.73998 8.99137 7.8291 9.06236 7.90679C9.06464 7.90908 9.06465 7.90908 9.06694 7.91136L10.3286 9.17049C10.5645 9.40358 10.3309 9.88575 10.3309 9.88575Z"
                                                          stroke="white" stroke-width="0.8" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                </svg>
                                                tel:
                                            </p>
                                            <a class="text-[17px] text-secondary"
                                               href="<?php echo $phone['url']; ?>"><?php echo esc_html($phone['title']); ?></a>
                                        </div>
                                    <?php endif; ?>
                                </address>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="outline outline-secondary border-[9px] border-background max-w-[421px] w-full rounded-[25px] py-[98px] text-white relative">
                        <div class="flex max-w-[128px] flex-col gap-6 mx-auto z-20 relative">
                            <h4 class="text-[35px]/[normal] font-medium"><?php echo esc_html($work_time_title); ?></h4>
                            <aside class="text-white">
                                <?php if (count($work_time) === 2) : ?>
                                    <p class="text-[20px]/[normal]">
                                        <time datetime="<?= esc_attr($work_time['from']) ?>"><?= esc_html($work_time['from']) ?></time>
                                        -
                                        <time datetime="<?= esc_attr($work_time['to']) ?>"><?= esc_html($work_time['to']) ?></time>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($work_days)) : ?>
                                    <p class="mt-1.5 border-t border-[#EEEEF0] text-[18px]/[normal] pt-[5px]"><?php echo esc_html($work_days); ?></p>
                                <?php endif; ?>
                            </aside>
                        </div>
                        <?php if (!empty($top_button)) : ?>
                            <div class="bg-background py-[25px] px-[40px] !absolute bottom-[-9px] right-[-223px]">
                                <a href="<?php echo esc_url($top_button['url']); ?>"
                                   class="btn transparent">
                                    <?php echo esc_html($top_button['title']); ?>
                                    <i class="arrow"></i>
                                </a>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php endif; ?>
</div>

<?php wp_footer(); ?>

</body>
</html>
