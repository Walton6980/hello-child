<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>



    <header class="main-header">
        <div class="container">
            <div class="mh-up">
                <!-- logo -->
                <div class="header-logo">
                    <a href="<?php echo esc_url( home_url() ); ?>">
                        <img src="http://my-website.local/wp-content/uploads/2025/05/cropped-cropped-Logo.png" alt="logo">
                    </a>
                    <span>Perhiasan Grosir ONE–STOP</span>
                </div>
                <!-- search -->
                <div class="custom-search-bar">
                    <form action="<?php echo esc_url( home_url('/') ); ?>" method="get" class="search-form">
                        <input type="text" name="s" class="search-input" 
                        placeholder="<?php echo t([
                            'en' => 'Search goods...',
                            'ru' => 'Поиск товаров...',
                            'es' => 'Buscar productos...'
                        ]); ?>">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <!-- list -->
                <div class="header-list">
                    <ul class="ewmzb">

                        <!-- 语言&货币切换 -->
                        <li class="midanw">
                            <a href="#">
                                <i class="fa-solid fa-earth-americas fa-l"></i>
                                <span>CUR&LAN</span>
                                
                            </a>
                            
                            <div class="curlan-dropdown">
                                <div class="mwinzdas">
                                    <!-- <span>Your Website Settings</span> -->
                                    <span>
                                        <?php echo t([
                                            'en' => 'Your Website Settings',
                                            'ru' => 'Настройки веб-сайта',
                                            'es' => 'Configuración del sitio web'
                                        ]); ?>
                                    </span>

                                </div>
                                <div class="chose-lan">
                                    <!-- <span>Language:</span> -->
                                    <span>
                                        <?php echo t([
                                            'en' => 'Language:',
                                            'ru' => 'Язык',
                                            'es' => 'Idioma'
                                        ]); ?>
                                    </span>
                                    <select class="iiiiii" id="lang-select" onchange="setLang(this.value)">
                                        <option value="en" <?= get_current_lang() === 'en' ? 'selected' : '' ?>>English</option>
                                        <option value="ru" <?= get_current_lang() === 'ru' ? 'selected' : '' ?>>Русский</option>
                                        <option value="es" <?= get_current_lang() === 'es' ? 'selected' : '' ?>>Español</option>
                                    </select>
                                </div>

                                
                                <div class="chose-lan">
                                    <span>
                                        <?php echo t([
                                            'en' => 'Currency:',
                                            'ru' => 'Валюта',
                                            'es' => 'Moneda'
                                        ]); ?>
                                    </span>
                                    <select class="iiiiii" id="currency-select" onchange="setCurrency(this.value)">
                                        <option value="USD" <?= get_current_currency_code() === 'USD' ? 'selected' : '' ?>>USD ($)</option>
                                        <option value="GBP" <?= get_current_currency_code() === 'GBP' ? 'selected' : '' ?>>GBP (£)</option>
                                        <option value="EUR" <?= get_current_currency_code() === 'EUR' ? 'selected' : '' ?>>EUR (€)</option>
                                        <option value="RUB" <?= get_current_currency_code() === 'RUB' ? 'selected' : '' ?>>RUB (₽)</option>
                                        <option value="CNY" <?= get_current_currency_code() === 'CNY' ? 'selected' : '' ?>>CNY (¥)</option>
                                    </select>
                                </div>

                                <script>
                                    

                                    
                                    function setLang(lang) {
                                        document.cookie = "site_lang=" + lang + "; path=/; max-age=31536000";
                                        location.reload();
                                    }
                                    function setCurrency(currency) {
                                        document.cookie = "site_currency=" + currency + "; path=/; max-age=31536000";
                                        location.reload();
                                    }
                                    
                                </script>
                            
                            </div>

                        </li>

                        <!-- 账户 -->
                        <li class="wirancxz">
                            <a href="http://my-website.local/my-account/">
                                <i class="fas fa-user"></i>
                                <!-- <span>Account</span> -->
                                <span>
                                    <?php echo t([
                                        'en' => 'Account',
                                        'ru' => 'Счет',
                                        'es' => 'Cuenta'
                                    ]); ?>
                                </span>

                            </a>
                            <!-- 下拉提示框 -->
                            <div class="account-dropdown">
                            <?php if ( is_user_logged_in() ): 
                                $current_user = wp_get_current_user(); 
                                $account_url = esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) );
                            ?>
                                <p class="acc-doen">
                                <!-- Hello， -->
                                <span>
                                    <?php echo t([
                                        'en' => 'Hello',
                                        'ru' => 'привет',
                                        'es' => 'Hola'
                                    ]); ?>
                                </span>,
                                
                                <a href="<?php echo $account_url; ?>" style="text-decoration: underline; color: red;">
                                    <?php echo esc_html( $current_user->display_name ); ?>
                                </a>
                                </p>
                                <!-- <a href="<?php echo $account_url; ?>">Account</a> -->
                                <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>">
                                    <!-- Log out -->
                                    <span>
                                        <?php echo t([
                                            'en' => 'Log out',
                                            'ru' => 'Выйти',
                                            'es' => 'Finalizar la sesión'
                                        ]); ?>
                                    </span>
                                </a>
                            <?php else: ?>
                                <p>
                                    <!-- You are not logged in -->
                                    <span>
                                        <?php echo t([
                                            'en' => 'You are not logged in',
                                            'ru' => 'Вы не вошли в систему',
                                            'es' => 'No has iniciado sesión'
                                        ]); ?>
                                    </span>
                                </p>
                                <a href="<?php echo esc_url( wc_get_page_permalink('myaccount') ); ?>">
                                    <!-- Log in -->
                                    <span>
                                        <?php echo t([
                                            'en' => 'Log in',
                                            'ru' => 'Авторизоваться',
                                            'es' => 'Acceso'
                                        ]); ?>
                                    </span>

                                </a>
                                <a href="<?php echo esc_url( wc_get_page_permalink('myaccount') ); ?>">
                                    <!-- Register -->
                                    <span>
                                        <?php echo t([
                                            'en' => 'Register',
                                            'ru' => 'Зарегистрироваться',
                                            'es' => 'Registro'
                                        ]); ?>
                                    </span>
                                </a>
                            <?php endif; ?>
                            </div>
                        </li>               
                        
                        <!-- 购物车 -->
                        <li class="yunbrs">
                            <a href="http://my-website.local/cart/">
                                <i class="fas fa-shopping-cart"></i>
                                <span>
                                    <?php echo t([
                                        'en' => 'Cart',
                                        'ru' => 'Корзина',
                                        'es' => 'Carro'
                                    ]); ?>
                                </span>
                            </a>
                            <!-- 下拉提示框 -->
                            <div class="mini-cart-dropdown">
                                <?php if ( WC()->cart->is_empty() ) : ?>
                                <p class="empty">
                                    <!-- Your cart is empty. -->
                                    <?php echo t([
                                        'en' => 'Your cart is empty.',
                                        'ru' => 'Ваша корзина пуста.',
                                        'es' => 'Su carrito está vacío.'
                                    ]); ?>
                                </p>
                                
                                <?php else : ?>
                                <ul class="mini-cart-items">
                                    <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                    if ( ! $_product || ! $_product->exists() || $cart_item['quantity'] <= 0 ) continue;

                                    $product_name = $_product->get_name();
                                    $product_link = $_product->is_visible() ? $_product->get_permalink() : '';
                                    $thumbnail    = $_product->get_image( 'woocommerce_thumbnail' );
                                    ?>
                                    <li class="mini-cart-item">
                                        <a href="<?php echo esc_url( $product_link ); ?>" class="mini-cart-thumb">
                                        <?php echo $thumbnail; ?>
                                        </a>
                                        <!-- <div class="mini-cart-details">
                                            <a href="<?php echo esc_url( $product_link ); ?>"><?php echo esc_html( $product_name ); ?></a>
                                            <div class="meucna">
                                                <span class="qty-price"><?php $final_price = get_discounted_price_for_cart_item( $cart_item );echo wc_price( $final_price );?></span>
                                                 
                                                <span class="qty-price"><?php echo $cart_item['quantity']; ?></span>
                                            </div>                       
                                        </div> -->

                                        

                                        <div class="mini-cart-details">
                                            <a href="<?php echo esc_url($product_link); ?>">
                                                <?php
                                                    $product_id = $cart_item['product_id'];
                                                    $product = wc_get_product($product_id);

                                                    // 使用多语言标题函数
                                                    echo esc_html(get_translated_product_title($product));
                                                ?>
                                            </a>
                                            <div class="meucna">
                                                <span class="qty-price">
                                                    <?php
                                                        // 获取阶梯折扣价格
                                                        $final_price = get_discounted_price_for_cart_item($cart_item);

                                                        // 显示转换后的价格（自动根据 Cookie 设置币种）
                                                        echo esc_html(convert_price($final_price));
                                                    ?>
                                                </span>
                                                <span class="qty-price"><?php echo $cart_item['quantity']; ?></span>
                                            </div>
                                        </div>




                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="mini-cart-footer">
                                    <div class="amciow">
                                        <p class="subtotal">
                                            <!-- Total: -->
                                            <?php echo t([
                                                'en' => 'Total:',
                                                'ru' => 'Общий:',
                                                'es' => 'Total:'
                                            ]); ?>
                                        </p>
                                        
                                        <p>
                                            <?php
                                                

                                                echo wc_price(WC()->cart->get_cart_contents_total());
                                            ?>
                                        </p>

                                    </div>
                                    <!-- <a href="<?php echo wc_get_cart_url(); ?>" class="button799">View Cart</a> -->
                                    <a href="<?php echo wc_get_checkout_url(); ?>" class="button799 checkout">
                                        <!-- Checkout -->
                                        <?php echo t([
                                            'en' => 'Checkout',
                                            'ru' => 'Проверить',
                                            'es' => 'Verificar'
                                        ]); ?>
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </li>

                        <!-- 收藏 -->
                        <li>
                            <a href="http://my-website.local/wishlist/">
                                <i class="fa-solid fa-heart"></i>
                                <span>
                                    <?php echo t([
                                            'en' => 'Wishlist',
                                            'ru' => 'Список пожеланий',
                                            'es' => 'Lista de deseos'
                                    ]); ?>
                                </span>
                            </a>
                        </li>

                    </ul>
                </div> 
            </div>

            <?php if ( is_front_page() ): ?>

                <!-- 手机端顶部标语 -->
                <div class="mobile-top-banner">
                    <span>
                        <!-- Sign up & Get up to US$40 off for first order -->
                        <?php echo esc_html(t([
                            'en' => 'Sign up & Get up to US$40 off for first order',
                            'es' => 'Regístrate y obtén hasta US$40 de descuento en tu primer pedido',
                            'ru' => 'Зарегистрируйтесь и получите скидку до 40 долларов США на первый заказ'
                        ])); ?>
                    </span>

                </div>
                <!-- 手机端导航栏 -->
                <nav class="mobile-mhup">
                    <!-- 汉堡菜单 -->
                    <!-- <a class="mo-e">
                        <i class="fa-solid fa-bars fa-xl"></i>
                    </a> -->
                    <a class="mo-e" href="/categories">
                        <i class="fa-solid fa-bars fa-xl"></i>
                    </a>

                    <!-- 搜索框 -->
                    <div class="mo-search">
                        <div class="mo-a">
                            <!-- ✅ 搜索表单开始 -->
                            <form action="/" method="get" class="mo-b" onsubmit="return submitSearch(event)">
                            <input
                                type="text"
                                name="s"
                                class="mo-input"
                                placeholder="Search..."
                                required
                            />
                            </form>
                            <!-- ✅ 搜索按钮 -->
                            <i class="fa-solid fa-magnifying-glass mo-c" onclick="document.querySelector('.mo-b').submit()"></i>
                        </div>
                    </div>

                    <script>
                        function submitSearch(event) {
                        // 可选逻辑：你可以拦截后自定义搜索逻辑
                        return true; // 返回 true 让表单正常提交
                        }
                    </script>


                    <!-- 查询物流 -->
                    <div class="mo-d">
                        <i class="fa-solid fa-earth-americas fa-xl"></i>
                        <i class="fa-solid fa-envelope fa-xl"></i>

                    </div>
                    <!-- 黑幕 -->
                    <div class="lapppp"></div>
                    <!-- 选项框 -->
                    <div class="lapp-front">
                        <!-- 语言选项可放这里 -->
                        <div class="curlan-dropdown">
                            <div class="mwinzdas">
                                <!-- <span>Your Website Settings</span> -->
                                <span>
                                    <?php echo t([
                                        'en' => 'Your Website Settings',
                                        'ru' => 'Настройки веб-сайта',
                                        'es' => 'Configuración del sitio web'
                                    ]); ?>
                                </span>

                            </div>

                            <div class="chose-lan">
                                <!-- <span>Language:</span> -->
                                <span>
                                    <?php echo t([
                                        'en' => 'Language:',
                                        'ru' => 'Язык',
                                        'es' => 'Idioma'
                                    ]); ?>
                                </span>
                                <select class="iiiiii" id="lang-select" onchange="setLang(this.value)">
                                    <option value="en" <?= get_current_lang() === 'en' ? 'selected' : '' ?>>English</option>
                                    <option value="ru" <?= get_current_lang() === 'ru' ? 'selected' : '' ?>>Русский</option>
                                    <option value="es" <?= get_current_lang() === 'es' ? 'selected' : '' ?>>Español</option>
                                </select>
                            </div>                         

                            <div class="chose-lan">
                                <span>
                                    <?php echo t([
                                        'en' => 'Currency:',
                                        'ru' => 'Валюта',
                                        'es' => 'Moneda'
                                    ]); ?>
                                </span>
                                <select class="iiiiii" id="currency-select" onchange="setCurrency(this.value)">
                                    <option value="USD" <?= get_current_currency_code() === 'USD' ? 'selected' : '' ?>>USD ($)</option>
                                    <option value="GBP" <?= get_current_currency_code() === 'GBP' ? 'selected' : '' ?>>GBP (£)</option>
                                    <option value="EUR" <?= get_current_currency_code() === 'EUR' ? 'selected' : '' ?>>EUR (€)</option>
                                    <option value="RUB" <?= get_current_currency_code() === 'RUB' ? 'selected' : '' ?>>RUB (₽)</option>
                                    <option value="CNY" <?= get_current_currency_code() === 'CNY' ? 'selected' : '' ?>>CNY (¥)</option>
                                </select>
                            </div>

                            <script>
                                // function setLang(lang) {
                                // document.cookie = "site_lang=" + lang + "; path=/; max-age=31536000"; 
                                // location.reload(); 
                                // }

                                
                                function setLang(lang) {
                                    document.cookie = "site_lang=" + lang + "; path=/; max-age=31536000";
                                    location.reload();
                                }
                                function setCurrency(currency) {
                                    document.cookie = "site_currency=" + currency + "; path=/; max-age=31536000";
                                    location.reload();
                                }
                                
                            </script>
                        
                        </div>
                    </div>

                    <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const popup666 = document.querySelector('.lapp-front');
                        const overlay666 = document.querySelector('.lapppp');
                        const openBtn666 = document.querySelector('.mo-d .fa-earth-americas');

                        // 打开弹窗
                        function openPopup666() {
                            popup666.style.display = 'block';
                            overlay666.style.display = 'block';
                            document.body.style.overflow = 'hidden';
                        }

                        // 关闭弹窗
                        function closePopup666() {
                            popup666.style.display = 'none';
                            overlay666.style.display = 'none';
                            document.body.style.overflow = '';
                        }

                        // ✅ 修正这里的变量名
                        if (openBtn666) openBtn666.addEventListener('click', openPopup666);
                        if (overlay666) overlay666.addEventListener('click', closePopup666);
                    });
                    </script>





                </nav>
                <!-- 手机端滚动banner -->
                <div class="mo-f">
                    <img src="http://my-website.local/wp-content/uploads/2025/06/trumpet.png" alt="trumpet">
                    <div class="mobile-gun-wrap">
                        <div class="slide-dom">
                            <div class="itemA">Sign up & Get up to US$40 off for first order</div>
                            <div class="itemB">Don't miss to register for coupon!</div>
                            <div class="itemA">Sign up & Get up to US$40 off for first order</div>
                            <div class="itemB">Don't miss to register for coupon!</div>
                        </div>
                    </div>

                </div>
                <!-- 手机端类目展示 -->               
                <div class="mo-g">
                    <div class="mo-h">
                        <div class="mo-i">
                            <?php
                            $terms = get_terms([
                                'taxonomy' => 'product_cat', // 商品分类
                                'hide_empty' => true,
                            ]);

                            if (!is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    $link = get_term_link($term);
                                    $name = get_translated_category_name($term); // ✅ 多语言分类名
                                    echo '<a href="' . esc_url($link) . '" class="mo-j">' . esc_html($name) . '</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>


            <?php endif; ?>

            <?php if ( !is_front_page() ): ?>

            <header class="main-header" style="display: none;">
                <div class="container">
                    <div class="mh-up">
                        <!-- logo -->
                        <div class="header-logo">
                            <a href="<?php echo esc_url( home_url() ); ?>">
                                <img src="http://my-website.local/wp-content/uploads/2025/05/cropped-cropped-Logo.png" alt="logo">
                            </a>
                            <span>Perhiasan Grosir ONE–STOP</span>
                        </div>
                        <!-- search -->
                        <div class="custom-search-bar">
                            <form action="<?php echo esc_url( home_url('/') ); ?>" method="get" class="search-form">
                                <input type="text" name="s" class="search-input" placeholder="Search goods...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <!-- list -->
                        <div class="header-list">
                            <ul>
                                <li>
                                    <a href="http://my-website.local/my-account/">
                                        <i class="fas fa-user"></i>
                                        <span>
                                            <!-- Account -->
                                            <?php echo esc_html(t([
                                                'en' => 'Account',
                                                'es' => 'Cuenta',
                                                'ru' => 'Счет'
                                            ])); ?>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://my-website.local/cart/">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>
                                            <!-- Cart -->
                                            <?php echo esc_html(t([
                                                'en' => 'Cart',
                                                'es' => 'Carro',
                                                'ru' => 'Корзина'
                                            ])); ?>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://my-website.local/wishlist/">
                                        <i class="fa-solid fa-heart"></i>
                                        <span>
                                            <!-- Wishlist -->
                                            <?php echo esc_html(t([
                                                'en' => 'Wishlist',
                                                'es' => 'Lista de deseos',
                                                'ru' => 'Список пожеланий'
                                            ])); ?>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div> 
                    </div>

                    <!-- 手机端顶部标语 -->
                    <div class="mobile-top-banner">
                        <span>
                            <!-- Sign up & Get up to US$40 off for first order -->
                            <?php echo esc_html(t([
                                'en' => 'Sign up & Get up to US$40 off for first order',
                                'es' => 'Regístrate y obtén hasta US$40 de descuento en tu primer pedido',
                                'ru' => 'Зарегистрируйтесь и получите скидку до 40 долларов США на первый заказ'
                            ])); ?>
                        </span>

                    </div>
                    <!-- 手机端导航栏 -->
                    <nav class="mobile-mhup">
                        <!-- 汉堡菜单 -->
                        
                        <a class="mo-e" href="/categories">
                            <i class="fa-solid fa-bars fa-xl"></i>
                        </a>

                        <!-- 搜索框 -->
                        <div class="mo-search">
                            <div class="mo-a">
                                <!-- 搜索表单开始 -->
                                <form action="/" method="get" class="mo-b" onsubmit="return submitSearch(event)">
                                <input
                                    type="text"
                                    name="s"
                                    class="mo-input"
                                    placeholder="Search..."
                                    required
                                />
                                </form>
                                <!-- 搜索按钮 -->
                                <i class="fa-solid fa-magnifying-glass mo-c" onclick="document.querySelector('.mo-b').submit()"></i>
                            </div>
                        </div>

                        <script>
                            function submitSearch(event) {
                            
                            return true; // 返回 true 让表单正常提交
                            }
                        </script>


                        <!-- 查询物流 -->
                        <div class="mo-d">
                            <i class="fa-solid fa-globe fa-xl"></i>
                            <i class="fa-solid fa-globe fa-xl"></i>
                        </div>

                        <div class="lapppp"></div>
                        <div class="lapp-front">

                        </div>

                    </nav>
                    <!-- 手机端滚动banner -->
                    <div class="mo-f">
                        <img src="http://my-website.local/wp-content/uploads/2025/06/trumpet.png" alt="trumpet">
                        <div class="mobile-gun-wrap">
                            <div class="slide-dom">
                                <div class="itemA">Sign up & Get up to US$40 off for first order</div>
                                <div class="itemB">Don't miss to register for coupon!</div>
                                <div class="itemA">Sign up & Get up to US$40 off for first order</div>
                                <div class="itemB">Don't miss to register for coupon!</div>
                            </div>
                        </div>

                    </div>
                    <!-- 手机端类目展示 -->
                    

                    <div class="mo-g">
                        <div class="mo-h">
                            <div class="mo-i">
                                <?php
                                $terms = get_terms([
                                    'taxonomy' => 'product_cat', // 商品分类
                                    'hide_empty' => true,
                                ]);

                                if (!is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        $link = get_term_link($term);
                                        $name = get_translated_category_name($term); // 多语言分类名
                                        echo '<a href="' . esc_url($link) . '" class="mo-j">' . esc_html($name) . '</a>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="mh-down">
                        <div class="mh-float-button">
                            <a href="#">
                                <?php echo t([
                                    'en' => 'All Categories',
                                    'ru' => 'Все категории',
                                    'es' => 'Todas las categorías'
                                ]); ?>
                            </a>
                        </div>
                        <ul>
                            <?php
                            // 指定分类 slug
                            $menu_slugs = ['ring', 'bracelet', 'necklace', 'earrings'];
                            $categories = get_terms([
                                'taxonomy' => 'product_cat',
                                'slug'     => $menu_slugs,
                                'hide_empty' => false,
                            ]);

                            foreach ($categories as $category):
                                $translated_name = get_translated_category_name($category);
                                $link = get_term_link($category);
                            ?>
                                <li>
                                    <a href="<?php echo esc_url($link); ?>">
                                        <?php echo esc_html($translated_name); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
                <script>
                    function toggleMenu() {
                    const menu = document.querySelector('.mh-down');
                    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
                }
                </script>
                
                <!-- 轮动标语 -->
                <div class="scroll-container">
                    <div class="scroll-box">
                        <div class="highlight-bar"></div>
                        <div class="scroll-content-wrapper">
                            <i class="fa-solid fa-volume-high fa-md"></i>
                            <div class="scroll-content" id="scrollContent">
                                <div class="scroll-item active">Lorem ipsum 1111111</div>
                                <div class="scroll-item">Lorem ipsum 2222222</div>
                                <div class="scroll-item">Lorem ipsum 3333333</div>
                                <div class="scroll-item">Lorem ipsum 4444444</div>
                                <div class="scroll-item">Lorem ipsum 5555555</div>
                                <div class="scroll-item">Lorem ipsum 6666666</div>
                                <div class="scroll-item">Lorem ipsum 1111111</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 加入购物车成功提示toast -->
                <div id="cart-toast" style="
                    display: none;
                    position: fixed;
                    bottom: 80px;
                    left: 50%;
                    transform: translateX(-50%);
                    background: #222;
                    color: #fff;
                    padding: 10px 18px;
                    border-radius: 4px;
                    font-size: 14px;
                    z-index: 9999;
                    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
                ">
                    <!-- 已加入购物车 -->
                    <?php echo esc_html(t([
                        'en' => ' Already added to cart',
                        'es' => ' Ya agregado al carrito',
                        'ru' => ' Уже добавлено в корзину'
                    ])); ?>

                </div>

                <div id="wishlist-toast" class="wishlist-toast">
                <!--  已加入愿望清单 -->
                    <?php echo esc_html(t([
                        'en' => '❤️ Added to wishlist',
                        'es' => '❤️ Añadido a la lista de deseos',
                        'ru' => '❤️ Добавлено в список желаний'
                    ])); ?>
                </div>

                <style>
                .wishlist-toast {
                position: fixed;
                bottom: 70px;
                left: 50%;
                transform: translateX(-50%);
                background: #333;
                color: #fff;
                padding: 12px 20px;
                border-radius: 4px;
                opacity: 0;
                visibility: hidden;
                z-index: 9999;
                transition: all 0.4s ease;
                }
                .wishlist-toast.show {
                opacity: 1;
                visibility: visible;
                }
                </style>


            </header>

            <header class="custom-header">
                
                <div class="container">
                    <!-- 手机端顶部标语 -->
                    <div class="mobile-top-banner">
                        <span>
                            <!-- Sign up & Get up to US$40 off for first order -->
                            <?php echo esc_html(t([
                                'en' => 'Sign up & Get up to US$40 off for first order',
                                'es' => 'Regístrate y obtén hasta US$40 de descuento en tu primer pedido',
                                'ru' => 'Зарегистрируйтесь и получите скидку до 40 долларов США на первый заказ'
                            ])); ?>
                        </span>
                    </div>
                    <!-- 手机端导航栏 -->
                    <nav class="mobile-mhup">

                        <!-- back -->
                        <a href="javascript:history.back()" class="back-button">
                            <i class="fa-solid fa-chevron-left fa-xl"></i>
                        </a>

                        <!-- 汉堡菜单 -->
                        <a class="mo-e" href="/categories">
                            <i class="fa-solid fa-bars fa-xl"></i>
                        </a>

                        <!-- logo -->
                        <a class="aaaa" href="/">
                            <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/img_v3_02lf_a440cb43-b083-46ff-8089-9c17ea754d8g.png" alt="">
                        </a>

                        <!-- 搜索框 -->
                        <div class="mo-search taylor">
                            <div class="mo-a">
                                <!-- 搜索表单开始 -->
                                <form action="/" method="get" class="mo-b billie" onsubmit="return submitSearch(event)">
                                <input
                                    type="text"
                                    name="s"
                                    class="mo-input"
                                    placeholder="Search..."
                                    required
                                />
                                </form>
                                <!-- 搜索按钮 -->
                                <i class="fa-solid fa-magnifying-glass mo-c" onclick="document.querySelector('.mo-b').submit()"></i>
                            </div>
                        </div>

                        <script>
                            function submitSearch(event) {
                            
                            return true; // 返回 true 让表单正常提交
                            }
                        </script>

                        <!-- 账号和购物车 -->
                        <div class="mo-d">
                            <a class="aaaa" href="/my-account">
                                <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/user-1.png" alt="">
                            </a>
                            <a class="aaaa" href="/cart">
                                <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/cart.png" alt="">
                                <div class="kkkk">
                                    <?php echo WC()->cart->get_cart_contents_count(); ?>
                                </div>
                            </a>
                        </div>
                    </nav>
                    <!-- 手机端滚动banner -->
                    <div class="mo-f">
                        <img src="http://my-website.local/wp-content/uploads/2025/06/trumpet.png" alt="trumpet">
                        <div class="mobile-gun-wrap">
                            <div class="slide-dom">
                                <div class="itemA">Sign up & Get up to US$40 off for first order</div>
                                <div class="itemB">Don't miss to register for coupon!</div>
                                <div class="itemA">Sign up & Get up to US$40 off for first order</div>
                                <div class="itemB">Don't miss to register for coupon!</div>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </header>

            <?php endif; ?>

         
            <div class="mh-down">
                <div class="mh-float-button">
                    <a href="#">
                        
                        <?php echo t([
                            'en' => 'All Categories',
                            'ru' => 'Все категории',
                            'es' => 'Todas las categorías'
                        ]); ?>
                    </a>
                </div>
                <ul>
                    <?php
                    // 指定分类 slug
                    $menu_slugs = ['new-arrival', 'ring', 'bracelet', 'necklace', 'earrings'];
                    $categories = get_terms([
                        'taxonomy' => 'product_cat',
                        'slug'     => $menu_slugs,
                        'hide_empty' => false,
                    ]);

                    foreach ($categories as $category):
                        $translated_name = get_translated_category_name($category);
                        $link = get_term_link($category);
                    ?>
                        <li>
                            <a href="<?php echo esc_url($link); ?>">
                                <?php echo esc_html($translated_name); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            
        </div>
        <script>
            function toggleMenu() {
            const menu = document.querySelector('.mh-down');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }
        </script>
        
        <!-- 轮动标语 -->
        <div class="scroll-container">
            <div class="scroll-box">
                <div class="highlight-bar"></div>
                <div class="scroll-content-wrapper">
                    <i class="fa-solid fa-volume-high fa-md"></i>
                    <div class="scroll-content" id="scrollContent">
                        <div class="scroll-item active">Lorem ipsum 1111111</div>
                        <div class="scroll-item">Lorem ipsum 2222222</div>
                        <div class="scroll-item">Lorem ipsum 3333333</div>
                        <div class="scroll-item">Lorem ipsum 4444444</div>
                        <div class="scroll-item">Lorem ipsum 5555555</div>
                        <div class="scroll-item">Lorem ipsum 6666666</div>
                        <div class="scroll-item">Lorem ipsum 1111111</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 加入购物车成功提示toast -->
        <div id="cart-toast" style="
            display: none;
            position: fixed;
            bottom: 80px;
            left: 50%;
            transform: translateX(-50%);
            background: #222;
            color: #fff;
            padding: 10px 18px;
            border-radius: 4px;
            font-size: 14px;
            z-index: 9999;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        ">
            ✅ 已加入购物车
        </div>

        <div id="wishlist-toast" class="wishlist-toast">
        ❤️ 已加入愿望清单
        </div>

        <style>
        .wishlist-toast {
        position: fixed;
        bottom: 70px;
        left: 50%;
        transform: translateX(-50%);
        background: #333;
        color: #fff;
        padding: 12px 20px;
        border-radius: 4px;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
        transition: all 0.4s ease;
        }
        .wishlist-toast.show {
        opacity: 1;
        visibility: visible;
        }
        </style>

    </header>



