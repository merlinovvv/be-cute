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

$footer = get_field('footer', 'option');

if ($footer):
    $socials_title = $footer['socials_title'];
    $menu_title = $footer['menu_title'];
    $contacts_title = $footer['contacts_title'];
    $work_time_title = $footer['work-time_title'];
    $top_button = $footer['top_button'];

    $socials = get_field('socials', 'option');
    $contacts = get_field('contacts', 'option');
    $work_time = get_field('work_time', 'option');
    $work_days = get_field('work_days', 'option');

    ?>
    <footer class="py-10">
        <div class="container relative">
            <div class="flex xl:flex-row flex-col gap-[60px] w-full">
                <div class="flex xl:flex-col flex-row justify-between xl:items-start items-center">
                    <div class="footer-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                    <?php if (!empty($socials)): ?>
                        <div class="flex md:gap-6 gap-[7px] flex-col xl:max-w-[120px]">
                            <p class="font-medium md:text-[35px]/[normal] text-[12px]/[normal] text-white"><?php echo esc_html($socials_title); ?></p>
                            <nav aria-label="Socials" class="grid xl:grid-cols-2 grid-cols-4 md:gap-[18px] gap-[9px]">
                                <?php foreach ($socials as $social):
                                    $social_icon = $social['icon'];
                                    $social_link = $social['link'];
                                    ?>
                                    <a aria-label="<?php echo !empty($social_link) ? esc_attr($social_link['title']) : ''; ?>" href="<?php echo !empty($social_link) ? esc_url($social_link['url']) : ''; ?>">
                                        <img aria-hidden="true" class="md:max-w-max max-w-[31px]"
                                             alt=""
                                             src="<?php echo esc_url($social_icon['url']); ?>"/>
                                    </a>
                                <?php endforeach; ?>
                            </nav>
                        </div>
                    <?php endif; ?>
                    <div class="text-[#EEEEF0] lg:text-[25px] md:text-[18px] text-[12px] xl:block lg:hidden block lg:relative absolute lg:right-0 right-5 bottom-0">
                        Made by: <br>
                        <a rel="nofollow noopener noreferrer" target="_blank" class="text-secondary" href="https://www.instagram.com/valeria.fess/">Valeriia
                            Fesenko</a>,
                        <br>
                        <a rel="nofollow noopener noreferrer" target="_blank" class="text-secondary" href="https://t.me/merlinovvv">Andriy Merlinov</a>
                    </div>
                </div>
                <div class="flex lg:flex-row flex-col gap-[22px] w-auto flex-auto">
                    <div class="bg-primary outline outline-secondary border-[9px] border-background lg:max-w-[421px] w-full md:rounded-[25px] rounded-[15px] lg:py-[98px] md:p-10 px-[15px] py-[10px]  text-white">
                        <div class="lg:max-w-[182px] max-w-max flex lg:flex-col flex-row gap-[19px] md:mx-auto">
                            <h4 class="md:text-[35px]/[normal] text-[20px]/[normal] font-medium lg:max-w-max md:max-w-[182px] max-w-[102px]"><?php echo esc_html($menu_title); ?></h4>
                            <nav aria-label="Primary" class="main-navigation">
                                <?php
                                wp_nav_menu([
                                    'theme_location' => 'menu-2',
                                    'menu_id' => 'primary-menu',
                                    'container' => false,
                                    // Tailwind-классы на <ul>
                                    'menu_class' => 'flex flex-col md:gap-[27px] gap-[13.5px] footer-menu',
                                    // Жёстко задаём разметку UL, чтобы WP не подмешивал контейнер
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                ]);
                                ?>
                            </nav>
                        </div>
                    </div>
                    <div class="outline outline-secondary border-[9px] border-background lg:max-w-[421px] w-full md:rounded-[25px] rounded-[15px] lg:py-[98px] md:p-10 px-[15px] py-[10px] text-white">
                        <div class="flex md:max-w-[244px] flex-col gap-6 md:mx-auto">
                            <h4 class="md:max-w-[182px] max-w-[102px] md:text-[35px]/[normal] text-[20px]/[normal] font-medium"><?php echo esc_html($contacts_title); ?></h4>
                            <?php if (!empty($contacts)) : ?>
                                <address class="not-italic w-full">
                                    <?php foreach ($contacts as $contact): ?>
                                        <div class="border-t-[#EEEEF0] border-t pt-[5px] md:pb-[17px] pb-[5px]">
                                            <p class="flex items-center gap-[3.5px] md:text-[15px] text-[12px] text-white font-light leading-[normal]">
                                                <img src="<?php echo esc_url($contact['icon']['url']); ?>"
                                                     alt="<?php echo esc_attr($contact['name']); ?>">
                                                <?php echo esc_html($contact['name']); ?>:
                                            </p>
                                            <?php if (str_contains($contact['link']['url'], 'tel:')): ?>
                                                <div itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
                                                    <meta itemprop="contactType" content="customer service" />
                                                    <a itemprop="telephone" class="md:text-[17px]/[normal] text-[12px]/[normal] text-secondary"
                                                       href="<?php echo esc_url($contact['link']['url']); ?>"><?php echo esc_html($contact['link']['title']); ?></a>
                                                </div>
                                            <?php else: ?>
                                                <a class="md:text-[17px]/[normal] text-[12px]/[normal] text-secondary"
                                                   href="<?php echo esc_url($contact['link']['url']); ?>"><?php echo esc_html($contact['link']['title']); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </address>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="outline outline-secondary border-[9px] border-background lg:max-w-[421px] w-full md:rounded-[25px] rounded-[15px] lg:py-[98px] md:p-10 px-[15px] py-[10px] text-white relative">
                        <div class="flex lg:max-w-[195px] max-w-max lg:flex-col flex-row gap-6 mx-auto z-20 relative lg:items-start items-center">
                            <h4 class="md:text-[35px]/[normal] text-[20px]/[normal] font-medium lg:max-w-max md:max-w-[182px] max-w-[102px]"><?php echo esc_html($work_time_title); ?></h4>
                            <aside class="text-white">
                                <?php if (count($work_time) === 2) : ?>
                                    <p class="md:text-[30px] text-xl">
                                        <time datetime="<?= esc_attr($work_time['from']) ?>"><?= esc_html($work_time['from']) ?></time>
                                        -
                                        <time datetime="<?= esc_attr($work_time['to']) ?>"><?= esc_html($work_time['to']) ?></time>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($work_days)) : ?>
                                    <p class="md:mt-2 mt-[3px] border-t border-[#EEEEF0] md:text-[15px] text-[12px] pt-[5px]"><?php echo esc_html($work_days); ?></p>
                                <?php endif; ?>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($top_button)) : ?>
                <div class="bg-background py-[25px] lg:px-[40px] lg:absolute! bottom-[0] right-[0] text-white">
                    <a href="<?php echo esc_url($top_button['url']); ?>"
                       class="btn transparent">
                        <?php echo esc_html($top_button['title']); ?>
                        <i class="arrow"></i>
                    </a>
                </div>

            <?php endif; ?>
        </div>
    </footer>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
