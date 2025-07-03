<?php get_header(); ?>

<main class="main-content">
    <div class="container">

        <!-- 手机端轮播图 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <?php
        // 获取一篇文章的ID（用来取ACF字段）
        $first_post = get_posts([
        'numberposts' => 1,
        'post_type' => 'post',
        ]);

        if ($first_post) {
        $post_id = $first_post[0]->ID;
        $images = [];

        for ($i = 1; $i <= 5; $i++) {
            $img = get_field("banner_image_$i", $post_id);
            if ($img) {
            $images[] = $img;
            }
        }

        if (!empty($images)) :
        ?>

        <div class="swiper nh-banner h-110 mb-5">
        <div class="swiper-wrapper">
            <?php foreach ($images as $img): ?>
            <div class="swiper-slide">
                <img src="<?php echo esc_url($img); ?>" class="w-full h-full object-cover" alt="" />
            </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
        </div>
        <?php endif; } ?>

        <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            },
            pagination: {
            el: '.swiper-pagination',
            clickable: true,
            }
        });
        </script>

        <!--  -->
        <div class="ss-a">
            <div class="ss-b">
                <div class="ss-d">
                    <div class="ss-e">
                        <!-- <img class='ss-g' src="" alt=""> -->
                        <i class="fa-solid fa-tag ss-g"></i>
                        <span>Discount 15%</span>
                    </div>
                    <div class="ss-f">
                        VIP maximum
                    </div>

                </div>
                <div class="ss-d">
                    <div class="ss-e">
                        <!-- <img class='ss-g' src="" alt=""> -->
                        <i class="fa-solid fa-right-from-bracket ss-g"></i>
                        <span>Return & Refund</span>
                    </div>
                    <div class="ss-f">
                        30-day Aftersales Guarantee
                    </div>
                </div>
            </div>
            <div class="ss-c">
                <img src="https://image3.nihaojewelry.com/fit-in/710x40/filters:quality(80)/filters:format(webp)/eh/2024-06-25/171927992773243726/picture.png">
            </div>
        </div>

        <!--  -->
        <a href="#" class="sy-a">
            <div class="sy-b">
                <div class="sy-c">
                    <div class="sy-e">
                        <div class="sy-z">
                            <!-- New User Deal -->
                            <?php echo esc_html(t([
                                'en' => 'New User Deal',
                                'es' => 'Oferta para nuevos usuarios',
                                'ru' => 'Сделка для новых пользователей'
                            ])); ?>
                        </div>
                        <div class="sy-o">
                            <i class="fa-solid fa-truck sz-a"></i>
                            <span class="sz-b">
                                <!-- FREE SHIPPING -->
                                <?php echo esc_html(t([
                                    'en' => 'FREE SHIPPING',
                                    'es' => 'ENVÍO GRATIS',
                                    'ru' => 'БЕСПЛАТНАЯ ДОСТАВКА'
                                ])); ?>
                            </span>
                        </div>
                    </div>
                    <i class="fa-solid fa-angle-right sy-j"></i>
                </div>
                <div class="sy-d">
                    <div class="sz-o">
                        <div class="sz-r">
                            <div>
                                <img class='ch-a' src="	https://picsum.photos/id/1015/150/150" alt="">
                                <div class="ch-b">
                                    <div class="ch-d">
                                        AU$ 0.58
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sz-r">
                            <div>
                                <img class='ch-a' src="	https://picsum.photos/id/1015/150/150" alt="">
                                <div class="ch-b">
                                    <div class="ch-d">
                                        AU$ 0.58
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sz-p">
                        <img class='as-b' src="http://my-website.local/wp-content/uploads/2025/05/20250526-134336.jpg" alt="">
                        <div class="as-a">
                            <!-- SHOP NOW -->
                            <?php echo esc_html(t([
                                'en' => 'SHOP NOW',
                                'es' => 'COMPRAR AHORA',
                                'ru' => 'КУПИТЬ СЕЙЧАС'
                            ])); ?>
                        </div>
                    </div>
                </div>
            </div>
        </a>


        <?php
        $is_home = is_front_page() || is_home() || is_product_category();
        $extra_class = $is_home ? 'only-mobile-home' : '';
        ?>


        <div class="category-navbar <?php echo $extra_class; ?>" style="padding: 16px;">
            <ul class="category-navbar-item" style="display: flex; gap: 15px; padding: 0; list-style: none;">

                <?php
                $terms = get_terms([
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => false,
                ]);

                foreach ($terms as $term):
                    $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                    $image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : wc_placeholder_img_src();
                    $link = get_term_link($term);
                    $name = get_translated_category_name($term); // 多语言分类名
                ?>

                <li style="text-align: center;">
                    <a href="<?php echo esc_url($link); ?>">
                        <div class="category-navbar-item-pic" style="margin-bottom: 5px;">
                            <img src="<?php echo esc_url($image_url); ?>" width="80" height="80" alt="<?php echo esc_attr($name); ?>" style="border-radius: 50px; object-fit: cover;">
                        </div>
                        <div class="category-navbar-item-title" style="text-align: center;">
                            <span style="font-size: 12px;"><?php echo esc_html($name); ?></span>
                        </div>
                    </a>
                </li>

                <?php endforeach; ?>

            </ul>
        </div>

        <?php if ( !is_front_page() && !is_product_category()  ): ?>

        <div class="category-navbar" style="padding: 16px; display: none;">
            <ul class="category-navbar-item" style="display: flex; gap: 15px; padding: 0; list-style: none;">

                <?php
                $terms = get_terms([
                'taxonomy'   => 'product_cat',
                // 'parent'     => 0,
                'hide_empty' => false,
                ]);

                foreach ($terms as $term):
                $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                $image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : wc_placeholder_img_src();
                $link = get_term_link($term);
                $name = $term->name;
                ?>

                <li style="text-align: center;">
                <a href="<?php echo esc_url($link); ?>">
                    <div class="category-navbar-item-pic" style="margin-bottom: 5px;">
                    <img src="<?php echo esc_url($image_url); ?>" width="80" height="80" alt="<?php echo esc_attr($name); ?>" style="border-radius: 50px; object-fit: cover;">
                    </div>
                    <div class="category-navbar-item-title" style="text-align: center;">
                    <span style="font-size: 12px;"><?php echo esc_html($name); ?></span>
                    </div>
                </a>
                </li>

                <?php endforeach; ?>

            </ul>
        </div>

        <?php endif; ?>

        <!-- mobile-flash-sale -->
        <div class="qwe">
            <div class="wer">
                <a class="sdf" href="#">
                    <i class="fa-solid fa-bolt xcv"></i>
                    <span>
                        <!-- Flash Deal -->
                        <?php echo esc_html(t([
                            'en' => 'Flash Deal',
                            'es' => 'Oferta relámpago',
                            'ru' => 'Горячая сделка'
                        ])); ?>
                    </span>
                    
                    <span class="dfg">
                        <i class="fa-solid fa-angle-right yhn"></i>
                    </span>


                </a>

                <?php
                // 获取后台设置的截止时间
                $deadline = get_field('flash_deadline'); // e.g. 2025-06-18 14:30:00
                ?>
                <?php if ($deadline): ?>

                <div id="countdown" data-deadline="<?php echo esc_attr($deadline); ?>" role="timer" class="van-count-down">
                    <div class="flash-deals-countdown flex text-12">
                        <div class="hh bg-black text-white rounded px-3">00</div>
                        <span class="drive mx-2">:</span>
                        <div class="mm bg-black text-white rounded px-3">00</div>
                        <span class="drive mx-2">:</span>
                        <div class="ss bg-black text-white rounded px-3 min-w-21">00</div>
                    </div>
                </div>
                <?php endif; ?>

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                    const countdown = document.getElementById("countdown");
                    if (!countdown) return;

                    const deadlineStr = countdown.dataset.deadline;
                    const deadline = new Date(deadlineStr.replace(/-/g, '/')).getTime();

                    const hEl = countdown.querySelector('.hh');
                    const mEl = countdown.querySelector('.mm');
                    const sEl = countdown.querySelector('.ss');

                    function updateCountdown() {
                        const now = new Date().getTime();
                        const diff = deadline - now;

                        if (diff <= 0) {
                        hEl.textContent = '00';
                        mEl.textContent = '00';
                        sEl.textContent = '00';
                        return;
                        }

                        const hours = String(Math.floor(diff / (1000 * 60 * 60))).padStart(2, '0');
                        const minutes = String(Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
                        const seconds = String(Math.floor((diff % (1000 * 60)) / 1000)).padStart(2, '0');

                        hEl.textContent = hours;
                        mEl.textContent = minutes;
                        sEl.textContent = seconds;
                    }

                    updateCountdown(); // 初始显示
                    setInterval(updateCountdown, 1000);
                    });
                </script>

            </div>






            <!-- Flash Deal -->
            <div class="asd">
                <?php
                $args = [
                    'post_type'      => 'product',
                    'posts_per_page' => 8, // 显示商品数量
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'meta_query'     => [
                    [ 'key' => '_sale_price', 'compare' => 'EXISTS' ] // 只显示促销商品
                    ]
                ];

                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                    global $product;
                    $product_id = get_the_ID();
                    $regular_price = $product->get_regular_price();
                    $sale_price = $product->get_sale_price();
                    $discount_percent = $regular_price > 0 ? round((($regular_price - $sale_price) / $regular_price) * 100) : 0;
                ?>
                    <div class="lsk">
                    <a href="<?php echo get_permalink($product_id); ?>">
                        <!-- 折扣 -->
                        <?php if ($sale_price && $regular_price && $discount_percent > 0): ?>
                        <div class="vbx">
                            <i class="fa-solid fa-bolt aasx"></i>
                            -<?php echo $discount_percent; ?>%
                        </div>
                        <?php endif; ?>

                        <!-- 商品图 -->
                        <img class="ybb" src="<?php echo get_the_post_thumbnail_url($product_id, 'medium'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">

                        <!-- 原现价 -->
                        <div class="oaa">
                        <div class="ksrn">AU <?php echo wc_price($sale_price, ['currency' => 'AUD']); ?></div>
                        <div class="ihis">AU <?php echo wc_price($regular_price, ['currency' => 'AUD']); ?></div>
                        </div>
                    </a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

        </div>

        <!-- 手机端邀请登录 -->
        <div class="ormzd">
            <!-- close -->
            <i class="fa-solid fa-xmark yyyyz"></i>
            <div class="or-a">
                REGISTER AND GET 40USD COUPON!
            </div>
            <!-- register -->
            <button class="or-b">
                REGISTER
            </button>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
            const popup = document.querySelector('.ormzd');
            const closeBtn = document.querySelector('.yyyyz');
            const registerBtn = document.querySelector('.or-b');

            // 如果之前关闭过，就不显示
            if (localStorage.getItem('popupClosed') === 'true') {
                popup.classList.add('hidden');
            }

            // 点击关闭按钮：隐藏并记住
            closeBtn.addEventListener('click', function () {
                popup.classList.add('hidden');
                localStorage.setItem('popupClosed', 'true');
            });

            // 点击注册按钮：跳转页面
            registerBtn.addEventListener('click', function () {
                window.location.href = '/my-account'; // 可改为 /register 等
            });
            });
        </script>

        <!-- 三栏 -->
        <div class="main-content-up">
            <!-- left -->
            <div class="m-content-list">
                <ul>
                    <?php
                    $categories = get_terms([
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => false
                    ]);

                    foreach ($categories as $category):
                        $category_link = get_term_link($category);
                        // $category_name = $category->name;
                        $category_name = get_translated_category_name($category);

                    ?>
                    <li>
                        <!-- 左侧一级分类链接 -->
                        <a class='cee' href="<?php echo esc_url($category_link); ?>">
                            <span><?php echo esc_html($category_name); ?></span>
                            <i class="fa-solid fa-angle-right"></i>
                        </a>

                        <!-- 右侧悬停展示的产品菜单 -->
                        <div class="sidebar-sec">
                            <div class="sisc-con">
                                <!-- 分类标题 -->
                                <a class="dee">
                                    <h2><?php echo esc_html($category_name); ?></h2>
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>

                                <!-- 产品网格 -->
                                <div>
                                    <div class="sec-showgrid">
                                        <?php
                                        $products = wc_get_products([
                                            'limit'    => 6,
                                            'status'   => 'publish',
                                            'category' => [$category->slug],
                                        ]);

                                        foreach ($products as $product):
                                            $product_id    = $product->get_id();
                                            $product_title = get_translated_product_title($product); 
                                            $product_link  = get_permalink($product_id);
                                            $image_array   = wp_get_attachment_image_src($product->get_image_id(), 'thumbnail');
                                            $product_img   = $image_array ? $image_array[0] : 'https://via.placeholder.com/80';
                                        ?>
                                        <div>
                                            <a href="<?php echo esc_url($product_link); ?>">
                                                <img src="<?php echo esc_url($product_img); ?>" alt="<?php echo esc_attr($product_title); ?>">
                                                <span><?php echo esc_html($product_title); ?></span>
                                            </a>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- middle -->
            <div class="m-content-banner">
                <!-- 轮播图 -->
                <div class="shell">
                    <ul class="images">
                        <li class="img"></li>
                        <li class="img"></li>
                        <li class="img"></li>
                        <li class="img"></li>
                        <li class="img"></li>
                    </ul>

                    <div class="button">
                        <div class="button-left">&lt;</div>
                        <div class="button-right">&gt;</div>
                    </div>
                </div>

                <!-- flash sale -->
                <div class="m-flashsale">
                    <div class="flash-left">
                        <!-- 倒计时标题 -->
                        <div>
                            <div class="m-f">
                                <!-- Flash Deal -->
                                <?php echo t([
                                    'en' => 'Flash Deal',
                                    'ru' => 'Горячая сделка',
                                    'es' => 'Oferta relámpago'
                                ]); ?>
                            </div>
                            <div class="m-ff"><a href='#' class="m-fff">
                                <!-- Up to 80% off for a limited time >> -->
                                <?php echo t([
                                    'en' => 'Up to 80% off for a limited time >>',
                                    'ru' => 'Скидки до 80% в течение ограниченного времени >>',
                                    'es' => 'Hasta un 80% de descuento por tiempo limitado >>'
                                ]); ?>
                            </a></div>
                        </div>
                        <!-- 倒计时及标语 -->
                        <div class="m-count">
                            <div class="m-c1">
                                <span>
                                    <!-- ends in -->
                                    <?php echo t([
                                        'en' => 'ends in',
                                        'ru' => 'заканчивается в',
                                        'es' => 'termina en'
                                    ]); ?>
                                </span>
                                <span>:</span>
                            </div>
                            <div class="m-c2">
                                <div class="boom">66</div>
                                <div class="time">H</div>
                                <div class="boom">66</div>
                                <div class="time">M</div>
                                <div class="boom">66</div>
                                <div class="time">S</div>

                            </div>
                        </div>
                    </div>
                    <!-- 轮播图 -->
                    <div class="carousel-wrapper">
                        <button class="carousel-btn left">&#8249;</button>
                            <div class="carousel-track-wrapper">
                                <div class="carousel-track" id="track">
                                <!-- JS 会动态填充内容 -->
                                </div>
                            </div>
                        <button class="carousel-btn right">&#8250;</button>
                    </div>
                </div>

                
            </div>

            <!-- right -->
            <div class="m-content-register">
                <div class="m-up">
                    <div class="m-up-up flex-center">
                        <div class="m-upp">
                            <img src="http://my-website.local/wp-content/uploads/2025/05/img_v3_02lf_a440cb43-b083-46ff-8089-9c17ea754d8g.png" alt="logo">
                            <div>
                                <!-- Hello, Welcome to Perhiasan Direct -->
                                <?php echo t([
                                    'en' => 'Hello, Welcome to Jewelry Direct',
                                    'ru' => 'Здравствуйте, добро пожаловать в Jewelry Direct',
                                    'es' => 'Hola, bienvenido a Jewelry Direct'
                                ]); ?>
                            </div>
                        </div>
                        <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="flex-center" style="background-color: #d32f2f;">
                            <!-- Login -->
                            <?php echo t([
                                    'en' => 'Login',
                                    'ru' => 'Авторизоваться',
                                    'es' => 'Acceso'
                            ]); ?>
                        </a>
                        <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="flex-center" style="background-color: #555;">
                            <!-- Register -->
                            <?php echo t([
                                    'en' => 'Login',
                                    'ru' => 'Зарегистрироваться',
                                    'es' => 'Acceso'
                            ]); ?>

                        </a>
                    </div>
                    <div class="m-up-down">
                        <div class="m-d-1">
                            <div class="m-u">
                                <div class="m-u-1">
                                    <!-- New User Benefits -->
                                    <?php echo t([
                                        'en' => 'New User Benefits',
                                        'ru' => 'Преимущества для новых пользователей',
                                        'es' => 'Beneficios para nuevos usuarios'
                                    ]); ?>
                                </div>
                            </div>
                            <div class="m-d">
                                <a class="m-d-1">
                                    <div class="m-d-im">
                                        <img src="http://my-website.local/wp-content/uploads/2025/05/new_logo.jpg" alt="coupon">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href='#' class="m-down">
                    <!-- New user deal -->
                    <div class="m-d-t">
                        <div class="md-u">
                            <span>
                                <!-- New User Deal -->
                                <?php echo t([
                                    'en' => 'New User Deal',
                                    'ru' => 'Сделка для новых пользователей',
                                    'es' => 'Oferta para nuevos usuarios'
                                ]); ?>
                            </span>
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                        <div class="md-d">
                            <i class="fa-solid fa-truck"></i>
                            <span>
                                <!-- Free Shipping -->
                                <?php echo t([
                                    'en' => 'Free Shipping',
                                    'ru' => 'Бесплатная доставка',
                                    'es' => 'Envío gratis'
                                ]); ?>
                            </span>
                        </div>
                    </div>
                    <!-- New user pic -->
                    <div class="m-d-p">
                        <div class="mp-two">
                            <div class="mmp">
                                <div class="mmp-img">
                                    <img src="http://my-website.local/wp-content/uploads/2025/05/20250526-134258.jpg">
                                </div>
                                <div class="mmp-small">
                                    25%
                                </div>
                            </div>
                            <div class="mmp">
                                <div class="mmp-img">
                                    <img src="http://my-website.local/wp-content/uploads/2025/05/20250526-134258.jpg">
                                </div>
                                <div class="mmp-small">
                                    25%
                                </div>
                            </div>
                        </div>
                        <div class="mp-one">
                            <div class="mo">
                                <img src="http://my-website.local/wp-content/uploads/2025/05/20250526-134336.jpg">
                            </div>
                        </div>
                    </div>
                    <!-- New user shop -->
                    <div class="m-d-s">
                        <button>
                            <!-- SHOP NOW -->
                            <?php echo t([
                                    'en' => 'SHOP NOW',
                                    'ru' => 'КУПИТЬ СЕЙЧАС',
                                    'es' => 'COMPRAR AHORA'
                            ]); ?>
                        </button>
                    </div>
                </a>
            </div>


        </div>
        <!-- 四图标 -->
        <div class="main-content-down">
            <!-- bottom -->
            <div class="m-content-four">
                <ul class="four-icon">
                    <li>
                        <i class="fa-solid fa-truck-fast fa-2xl"></i>
                        <div class="four-icon-span">
                            <span>
                                <!-- Worldwide Shipping -->
                                <?php echo t([
                                    'en' => 'Worldwide Shipping',
                                    'ru' => 'Доставка по всему миру',
                                    'es' => 'Envíos a todo el mundo'
                                ]); ?>
                            </span>
                            <span>
                                <!-- Fast & Reliable Global Delivery, Duties Included -->
                                <?php echo t([
                                    'en' => 'Fast & Reliable Global Delivery, Duties Included',
                                    'ru' => 'Быстрая и надежная доставка по всему миру, пошлины включены',
                                    'es' => 'Entrega global rápida y confiable, impuestos incluidos'
                                ]); ?>
                            </span>
                        </div>
                    </li>
                    <li>
                        <i class="fa-solid fa-arrow-trend-up fa-2xl"></i>
                        <div class="four-icon-span">
                            <span>
                                <!-- Daily Updates of Trendy Products -->
                                <?php echo t([
                                    'en' => 'Daily Updates of Trendy Products',
                                    'ru' => 'Ежедневные обновления трендовых товаров',
                                    'es' => 'Actualizaciones diarias de productos de moda'
                                ]); ?>

                            </span>
                            <span>
                                <!-- Stay Ahead with Fresh Styles Updated Daily -->
                                <?php echo t([
                                    'en' => 'Stay Ahead with Fresh Styles Updated Daily',
                                    'ru' => 'Оставайтесь впереди со свежими стилями, обновляемыми ежедневно',
                                    'es' => 'Manténgase a la vanguardia con estilos nuevos actualizados diariamente'
                                ]); ?>
                            </span>
                        </div>
                    </li>
                    <li>
                        <i class="fa-solid fa-receipt fa-2xl"></i>
                        <div class="four-icon-span">
                            <span>
                                <!-- No MOQ, Factory Direct Supply -->
                                <?php echo t([
                                    'en' => 'No MOQ, Factory Direct Supply',
                                    'ru' => 'Нет минимального заказа, прямые поставки с завода',
                                    'es' => 'Sin MOQ, suministro directo de fábrica'
                                ]); ?>
                            </span>
                            <span>
                                <!-- Start Small, Buy Smart — No Minimums Required -->
                                <?php echo t([
                                    'en' => 'Start Small, Buy Smart — No Minimums Required',
                                    'ru' => 'Начните с малого, покупайте с умом — минимальные суммы не требуются',
                                    'es' => 'Comience pequeño, compre inteligente - No se requieren mínimos'
                                ]); ?>
                            </span>
                        </div>
                    </li>
                    <li>
                    <i class="fa-solid fa-comment-dots fa-2xl"></i>
                        <div class="four-icon-span">
                            <span>
                                <!-- Exclusive Customer Manager -->
                                <?php echo t([
                                    'en' => 'Exclusive Customer Manager',
                                    'ru' => 'Эксклюзивный менеджер по работе с клиентами',
                                    'es' => 'Gerente de Clientes Exclusivo'
                                ]); ?>
                            </span>
                            <span>
                                <!-- Dedicated Support Anytime, Just for You -->
                                <?php echo t([
                                    'en' => 'Dedicated Support Anytime, Just for You',
                                    'ru' => 'Специализированная поддержка в любое время, только для вас',
                                    'es' => 'Soporte dedicado en cualquier momento, solo para ti'
                                ]); ?>
                            </span>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
        <!-- 趋势板块 -->
        <section class="trendy-part m-part">
            <!-- title -->
            <div class="tren-title m-title">
                <h2>
                    <!-- Wholesale Trendy Discovery -->
                    <?php echo t([
                        'en' => 'Wholesale Trendy Discovery',
                        'ru' => 'Оптовые модные открытия',
                        'es' => 'Descubrimiento de moda al por mayor'
                    ]); ?>
                </h2>
                <div></div>
            </div>
            <!-- products-grid -->
            <div class="tren-grid grid">
            <?php
            $term_slugs = ['ring','bracelet','necklace','earrings'];
            $terms = get_terms([
                'taxonomy' => 'product_cat',
                'hide_empty' => true,
                // 'number' => 5 // 控制显示多少个分类
                'slug' => $term_slugs,
            ]);

            foreach ($terms as $cat):
                $thumb_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
                $thumb_url = wp_get_attachment_url($thumb_id);
                $cat_link = get_term_link($cat->term_id, 'product_cat');

                // 获取该分类下前两个商品的图像
                $args = [
                    'post_type' => 'product',
                    'posts_per_page' => 2,
                    'tax_query' => [[
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $cat->term_id,
                    ]]
                ];
                $products = new WP_Query($args);
                ?>
                <div class="tren-product">
                    <a href="<?php echo esc_url($cat_link); ?>">
                        <!-- 类目图 -->
                        <div class="tp-u">
                            <div class="tp-b">
                                <img src="<?php echo esc_url($thumb_url ?: 'https://via.placeholder.com/250'); ?>">
                            </div>
                            <?php if ($products->have_posts()): ?>
                                <?php while ($products->have_posts()): $products->the_post(); global $product; ?>
                                    <div class="tp-s">
                                        <img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'thumbnail'); ?>">
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>

                        <!-- 类目名 & 数量 -->
                        <div class="tp-d">
                            <div>
                                <!-- <div class="tp-1"><?php echo esc_html($cat->name); ?></div> -->
                                
                                <div class="tp-1"><?php echo esc_html(get_translated_category_name($cat)); ?></div>

                                

                                <div class="tp-2"><?php echo $cat->count; ?> 
                                    <!-- products -->
                                    <?php echo t([
                                        'en' => 'products',
                                        'ru' => 'продукты',
                                        'es' => 'productos'
                                    ]); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

            <!-- 更多按钮区域 -->
            <div class="tren-more">
                <div class="tren-container grid">
                    <?php for ($i = 0; $i < 10; $i++): ?>
                    <div><a href="#">
                        <!-- More -->
                        <?php echo t([
                            'en' => 'More',
                            'ru' => 'Более',
                            'es' => 'Más'
                        ]); ?>
                    </a></div>
                    <?php endfor; ?>
                </div>  
            </div>
            </div>

        </section>
        <!-- 推荐板块 -->
        <section class="recommend-part n-part">
            <!-- title -->
            <div class="reco-title m-title">
                <h2>
                    <!-- Recommend For You -->
                    <?php echo t([
                        'en' => 'Recommend For You',
                        'ru' => 'Рекомендовать для вас',
                        'es' => 'Recomendado para ti'
                    ]); ?>
                </h2>
                <div></div>
            </div>
            <!-- products-grid -->
            <div class="reco-grid grid">
                <?php
                    $taxonomy     = 'product_cat';
                    $orderby      = 'name';
                    $show_count   = 0;
                    $pad_counts   = 0;
                    $hierarchical = 1;
                    $title        = '';
                    $empty        = 0;

                    $args = array(
                        'taxonomy'     => $taxonomy,
                        'orderby'      => $orderby,
                        'show_count'   => $show_count,
                        'pad_counts'   => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li'     => $title,
                        'hide_empty'   => $empty
                    );

                    $all_categories = get_categories( $args );

                    foreach ($all_categories as $cat) {
                        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                        $image = wp_get_attachment_url( $thumbnail_id );
                        $link = get_term_link( $cat->term_id, 'product_cat' );
                        ?>
                        <div class="hei">
                        <a href="<?php echo esc_url($link); ?>">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($cat->name); ?>">
                            <div class="yes">
                            
                            <span><?php echo esc_html(get_translated_category_name($cat)); ?></span>
                            
                            </div>
                        </a>
                        </div>
                        <?php
                    }
                ?>
            </div>

            

        </section>
        <!-- 各类 -->
        <section class="random-part grid">
            <?php
            $term_slugs = ['ring','bracelet','necklace','earrings'];
            $terms = get_terms([
                'taxonomy' => 'product_cat',
                // 'number' => 4, // 控制显示几个分类
                'slug' => $term_slugs,
                'hide_empty' => false,
            ]);

            foreach ($terms as $term):
                $term_link = get_term_link($term);
                // $term_name = $term->name;
                $term_name = get_translated_category_name($term);

                $term_description = term_description($term->term_id, 'product_cat');

                // 获取该分类下的一个产品
                $product_args = [
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'tax_query' => [[
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $term->term_id,
                    ]],
                ];
                $product_loop = new WP_Query($product_args);
                ?>
                <div class="random-sec">
                    <!-- 类目title -->
                    <h2><?php echo esc_html($term_name); ?></h2>

                    <!-- 类目描述与查看 -->
                    <div class="des-more">
                        <span><?php echo wp_trim_words(strip_tags($term_description), 20); ?></span>
                        <a href="<?php echo esc_url($term_link); ?>">
                            <!-- More &gt; -->
                            <?php echo t([
                                'en' => 'More &gt;',
                                'ru' => 'Подробнее &gt;',
                                'es' => 'Más &gt;'
                            ]); ?>
                        </a>
                    </div>

                    <!-- 类目图块 -->
                    <div class="ran-kuai" style="display: grid; gap: 15px;">
                        <?php if ($product_loop->have_posts()) : while ($product_loop->have_posts()) : $product_loop->the_post(); global $product; ?>
                            <div>
                                <!-- 类目中产品图 -->
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'medium'); ?>">
                                </a>
                                <!-- 价格与加收藏 -->
                                <div class='kks' style="display: flex; justify-content: space-between;">
                                    <div class="kks-s">
                                        <!-- 价格 -->                               
                                        <?php echo $product->get_price_html(); ?>  
                                    </div>
                                    <!-- 加收藏 -->                                                                  
                                    <a href="#" 
                                        class="add_to_wishlist single_add_to_wishlist" 
                                        data-product-id="<?php echo esc_attr($product->get_id()); ?>" 
                                        data-product-type="simple" 
                                        data-title="Add to wishlist">
                                        <i class="fa-solid fa-heart-circle-plus"></i>
                                    </a>                                
                                </div>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
        <!-- 评论板块 -->        
        <section class="review-part z-part">
            <!-- title -->
            <div class="review-title m-title">
                <h2>
                    <!-- Review -->
                    <?php echo t([
                        'en' => 'Review',
                        'ru' => 'Обзор',
                        'es' => 'Revisar'
                    ]); ?>
                </h2>
                <div></div>
            </div>

            <!-- 自定义结构中嵌入插件内容 -->
            <div class="review-con review-y">
                <?php echo do_shortcode('[cusrev_all_reviews number=5]'); ?>
            </div>
        </section>
        <!-- 推荐板块2 -->
        <section class="foryou-part s-part">
            <!-- title -->
            <div class="foryou-title m-title">
                <h2>
                    <!-- Recommendations of High Quality Products -->
                    <?php echo t([
                        'en' => 'Recommendations of High Quality Products',
                        'ru' => 'Рекомендации по высококачественной продукции',
                        'es' => 'Recomendaciones de productos de alta calidad'
                    ]); ?>
                </h2>
                <div></div>
            </div>

            <!-- choose -->
            <div class="foryou-choose">
                <div class="fy-1">
                    <!-- ❤️ Just for you -->
                    <?php echo t([
                        'en' => '❤️ Just for you',
                        'ru' => '❤️ Только для тебя',
                        'es' => '❤️Solo para ti'
                    ]); ?>
                </div>
                
                <div class="fy-2">
                    <div class="fy-3 active" data-category="all-categories">
                        <div class="fy-4">
                           
                            <?php echo t([
                                'en' => 'All Categories',
                                'ru' => 'Все категории',
                                'es' => 'Todas las categorías'
                            ]); ?>
                        </div>
                        <div class="fy-5"></div>
                    </div>

                    <?php
                    $slugs = ['ring', 'bracelet', 'necklace', 'earrings']; // 控制要显示的分类 slug
                    $categories = get_terms([
                        'taxonomy' => 'product_cat',
                        'slug'     => $slugs,
                        'hide_empty' => false,
                    ]);

                    foreach ($categories as $cat):
                        $translated_name = get_translated_category_name($cat);
                        $slug = esc_attr($cat->slug);
                    ?>
                    <div class="fy-3" data-category="<?php echo $slug; ?>">
                        <div class="fy-4"><?php echo esc_html($translated_name); ?></div>
                        <div class="fy-5"></div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                const items = document.querySelectorAll(".fy-3");

                items.forEach(item => {
                    item.addEventListener("click", function () {
                    // 移除所有 .active
                    items.forEach(i => i.classList.remove("active"));
                    // 当前点击项添加 .active
                    this.classList.add("active");
                    });
                });
                });
            </script>


            <!-- products-grid（AJAX加载区域） -->
            <div class="foryou-goods" id="ajax-product-grid">
                <p>
                    <!-- Loading... -->
                    <?php echo t([
                        'en' => 'Loading...',
                        'ru' => 'Загрузка...',
                        'es' => 'Cargando...'
                    ]); ?>
                </p>
            </div>

        </section>
        <!-- more -->
        <div class="more-part">

        </div>
        <!-- about -->
        <section class="about-part">
            <!-- logo & title -->
            <div class="l-t">
                <div class="l-tain">
                    <img src="http://my-website.local/wp-content/uploads/2025/05/20250528-173403.jpg" alt="logo">
                </div>
                <div class="l-xian"></div>
                <div class="l-at">
                    <h2>
                        <!-- About Us -->
                        <?php echo t([
                            'en' => 'About Us',
                            'ru' => 'О нас',
                            'es' => 'Sobre nosotros'
                        ]); ?>
                    </h2>
                </div>
                
            </div>
            <!-- text -->
            <div class="a-t">
                <div class="a-n">
                    <div>
                        <h3>
                            <!-- Our values -->
                            <?php echo t([
                                'en' => 'Our values',
                                'ru' => 'Наши ценности',
                                'es' => 'Nuestros valores'
                            ]); ?>
                        </h3>
                        <p></p>
                    </div>
                    <div>
                        <h3>
                            <!-- Return policy -->
                            <?php echo t([
                                'en' => 'Return policy',
                                'ru' => 'Политика возврата',
                                'es' => 'Política de devoluciones'
                            ]); ?>
                        </h3>
                        <p></p>
                    </div>
                    <div>
                        <h3>
                            <!-- Transportation policy -->
                            <?php echo t([
                                'en' => 'Transportation policy',
                                'ru' => 'Транспортная политика',
                                'es' => 'Política de transporte'
                            ]); ?>
                        </h3>
                        <p></p>
                    </div>
                    <div>
                        <h3></h3>
                        <p></p>
                    </div>                    
                </div>                
            </div>
        </section>
    </div>
    
    

</main>

<?php get_footer(); ?>
