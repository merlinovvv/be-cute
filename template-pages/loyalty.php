<?php
/**
 * Template Name: Loyalty Page
 * The main template file
 *
 * @package BE CUTE
 */
get_header();

$main_block = get_field('main_block');
$levels_card_block = get_field('levels_card_block');

$levels = [];
$levels_with_percent = [];
$levels_string = '';

if ($levels_card_block && $levels_card_block['levels_block']) {
    $levels = $levels_card_block['levels_block']['levels'] ?? [];

    $levels_with_percent = array_map(function ($level) {
        return $level['percent'] . '%';
    }, $levels);
}

?>
    <main>
        <?php if ($main_block):
            $supertitle = $main_block['supertitle'] ?? '';
            $title = $main_block['title'] ?? '';
            $subtitle = $main_block['subtitle'] ?? '';
            $get_card_link = $main_block['get_card_link'] ?? null;

            $starting_loyalty_program = $main_block['starting_loyalty_program'] ?? null;
            $slp_title = '';
            $slp_desc = '';

            if ($starting_loyalty_program) {
                $slp_title = $starting_loyalty_program['title'] ?? '';
                $slp_desc = $starting_loyalty_program['desc'] ?? '';
            }

            $how_work = $main_block['how_work'] ?? null;
            $how_title = '';
            $how_desc = '';

            if ($how_work) {
                $how_title = $how_work['title'] ?? '';
                $how_desc = $how_work['desc'] ?? '';
            }

            $image_with_desc = $main_block['image_with_desc'] ?? null;
            $img_desc = '';
            $img_image = null;

            if ($image_with_desc) {
                $img_desc = $image_with_desc['desc'] ?? '';
                $img_image = $image_with_desc['image'] ?? null;
            }
            ?>
            <div class="container relative">
                <div class="w-full relative md:mt-8">
                    <p class="text-white text-25to12 absolute left-1/2 -translate-x-1/2"><?php echo esc_html($supertitle); ?></p>
                    <h1 class="title-no-wrap w-min md:pt-0 pt-3">
                        <?php echo esc_html($title); ?>
                    </h1>
                    <p class="text-white text-25to12 absolute md:bottom-0 -bottom-3 left-1/2 -translate-x-1/2"><?php echo esc_html($subtitle); ?></p>
                </div>
                <div class="flex flex-col md:gap-[28px] gap-5 w-(--width-583to290) xl:absolute xl:mx-0 mx-auto xl:mt-0 mt-10 static bottom-0 right-[14.84%]">
                    <p class="text-45to20/[1.27] tracking-[-0.02em] font-medium text-white"><?php echo esc_html($img_desc); ?></p>
                    <img class="shadow-[0_0_27px_0_#3D3D3D] md:rounded-[26px] rounded-[13px] border-1 border-white"
                         src="<?php echo esc_url($img_image['url']); ?>"
                         alt="<?php echo esc_attr($img_image['alt'] || 'Loyalty card'); ?>">
                </div>
                <div class="flex md:flex-row flex-col md:items-start items-center gap-5 xl:max-w-[43.54vw] max-w-full w-full xl:mx-0 mx-auto justify-between xl:my-[125px] mt-10 xl:bg-transparent bg-[#333333] xl:rounded-0 md:rounded-t-[25px] rounded-t-[12px] xl:p-0 md:py-[50px] pt-5 md:px-[40px] px-2.5">
                    <div class="flex flex-col md:items-start items-center md:gap-[27px] gap-2.5 2xl:max-w-[363px] md:max-w-[300px] md:text-start text-center">
                        <div class="text-secondary text-45to20 font-medium">
                            <?php echo esc_html($slp_title); ?>
                        </div>
                        <div class="text-15to12 text-white max-w-[289px]">
                            <?php echo $slp_desc; ?>
                        </div>
                    </div>

                    <a rel="noopener noreferrer" target="_blank" href="<?php echo esc_url($get_card_link['url']); ?>"
                       class="btn secondary">
                        <?php echo esc_html($get_card_link['title']); ?>
                        <i class="arrow"></i>
                    </a>
                </div>
                <div class="bg-[#333333] xl:rounded-[25px] md:rounded-b-[25px] rounded-b-[12px] md:py-[50px] pb-5 pt-10 md:px-[40px] px-2.5 flex items-end justify-between w-full mb-10">
                    <div class="flex flex-col md:gap-[27px] gap-4 md:max-w-[519px] md:mx-0 mx-auto">
                        <p class="text-secondary text-45to20/[1.3] font-medium md:text-start text-center"><?php echo esc_html($how_title); ?></p>
                        <div data-levels="<?php echo esc_attr(implode(', ', $levels_with_percent)); ?>"
                             data-variables="levels"
                             class="how-work-list text-white text-20to10/[1.3]">
                            <?php echo $how_desc; ?>
                        </div>
                    </div>
                    <div class="md:flex hidden flex-col items-center gap-2.5 text-center text-white text-20to10">
                        <div><?php pll_e('scroll<br>down'); ?></div>
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="path-1-inside-1_378_167" fill="white">
                                <path d="M14.9313 8.07748C15.7977 7.21111 17.2023 7.21112 18.0687 8.07748L29.2456 19.2544L18.0687 30.4313C17.2023 31.2977 15.7977 31.2977 14.9313 30.4313L3.7544 19.2544L14.9313 8.07748Z"/>
                            </mask>
                            <path d="M16.5 6.50879L29.2456 19.2544L16.5 6.50879ZM18.7758 31.1384C17.5189 32.3953 15.4811 32.3953 14.2242 31.1384L3.0473 19.9615L4.46151 18.5473L15.6384 29.7242C16.1143 30.2 16.8857 30.2 17.3616 29.7242L18.7758 31.1384ZM3.7544 19.2544L16.5 6.50879L3.7544 19.2544ZM29.9527 19.9615L18.7758 31.1384C17.5189 32.3953 15.4811 32.3953 14.2242 31.1384L15.6384 29.7242C16.1143 30.2 16.8857 30.2 17.3616 29.7242L28.5385 18.5473L29.9527 19.9615Z"
                                  fill="white" mask="url(#path-1-inside-1_378_167)"/>
                            <path d="M16.5 0.320801V21.6047" stroke="white"/>
                        </svg>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($levels_card_block):
            $supertitle_levels_block = '';
            $title_levels_block = '';
            $supertitle_card_block = '';
            $title_card_block = '';
            $steps = [];
            $qr_code = [];

            if ($levels_card_block['levels_block']) {
                $supertitle_levels_block = $levels_card_block['levels_block']['supertitle'] ?? '';
                $title_levels_block = $levels_card_block['levels_block']['title'] ?? '';
            }

            if ($levels_card_block['card_block']) {
                $supertitle_card_block = $levels_card_block['card_block']['supertitle'] ?? '';
                $title_card_block = $levels_card_block['card_block']['title'] ?? '';
                $steps = $levels_card_block['card_block']['steps'] ?? [];
                $qr_code = $levels_card_block['card_block']['qr_code'] ?? [];
            }
            ?>
            <div class="flex lg:flex-row flex-col lg:items-stretch bg-secondary">
                <div class="md:p-10 p-[15px] flex flex-col md:gap-[70px] gap-[15px] lg:items-start items-center">
                    <div class="flex flex-col">
                        <p class="text-15to12 text-dark-gray top-0 left-0 lowercase"><?php echo esc_html($supertitle_levels_block); ?></p>
                        <h2 class="text-primary"><?php echo esc_html($title_levels_block); ?></h2>
                    </div>
                    <div class="grid xl:grid-cols-[repeat(3,calc(110px+(227-110)*((100vw-320px)/(1920-320))))] lg:grid-cols-[repeat(2,calc(110px+(227-110)*((100vw-320px)/(1920-320))))] md:grid-cols-[repeat(3,calc(110px+(227-110)*((100vw-320px)/(1920-320))))] grid-cols-2 md:gap-[30px] gap-2.5 md:w-auto w-full">
                        <?php
                        $counter = 0;
                        foreach ($levels as $level):
                            $bgs = [
                                0 => 'bg-white',
                                1 => 'bg-[#F7BCC7]',
                                2 => 'bg-[#EEAEBA]',
                                3 => 'bg-[#E89EAC]',
                                4 => 'bg-[#E492A1]',
                            ];
                            $text_colors = [
                                0 => 'text-[#6B6A70]',
                                1 => 'text-white',
                            ];
                            $border_colors = [
                                0 => 'border-[#6B6A70]',
                                1 => 'border-white',
                            ]
                            ?>
                            <div class="<?php echo $bgs[$counter] ?? 'bg-[#E492A1]'; ?> md:rounded-[23px] rounded-[7px] p-2 pb-[19px] <?php echo $text_colors[$counter] ?? 'text-white'; ?> md:min-h-[324px] flex flex-col md:items-center justify-between md:gap-[18px] gap-2.5">
                                <div class="border <?php echo $border_colors[$counter] ?? 'border-white'; ?> w-full md:rounded-[20px] rounded-[5px] flex md:flex-col items-center md:justify-center justify-between h-max md:py-[43px] p-2">
                                    <div class="text-45to15 font-medium">
                                        <?php echo esc_html($level['name']); ?>
                                    </div>
                                    <div class="text-45to15 font-medium">
                                        <?php echo esc_html($level['percent']); ?>%
                                    </div>
                                </div>
                                <div class="flex flex-col md:items-center gap-3">
                                    <div class="md:max-w-[111px] max-w-[90px] md:text-center text-start text-15to12/[1.1] tracking-[-0.02em]">
                                        <?php echo pll__('cashback from') . ' ' . $level['cashback']['from'] . ' ' . ($level['cashback']['from'] ? pll__('to') : '') ?>
                                    </div>
                                    <div class="flex items-baseline gap-1 md:w-auto w-full md:justify-normal justify-end">
                                        <span class="text-45to15/[1] font-medium"><?php echo $level['cashback']['to']; ?></span>
                                        <span class="text-15to12/[1]">pln</span>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $counter++;
                        endforeach; ?>
                    </div>
                </div>
                <div class="lg:m-0 lg:mt-10 mt-10 mx-[15px] mb-[30px] lg:border rounded-l-[35px] lg:border-white lg:w-full flex">
                    <div class="mr-[70px] m-10 2xl:flex hidden flex-col">
                        <p class="text-15to12 opacity-0 pointer-events-none">0</p>
                        <span class="text-[calc(67px+(205-67)*((100vw-320px)/(1920-320)))] cormorant text-white leading-[85%] tracking-[-0.08em]">&</span>
                    </div>
                    <div class="bg-white lg:px-[58px] px-4 lg:py-10 py-[30px] lg:rounded-l-[35px] rounded-[13px] w-full flex flex-col lg:items-start items-center lg:gap-[70px] gap-[30px]">
                        <div class="flex flex-col lg:items-start items-center">
                            <p class="text-15to12 text-dark-gray top-0 left-0 lowercase"><?php echo esc_html($supertitle_card_block); ?></p>
                            <h2 class="text-primary"><?php echo esc_html($title_card_block); ?></h2>
                        </div>
                        <p class="lowercase text-15to12 text-dark-gray">
                            <?php pll_e('You can do it in') ?><b> <?php echo count($steps) ?> <?php pll_e('ways') ?>:</b>
                        </p>
                        <div class="flex sm:flex-row flex-col sm:items-start items-center justify-between gap-[18px]">
                            <div class="flex flex-col sm:gap-[50px] gap-[30px]">
                                <?php
                                $counter = 1;
                                foreach ($steps as $step): ?>
                                    <div class="flex flex-col gap-5">
                                        <h3 class="text-primary text-45to20 capitalize"><?php echo $counter . ' — ' . esc_html($step['name']); ?></h3>
                                        <div class="how-work-list text-20to12 text-[#6B6A70]!"><?php echo $step['text']; ?></div>
                                    </div>
                                    <?php
                                    $counter++;
                                endforeach; ?>
                            </div>
                            <img class="sm:max-w-[200px] max-w-[100px] h-max" src="<?php echo esc_url($qr_code['url']); ?>" alt="QR Code - Register in the loyalty program">
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>
<?php get_footer();
