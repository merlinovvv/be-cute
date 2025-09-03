<?php
/**
 * Template Name: Main Page
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package becute
 */

$main = get_field('main_block');
$services_block = get_field('services_block');
$gallery_block = get_field('gallery_block');
$reviews_block = get_field('reviews_block');
$address_block = get_field('address_block');

$book_page = get_field('book_page', 'option');
$email = get_field('email', 'option');
$address = get_field('address', 'option');
$phone = get_field('phone', 'option');
$work_time = get_field('work_time', 'option');
$work_days = get_field('work_days', 'option');

get_header();
?>
    <main id="content">
        <?php if ($main):
            $bg = $main['bg-image']['url'] ?? '';
            $title = $main['title'] ?? '';
            $text_book_link = $main['text_book_link'] ?? '';
            $block_link = $main['block_link'] ?? '';
            ?>
            <section id="main" class="overflow-x-hidden">
                <div class="container relative z-10">
                    <!-- Декоративный типографический фон -->
                    <article aria-hidden="true" class="pointer-events-none select-none inset-0 z-50">
                        <!-- большие буквы как фон (SVG/изображение), без alt -->
                        <svg class="flex-none" width="100%" viewBox="0 0 1847 375" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M146 175.48L152.16 169.32C174.187 169.32 193.413 173.427 209.84 181.64C226.64 189.853 239.52 201.053 248.48 215.24C257.813 229.427 262.48 245.667 262.48 263.96C262.48 283.747 257.627 301.667 247.92 317.72C238.213 333.773 224.773 346.467 207.6 355.8C190.8 364.76 171.947 369.24 151.04 369.24C139.093 369.24 125.467 368.68 110.16 367.56C95.2267 366.44 81.4133 365.88 68.72 365.88C56.4 365.88 44.4533 366.067 32.88 366.44C21.68 366.813 11.4133 367 2.08 367C1.33333 367 0.960001 365.88 0.960001 363.64C0.960001 361.4 1.33333 360.28 2.08 360.28C15.52 360.28 25.7867 359.347 32.88 357.48C39.9733 355.613 44.8267 351.88 47.44 346.28C50.0533 340.68 51.36 332.467 51.36 321.64V62.36C51.36 51.5333 50.0533 43.5067 47.44 38.28C45.2 32.68 40.5333 28.9466 33.44 27.08C26.72 24.84 16.64 23.72 3.2 23.72C2.08 23.72 1.52 22.6 1.52 20.36C1.52 18.12 2.08 17 3.2 17C12.16 17 22.24 17.3733 33.44 18.12C44.64 18.4933 56.4 18.68 68.72 18.68C78.4267 18.68 89.6267 18.12 102.32 17C115.013 15.88 125.84 15.32 134.8 15.32C156.827 15.32 174.747 18.68 188.56 25.4C202.373 31.7466 212.453 40.52 218.8 51.72C225.52 62.92 228.88 75.4266 228.88 89.24C228.88 110.52 221.04 128.627 205.36 143.56C190.053 158.493 170.267 169.133 146 175.48ZM122.48 23.72C113.893 23.72 106.987 24.4666 101.76 25.96C96.5333 27.4533 92.8 31 90.56 36.6C88.32 41.8266 87.2 50.7866 87.2 63.48V173.24L69.28 168.76C81.2267 169.507 91.12 170.067 98.96 170.44C106.8 170.44 111.28 170.44 112.4 170.44C141.147 170.44 161.68 163.16 174 148.6C186.32 133.667 192.48 115.373 192.48 93.72C192.48 80.6533 190.053 68.8933 185.2 58.44C180.72 47.6133 173.44 39.2133 163.36 33.24C153.28 26.8933 139.653 23.72 122.48 23.72ZM142.64 359.16C170.64 359.16 190.987 352.067 203.68 337.88C216.747 323.32 223.28 303.347 223.28 277.96C223.28 249.96 215.067 227 198.64 209.08C182.213 191.16 159.253 182.2 129.76 182.2C120.427 181.827 110.72 181.827 100.64 182.2C90.9333 182.573 81.04 183.507 70.96 185L87.2 178.84V321.64C87.2 330.6 88.5067 337.88 91.12 343.48C93.7333 349.08 98.96 353.187 106.8 355.8C115.013 358.04 126.96 359.16 142.64 359.16ZM504.186 367H269.546C268.799 367 268.426 365.88 268.426 363.64C268.426 361.4 268.799 360.28 269.546 360.28C283.359 360.28 293.626 359.347 300.346 357.48C307.066 355.613 311.546 351.88 313.786 346.28C316.399 340.68 317.706 332.467 317.706 321.64V62.36C317.706 51.5333 316.399 43.5067 313.786 38.28C311.546 32.68 307.066 28.9466 300.346 27.08C293.626 24.84 283.359 23.72 269.546 23.72C268.799 23.72 268.426 22.6 268.426 20.36C268.426 18.12 268.799 17 269.546 17H494.666C498.026 17 499.706 18.68 499.706 22.04L500.826 90.92C500.826 92.04 499.706 92.7867 497.466 93.16C495.599 93.16 494.666 92.6 494.666 91.48C493.546 71.32 487.386 55.8267 476.186 45C465.359 34.1733 451.172 28.76 433.626 28.76H399.466C386.772 28.76 377.066 29.6933 370.346 31.56C363.999 33.4266 359.519 36.9733 356.906 42.2C354.666 47.4266 353.546 55.08 353.546 65.16V319.4C353.546 329.107 354.666 336.573 356.906 341.8C359.519 347.027 363.812 350.573 369.786 352.44C376.132 354.307 385.466 355.24 397.786 355.24H442.586C460.506 355.24 475.439 348.893 487.386 336.2C499.706 323.133 507.732 305.587 511.466 283.56C511.466 282.44 512.586 282.067 514.826 282.44C517.066 282.813 518.186 283.56 518.186 284.68C516.692 294.387 515.386 306.147 514.266 319.96C513.519 333.773 513.146 346.653 513.146 358.6C513.146 364.2 510.159 367 504.186 367ZM472.826 236.52C472.826 220.093 468.719 208.333 460.506 201.24C452.666 194.147 439.412 190.6 420.746 190.6H336.746V178.84H422.426C440.346 178.84 453.039 175.853 460.506 169.88C468.346 163.533 472.266 153.453 472.266 139.64C472.266 138.893 473.386 138.52 475.626 138.52C477.866 138.52 478.986 138.893 478.986 139.64C478.986 150.84 478.799 159.613 478.426 165.96C478.426 171.933 478.426 178.28 478.426 185C478.426 193.587 478.612 201.987 478.986 210.2C479.359 218.413 479.546 227.187 479.546 236.52C479.546 237.267 478.426 237.64 476.186 237.64C473.946 237.64 472.826 237.267 472.826 236.52ZM820.297 10.84C837.47 10.84 855.204 12.52 873.497 15.88C892.164 19.24 907.097 24.0933 918.297 30.44C921.657 32.3067 923.71 33.9867 924.457 35.48C925.577 36.9733 926.324 39.7733 926.697 43.88L932.857 106.6C932.857 107.347 931.924 108.093 930.057 108.84C928.19 109.213 927.07 108.653 926.697 107.16C918.11 76.92 902.43 55.4533 879.657 42.76C856.884 29.6933 829.817 23.16 798.457 23.16C769.71 23.16 744.697 29.5067 723.417 42.2C702.51 54.52 686.27 72.0666 674.697 94.84C663.124 117.24 657.337 143.56 657.337 173.8C657.337 200.307 661.444 225.32 669.657 248.84C677.87 271.987 689.257 292.333 703.817 309.88C718.75 327.427 735.737 341.24 754.777 351.32C774.19 361.027 794.724 365.88 816.377 365.88C842.51 365.88 865.47 358.787 885.257 344.6C905.417 330.04 920.91 307.08 931.737 275.72C932.11 274.227 933.23 273.853 935.097 274.6C937.337 274.973 938.457 275.533 938.457 276.28L930.617 339.56C929.87 344.04 928.937 347.027 927.817 348.52C927.07 349.64 925.017 350.947 921.657 352.44C903.737 359.907 886.004 365.32 868.457 368.68C850.91 372.04 833.177 373.72 815.257 373.72C779.79 373.72 749.364 368.307 723.977 357.48C698.59 346.28 677.87 331.72 661.817 313.8C645.764 295.507 634.004 275.533 626.537 253.88C619.07 231.853 615.337 210.2 615.337 188.92C615.337 162.04 620.937 137.773 632.137 116.12C643.337 94.4666 658.644 75.8 678.057 60.12C697.47 44.44 719.31 32.3066 743.577 23.72C768.217 15.1333 793.79 10.84 820.297 10.84ZM1238.03 78.6C1238.03 60.3067 1233.92 46.68 1225.71 37.72C1217.87 28.3867 1205.73 23.72 1189.31 23.72C1188.19 23.72 1187.63 22.6 1187.63 20.36C1187.63 18.12 1188.19 17 1189.31 17C1197.89 17 1206.67 17.3733 1215.63 18.12C1224.59 18.4933 1234.48 18.68 1245.31 18.68C1253.89 18.68 1262.67 18.4933 1271.63 18.12C1280.59 17.3733 1288.8 17 1296.27 17C1297.01 17 1297.39 18.12 1297.39 20.36C1297.39 22.6 1297.01 23.72 1296.27 23.72C1281.33 23.72 1270.13 28.3867 1262.67 37.72C1255.2 46.68 1251.47 60.3067 1251.47 78.6V237.64C1251.47 266.387 1245.87 291.027 1234.67 311.56C1223.84 331.72 1208.53 347.213 1188.75 358.04C1168.96 368.867 1145.81 374.28 1119.31 374.28C1091.68 374.28 1067.41 368.867 1046.51 358.04C1025.97 347.213 1009.92 331.907 998.346 312.12C987.146 291.96 981.546 268.44 981.546 241.56V62.36C981.546 51.5333 980.426 43.5067 978.186 38.28C975.946 32.68 971.28 28.9466 964.186 27.08C957.466 24.84 947.386 23.72 933.946 23.72C933.2 23.72 932.826 22.6 932.826 20.36C932.826 18.12 933.2 17 933.946 17C942.906 17 952.8 17.3733 963.626 18.12C974.826 18.4933 986.773 18.68 999.466 18.68C1012.53 18.68 1024.67 18.4933 1035.87 18.12C1047.07 17.3733 1056.77 17 1064.99 17C1066.11 17 1066.67 18.12 1066.67 20.36C1066.67 22.6 1066.11 23.72 1064.99 23.72C1051.55 23.72 1041.47 24.84 1034.75 27.08C1028.03 29.32 1023.55 33.24 1021.31 38.84C1019.07 44.44 1017.95 52.6533 1017.95 63.48V221.96C1017.95 266.387 1027.84 300.173 1047.63 323.32C1067.79 346.093 1095.79 357.48 1131.63 357.48C1165.23 357.48 1191.36 347.027 1210.03 326.12C1228.69 304.84 1238.03 275.533 1238.03 238.2V78.6ZM1369.2 27.08C1346.06 27.08 1328.51 33.0533 1316.56 45C1304.99 56.9466 1296.59 77.2933 1291.36 106.04C1291.36 106.787 1290.24 107.16 1288 107.16C1286.14 107.16 1285.2 106.787 1285.2 106.04C1285.95 101.187 1286.7 94.4666 1287.44 85.88C1288.19 76.92 1288.94 67.4 1289.68 57.32C1290.8 47.24 1291.55 37.5333 1291.92 28.2C1292.67 18.4933 1293.04 10.6533 1293.04 4.67999C1293.04 2.81333 1293.98 1.87999 1295.84 1.87999C1298.08 1.87999 1299.2 2.81333 1299.2 4.67999C1299.2 8.41332 1301.07 11.2133 1304.8 13.08C1308.54 14.5733 1312.64 15.6933 1317.12 16.44C1321.98 16.8133 1326.08 17 1329.44 17C1361.55 18.12 1399.07 18.68 1442 18.68C1468.51 18.68 1489.42 18.4933 1504.72 18.12C1520.4 17.3733 1535.52 17 1550.08 17C1562.78 17 1572.48 16.2533 1579.2 14.76C1586.3 12.8933 1590.78 8.97333 1592.64 2.99998C1593.02 1.50664 1594.14 0.759975 1596 0.759975C1597.87 0.759975 1598.8 1.50664 1598.8 2.99998C1598.43 8.59997 1597.87 16.2533 1597.12 25.96C1596.38 35.6667 1595.82 45.7467 1595.44 56.2C1595.07 66.6533 1594.7 76.36 1594.32 85.32C1593.95 94.28 1593.76 101.187 1593.76 106.04C1593.76 106.787 1592.64 107.16 1590.4 107.16C1588.16 107.16 1587.04 106.787 1587.04 106.04C1585.92 76.92 1579.95 56.5733 1569.12 45C1558.3 33.0533 1540.38 27.08 1515.36 27.08C1499.68 27.08 1487.92 27.8266 1480.08 29.32C1472.24 30.8133 1467.02 34.1733 1464.4 39.4C1462.16 44.2533 1461.04 52.28 1461.04 63.48V321.64C1461.04 332.467 1462.35 340.68 1464.96 346.28C1467.58 351.88 1472.62 355.613 1480.08 357.48C1487.92 359.347 1499.68 360.28 1515.36 360.28C1516.48 360.28 1517.04 361.4 1517.04 363.64C1517.04 365.88 1516.48 367 1515.36 367C1505.66 367 1494.64 366.813 1482.32 366.44C1470 366.067 1456.56 365.88 1442 365.88C1428.19 365.88 1415.12 366.067 1402.8 366.44C1390.48 366.813 1379.28 367 1369.2 367C1368.46 367 1368.08 365.88 1368.08 363.64C1368.08 361.4 1368.46 360.28 1369.2 360.28C1384.51 360.28 1396.08 359.347 1403.92 357.48C1412.14 355.613 1417.55 351.88 1420.16 346.28C1422.78 340.68 1424.08 332.467 1424.08 321.64V62.36C1424.08 51.16 1422.78 43.1333 1420.16 38.28C1417.55 33.0533 1412.32 29.88 1404.48 28.76C1396.64 27.64 1384.88 27.08 1369.2 27.08ZM1832.76 367H1598.12C1597.38 367 1597 365.88 1597 363.64C1597 361.4 1597.38 360.28 1598.12 360.28C1611.94 360.28 1622.2 359.347 1628.92 357.48C1635.64 355.613 1640.12 351.88 1642.36 346.28C1644.98 340.68 1646.28 332.467 1646.28 321.64V62.36C1646.28 51.5333 1644.98 43.5067 1642.36 38.28C1640.12 32.68 1635.64 28.9466 1628.92 27.08C1622.2 24.84 1611.94 23.72 1598.12 23.72C1597.38 23.72 1597 22.6 1597 20.36C1597 18.12 1597.38 17 1598.12 17H1823.24C1826.6 17 1828.28 18.68 1828.28 22.04L1829.4 90.92C1829.4 92.04 1828.28 92.7867 1826.04 93.16C1824.18 93.16 1823.24 92.6 1823.24 91.48C1822.12 71.32 1815.96 55.8267 1804.76 45C1793.94 34.1733 1779.75 28.76 1762.2 28.76H1728.04C1715.35 28.76 1705.64 29.6933 1698.92 31.56C1692.58 33.4266 1688.1 36.9733 1685.48 42.2C1683.24 47.4266 1682.12 55.08 1682.12 65.16V319.4C1682.12 329.107 1683.24 336.573 1685.48 341.8C1688.1 347.027 1692.39 350.573 1698.36 352.44C1704.71 354.307 1714.04 355.24 1726.36 355.24H1771.16C1789.08 355.24 1804.02 348.893 1815.96 336.2C1828.28 323.133 1836.31 305.587 1840.04 283.56C1840.04 282.44 1841.16 282.067 1843.4 282.44C1845.64 282.813 1846.76 283.56 1846.76 284.68C1845.27 294.387 1843.96 306.147 1842.84 319.96C1842.1 333.773 1841.72 346.653 1841.72 358.6C1841.72 364.2 1838.74 367 1832.76 367ZM1801.4 236.52C1801.4 220.093 1797.3 208.333 1789.08 201.24C1781.24 194.147 1767.99 190.6 1749.32 190.6H1665.32V178.84H1751C1768.92 178.84 1781.62 175.853 1789.08 169.88C1796.92 163.533 1800.84 153.453 1800.84 139.64C1800.84 138.893 1801.96 138.52 1804.2 138.52C1806.44 138.52 1807.56 138.893 1807.56 139.64C1807.56 150.84 1807.38 159.613 1807 165.96C1807 171.933 1807 178.28 1807 185C1807 193.587 1807.19 201.987 1807.56 210.2C1807.94 218.413 1808.12 227.187 1808.12 236.52C1808.12 237.267 1807 237.64 1804.76 237.64C1802.52 237.64 1801.4 237.267 1801.4 236.52Z"
                                  fill="white"/>
                        </svg>
                        <h1 class="absolute mt-3"><?php echo $title; ?></h1>
                    </article>

                    <?php if (!empty($book_page)) : ?>
                        <a target="_blank" href="<?php echo esc_url($book_page['url']); ?>"
                           class="btn secondary mt-[60px] mx-auto">
                            <?php echo esc_html($book_page['title']); ?>
                            <i class="arrow"></i>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($block_link)) : ?>
                        <a href="<?php echo esc_url($block_link['url']); ?>"
                           class="btn mini absolute! left-[28.5%] bottom-[9%]">
                            <?php echo $block_link['title']; ?>
                            <i class="arrow"></i>
                        </a>
                    <?php endif; ?>

                    <div class="flex items-end justify-between mt-[7px] mb-[19px]">
                        <?php if (!empty($phone) || !empty($email) || !empty($address)) : ?>
                            <address class="not-italic">
                                <p class="text-[25px] lowercase text-white mb-[17px]">Contacts</p>
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

                        <!-- Часы работы справа внизу -->
                        <aside class="text-white">
                            <?php if (count($work_time) === 2) : ?>
                                <p class="text-[30px]">
                                    <time datetime="<?= esc_attr($work_time['from']) ?>"><?= esc_html($work_time['from']) ?></time>
                                    -
                                    <time datetime="<?= esc_attr($work_time['to']) ?>"><?= esc_html($work_time['to']) ?></time>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($work_days)) : ?>
                                <p class="mt-2 border-t border-[#EEEEF0] text-[15px] pt-[5px]"><?php echo esc_html($work_days); ?></p>
                            <?php endif; ?>
                        </aside>
                    </div>
                </div>
                <!-- Медиа-блок -->
                <figure class="absolute right-0 z-0 <?php echo is_admin_bar_showing() ? 'top-0' : 'top-0' ?>">
                    <img src="<?php echo esc_url($bg) ?>" alt="Interior of Be Cute beauty space">
                    <!-- <figcaption class="sr-only">…</figcaption> -->
                </figure>
            </section>
        <?php endif; ?>

        <?php if ($services_block):
            $title = $services_block['title'];
            $text = $services_block['text'];
            $services_types = $services_block['services_types'];
            ?>
            <section
                    id="our-services"
                    class="flex xl:flex-row flex-col-reverse bg-secondary 3xl:min-h-[1020px] 2xl:min-h-[920px] xl:min-h-[840px] xl:h-screen">
                <div id="servicesArea" class="services-area">
                </div>
                <div class="xl:flex hidden flex-col gap-5 items-center h-full">
                    <span class="h-full bg-primary w-[1px]"></span>
                    <div class="flex gap-5 flex-col items-center">
                        <button
                                id="scrollUpBtn"
                                class="rounded-full bg-white w-[64px] h-[64px] flex flex-col items-center justify-center cursor-pointer hover:bg-white/60 transition duration-200">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <mask id="path-1-inside-1_32_2239" fill="white">
                                    <path
                                            d="M7.21566 12.1219C7.64884 12.5551 8.35116 12.5551 8.78434 12.1219L14.3728 6.53345L8.78434 0.944997C8.35116 0.511815 7.64884 0.511816 7.21566 0.944997L1.6272 6.53345L7.21566 12.1219Z"/>
                                </mask>
                                <path
                                        d="M8 12.9062L14.3728 6.53345L8 12.9062ZM9.49145 0.237891C8.66775 -0.585815 7.33225 -0.585815 6.50855 0.237891L0.920095 5.82634L2.33431 7.24056L7.92276 1.6521C7.96542 1.60945 8.03458 1.60945 8.07724 1.6521L9.49145 0.237891ZM1.6272 6.53345L8 12.9062L1.6272 6.53345ZM15.0799 5.82634L9.49145 0.237891C8.66775 -0.585815 7.33225 -0.585815 6.50855 0.237891L7.92276 1.6521C7.96542 1.60945 8.03458 1.60945 8.07724 1.6521L13.6657 7.24056L15.0799 5.82634Z"
                                        fill="#6B6A70" mask="url(#path-1-inside-1_32_2239)"/>
                                <path d="M8 16V5.35804" stroke="#6B6A70"/>
                            </svg>
                        </button>
                        <span class="w-[73.92px] h-[1px] bg-white -rotate-35"></span>
                        <button
                                id="scrollDownBtn"
                                class="rounded-full bg-white w-[64px] h-[64px] flex flex-col items-center justify-center cursor-pointer hover:bg-white/60 transition duration-200">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <mask id="path-1-inside-1_32_2234" fill="white">
                                    <path
                                            d="M7.21566 3.87809C7.64884 3.44491 8.35116 3.44491 8.78434 3.87809L14.3728 9.46655L8.78434 15.055C8.35116 15.4882 7.64884 15.4882 7.21566 15.055L1.6272 9.46655L7.21566 3.87809Z"/>
                                </mask>
                                <path
                                        d="M8 3.09375L14.3728 9.46655L8 3.09375ZM9.49145 15.7621C8.66775 16.5858 7.33225 16.5858 6.50855 15.7621L0.920095 10.1737L2.33431 8.75944L7.92276 14.3479C7.96542 14.3906 8.03458 14.3906 8.07724 14.3479L9.49145 15.7621ZM1.6272 9.46655L8 3.09375L1.6272 9.46655ZM15.0799 10.1737L9.49145 15.7621C8.66775 16.5858 7.33225 16.5858 6.50855 15.7621L7.92276 14.3479C7.96542 14.3906 8.03458 14.3906 8.07724 14.3479L13.6657 8.75944L15.0799 10.1737Z"
                                        fill="#6B6A70" mask="url(#path-1-inside-1_32_2234)"/>
                                <path d="M8 0V10.642" stroke="#6B6A70"/>
                            </svg>
                        </button>
                    </div>
                    <span class="h-full bg-primary w-[1px]"></span>
                </div>
                <div class="h-full uppercase flex flex-col justify-between items-end 2xl:px-10 xl:px-5 px-[17px] 2x:py-[60px] mobile:py-[40px] py-[10px] w-full xl:gap-0 gap-5">
                    <div class="relative flex justify-between w-full xl:justify-end xl:flex-row flex-col gap-5">
                        <h2 class="text-primary! xl:absolute 2xl:-top-7 xl:-top-2 xl:-left-5">
                            <?php echo $title; ?>
                        </h2>
                        <div class="xl:max-w-[213px] max-w-3/4 flex flex-col gap-5 small-text">
                            <?php echo $text; ?>
                        </div>
                    </div>
                    <?php if (!empty($services_types)) : ?>
                        <div class="grid-cols-3 grid 2xl:gap-[44px] gap-5 justify-items-center mr-auto">
                            <?php foreach ($services_types as $service_type) : ?>
                                <button data-book-link="<?php echo esc_attr(json_encode($book_page)); ?>"
                                        data-services='<?php echo esc_attr(json_encode($service_type["services"])); ?>'
                                        data-service-type="<?php echo esc_attr($service_type['type']); ?>"
                                        class="service-type-btn">
                                    <?php echo esc_html($service_type['type']); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($gallery_block):
            $gallery_title_first = $gallery_block['title_first'];
            $gallery_title_second = $gallery_block['title_second'];
            $gallery_title_accent = $gallery_block['title_accent'];
            $gallery_slides = $gallery_block['gallery'];
            ?>
            <section
                    id="gallery"
                    class="bg-dark md:px-10 px-4 pb-[60px] pt-5 z-50 md:min-h-[1119px] h-full flex flex-col relative md:gap-0 gap-8">
                <h2 class="w-full text-white xl:!text-[12vw]/[100%] md:!text-[13vw]/[100%] text-[23vw]/[58%] flex items-baseline justify-between">
                    <span><?php echo esc_html($gallery_title_first) ?>
                    <span class="md:text-[25px]/[100%] text-[12px] tracking-normal lowercase "><?php echo esc_html($gallery_title_accent); ?> </span>
                    </span>


                    <br class="md:hidden block">
                    <?php echo esc_html($gallery_title_second); ?>
                </h2>
                <?php if (!empty($gallery_slides)) : ?>
                    <div class="swiper swiper-gallery flex-1 w-full h-full">
                        <div class="swiper-wrapper h-full min-h-0">
                            <?php
                            // Разбиваем картинки на пачки по 5
                            $chunks = array_chunk($gallery_slides, 5);

                            foreach ($chunks as $chunk_index => $chunk) :
                                $is_last = $chunk_index === array_key_last($chunks);
                                ?>
                                <div class="swiper-slide gallery-slide">
                                    <?php foreach ($chunk as $i => $image) :
                                        $num = $i + 1;
                                        $url = esc_url($image['url'] ?? $image); // если у тебя просто строки, а не массивы
                                        ?>
                                        <figure class="slide-image slide-image-<?php echo $num; ?>"
                                                style="background-image: url('<?php echo $url; ?>')"></figure>
                                    <?php endforeach; ?>

                                    <div class="slide-image slide-buttons">
                                        <?php if ($is_last) : ?>
                                            <p class="end-slide-text">
                                                You can find more <br> works on our
                                                <a target="_blank" class="underline"
                                                   href="https://www.instagram.com/becute.pl/">
                                                    Instagram
                                                </a>
                                            </p>
                                        <?php endif; ?>

                                        <div class="flex gap-5 items-center slide-buttons-container">
                                            <button class="gallery-button-prev disabled:bg-white/10 -rotate-90 rounded-full bg-white w-[64px] h-[64px] flex flex-col items-center justify-center cursor-pointer hover:bg-white/60 transition duration-200">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="path-1-inside-1_32_2239" fill="white">
                                                        <path d="M7.21566 12.1219C7.64884 12.5551 8.35116 12.5551 8.78434 12.1219L14.3728 6.53345L8.78434 0.944997C8.35116 0.511815 7.64884 0.511816 7.21566 0.944997L1.6272 6.53345L7.21566 12.1219Z"/>
                                                    </mask>
                                                    <path d="M8 12.9062L14.3728 6.53345L8 12.9062ZM9.49145 0.237891C8.66775 -0.585815 7.33225 -0.585815 6.50855 0.237891L0.920095 5.82634L2.33431 7.24056L7.92276 1.6521C7.96542 1.60945 8.03458 1.60945 8.07724 1.6521L9.49145 0.237891ZM1.6272 6.53345L8 12.9062L1.6272 6.53345ZM15.0799 5.82634L9.49145 0.237891C8.66775 -0.585815 7.33225 -0.585815 6.50855 0.237891L7.92276 1.6521C7.96542 1.60945 8.03458 1.60945 8.07724 1.6521L13.6657 7.24056L15.0799 5.82634Z"
                                                          fill="#6B6A70" mask="url(#path-1-inside-1_32_2239)"/>
                                                    <path d="M8 16V5.35804" stroke="#6B6A70"/>
                                                </svg>
                                            </button>
                                            <span class="h-[73.92px] w-[1px] bg-white -rotate-35"></span>
                                            <button class="gallery-button-next disabled:bg-white/10 -rotate-90 rounded-full bg-white w-[64px] h-[64px] flex flex-col items-center justify-center cursor-pointer hover:bg-white/60 transition duration-200">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="path-1-inside-1_32_2234" fill="white">
                                                        <path d="M7.21566 3.87809C7.64884 3.44491 8.35116 3.44491 8.78434 3.87809L14.3728 9.46655L8.78434 15.055C8.35116 15.4882 7.64884 15.4882 7.21566 15.055L1.6272 9.46655L7.21566 3.87809Z"/>
                                                    </mask>
                                                    <path d="M8 3.09375L14.3728 9.46655L8 3.09375ZM9.49145 15.7621C8.66775 16.5858 7.33225 16.5858 6.50855 15.7621L0.920095 10.1737L2.33431 8.75944L7.92276 14.3479C7.96542 14.3906 8.03458 14.3906 8.07724 14.3479L9.49145 15.7621ZM1.6272 9.46655L8 3.09375L1.6272 9.46655ZM15.0799 10.1737L9.49145 15.7621C8.66775 16.5858 7.33225 16.5858 6.50855 15.7621L7.92276 14.3479C7.96542 14.3906 8.03458 14.3906 8.07724 14.3479L13.6657 8.75944L15.0799 10.1737Z"
                                                          fill="#6B6A70" mask="url(#path-1-inside-1_32_2234)"/>
                                                    <path d="M8 0V10.642" stroke="#6B6A70"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>

        <?php if ($reviews_block):
            $title = $reviews_block['title'];
            $subtitle = $reviews_block['subtitle'];
            $text = $reviews_block['text'];
            $block_link = $reviews_block['block_link'];
            $reviews = $reviews_block['reviews'];
            ?>
            <section id="clients-say" class="bg-secondary py-[60px]">
                <div class="container">
                    <div class="flex justify-between">
                        <article class="flex items-end flex-col text-primary">
                            <h2 class="text-primary text-[262.55px]"><?php echo $title; ?></h2>
                            <?php if ($subtitle) : ?>
                                <span class="text-[25px]"><?php echo $subtitle ?></span>
                            <?php endif; ?>
                        </article>
                        <?php if ($text) : ?>
                            <article class="h-auto small-text mt-[60px] space-y-[40px] max-w-[243px]">
                                <?php echo $text; ?>
                            </article>
                        <?php endif; ?>
                        <div class="relative flex items-end">
                            <?php if (!empty($block_link)) : ?>
                                <a class="btn mini-gray mr-[-25px]" href="<?php echo esc_url($block_link['url']); ?>">
                                    <?php echo esc_html($block_link['title']); ?>
                                    <i class="arrow"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($book_page)) : ?>
                                <a target="_blank" href="<?php echo esc_url($book_page['url']); ?>" class="btn">
                                    <?php echo esc_html($book_page['title']); ?>
                                    <i class="arrow"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if (!empty($reviews)) : ?>
                        <div class="swiper swiper-reviews">
                            <div class="w-full flex items-end flex-col">
                                <div class="flex gap-5 items-center mb-[37px] mt-[27px] mr-[267px]">
                                    <button class="reviews-button-prev disabled:opacity-50 -rotate-90 rounded-full border-text-secondary border-1 w-[64px] h-[64px] flex flex-col items-center justify-center cursor-pointer hover:bg-white/60 transition duration-200">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <mask id="path-1-inside-1_32_2239" fill="white">
                                                <path d="M7.21566 12.1219C7.64884 12.5551 8.35116 12.5551 8.78434 12.1219L14.3728 6.53345L8.78434 0.944997C8.35116 0.511815 7.64884 0.511816 7.21566 0.944997L1.6272 6.53345L7.21566 12.1219Z"/>
                                            </mask>
                                            <path d="M8 12.9062L14.3728 6.53345L8 12.9062ZM9.49145 0.237891C8.66775 -0.585815 7.33225 -0.585815 6.50855 0.237891L0.920095 5.82634L2.33431 7.24056L7.92276 1.6521C7.96542 1.60945 8.03458 1.60945 8.07724 1.6521L9.49145 0.237891ZM1.6272 6.53345L8 12.9062L1.6272 6.53345ZM15.0799 5.82634L9.49145 0.237891C8.66775 -0.585815 7.33225 -0.585815 6.50855 0.237891L7.92276 1.6521C7.96542 1.60945 8.03458 1.60945 8.07724 1.6521L13.6657 7.24056L15.0799 5.82634Z"
                                                  fill="#6B6A70" mask="url(#path-1-inside-1_32_2239)"/>
                                            <path d="M8 16V5.35804" stroke="#6B6A70"/>
                                        </svg>
                                    </button>
                                    <span class="reviews-swiper-pagination"></span>
                                    <button class="reviews-button-next disabled:opacity-50 -rotate-90 rounded-full border-text-secondary border-1 w-[64px] h-[64px] flex flex-col items-center justify-center cursor-pointer hover:bg-white/60 transition duration-200">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <mask id="path-1-inside-1_32_2234" fill="white">
                                                <path d="M7.21566 3.87809C7.64884 3.44491 8.35116 3.44491 8.78434 3.87809L14.3728 9.46655L8.78434 15.055C8.35116 15.4882 7.64884 15.4882 7.21566 15.055L1.6272 9.46655L7.21566 3.87809Z"/>
                                            </mask>
                                            <path d="M8 3.09375L14.3728 9.46655L8 3.09375ZM9.49145 15.7621C8.66775 16.5858 7.33225 16.5858 6.50855 15.7621L0.920095 10.1737L2.33431 8.75944L7.92276 14.3479C7.96542 14.3906 8.03458 14.3906 8.07724 14.3479L9.49145 15.7621ZM1.6272 9.46655L8 3.09375L1.6272 9.46655ZM15.0799 10.1737L9.49145 15.7621C8.66775 16.5858 7.33225 16.5858 6.50855 15.7621L7.92276 14.3479C7.96542 14.3906 8.03458 14.3906 8.07724 14.3479L13.6657 8.75944L15.0799 10.1737Z"
                                                  fill="#6B6A70" mask="url(#path-1-inside-1_32_2234)"/>
                                            <path d="M8 0V10.642" stroke="#6B6A70"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="swiper-wrapper">
                                <?php foreach ($reviews as $review) : ?>
                                    <div class="swiper-slide bg-[#EEEEF0] rounded-[30px] p-[30px] !h-auto">
                                        <div class="flex flex-col gap-[30px]">
                                            <div class="flex items-center gap-2.5">
                                                <img class="w-[51px] h-[51px] rounded-full object-center object-cover"
                                                     src="<?php echo esc_url($review['avatar']['sizes']['thumbnail']); ?>"
                                                     alt="<?php echo esc_attr($review['name']); ?>">
                                                <p class="text-[25px] font-medium"><?php echo esc_html($review['name']); ?></p>
                                            </div>
                                            <div class="h-[1px] w-full bg-primary"></div>
                                            <article class="small-text">
                                                <?php echo $review['text']; ?>
                                            </article>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($address_block):
            $map_iframe_link = $address_block['map-iframe_link'];
            $house_number = $address_block['address']['house_number'];
            $street = $address_block['address']['street'];
            $superheading = $address_block['superheading'];
            $title = $address_block['title'];
            $block_link = $address_block['block_link'];
            $google_maps_link = $address_block['google_maps_link'];

            ?>
            <section id="find-us" class="py-[60px]">
                <div class="container">
                    <div class="flex justify-between">
                        <div class="flex flex-col gap-3.5">
                            <?php if ($map_iframe_link): ?>
                                <iframe class="w-[976px] h-[790px] rounded-[30px]"
                                        src="<?php echo esc_url($map_iframe_link); ?>"
                                        style="border:0;"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            <?php endif; ?>
                            <?php if ($address_block['address']): ?>
                                <address
                                        class="text-[67px]/[normal] text-white max-w-[736px] flex items-center gap-[34px] not-italic">
                                    <span class="text-[200px] tracking-[-16px]"><?php echo esc_html($house_number); ?></span>
                                    <?php echo esc_html($street); ?>
                                </address>
                            <?php endif; ?>
                        </div>
                        <div class="flex flex-col justify-between">
                            <article class="max-w-[535px] relative">
                                <p class="text-[25px] text-secondary ml-6"><?php echo esc_html($superheading); ?></p>
                                <h2 class="text-[262.55px] text-right"><?php echo esc_html($title); ?></h2>
                                <aside class="text-white max-w-max absolute bottom-6 left-6">
                                    <?php if (count($work_time) === 2) : ?>
                                        <p class="text-[30px]">
                                            <time datetime="<?= esc_attr($work_time['from']) ?>"><?= esc_html($work_time['from']) ?></time>
                                            -
                                            <time datetime="<?= esc_attr($work_time['to']) ?>"><?= esc_html($work_time['to']) ?></time>
                                        </p>
                                    <?php endif; ?>

                                    <?php if (!empty($work_days)) : ?>
                                        <p class="mt-2 border-t border-[#EEEEF0] text-[15px] pt-[5px]"><?php echo esc_html($work_days); ?></p>
                                    <?php endif; ?>
                                </aside>
                            </article>
                            <div class="relative flex items-end">
                                <?php if (!empty($block_link)) : ?>
                                    <a class="btn mini left-[25px]" href="<?php echo esc_url($block_link['url']); ?>">
                                        <?php echo esc_html($block_link['title']); ?>
                                        <i class="arrow"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($google_maps_link)) : ?>
                                    <a target="_blank"
                                       href="<?php echo esc_url($google_maps_link['url']); ?>"
                                       class="btn">
                                        <?php echo esc_html($google_maps_link['title']); ?>
                                        <i class="arrow"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>
<?php
get_footer();
