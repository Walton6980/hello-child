</main> <!-- 可选，关闭主内容区域 -->

<footer id="colophon" >
  <div class="footer-inner">
    <!-- 底部上 -->
    <div class="footer-up">
        <div class="up-container">
            <div class="u1 grid">
                <!-- u1-left -->
                <div class="u1-left grid">
                    <div class="u1-left-col">
                        <div class="u1-tit">
                            Guide
                        </div>
                        <div class="u1-list">
                            <a href="#">
                                How to Register
                            </a>
                            <a href="#">
                                How to Order
                            </a>
                            <a href="#">
                                Price
                            </a>
                            <a href="#">
                                Discount and Coupons
                            </a>
                            <a href="#">
                                Credit
                            </a>
                            <a href="#">
                                Payment
                            </a>
                            <a href="#">
                                Shipping
                            </a>
                            <a href="#">
                                Customs
                            </a>
                            <a href="#">
                                Order Tracking
                            </a>
                            <a href="#">
                                Return and refund
                            </a>
                            <a href="#">
                                Intellectual Property Rights
                            </a>                           
                        </div>
                    </div>
                    <div class="u1-left-col">
                        <div class="u1-tit">
                            PerhiasanDirect
                        </div>
                        <div class="u1-list">
                            <a href="#">
                                About US
                            </a>
                            <a href="#">
                                Blog
                            </a>
                            <a href="#">
                                Buyer's Show
                            </a>
                            <a href="#">
                                Beginners Guide
                            </a>
                            <a href="#">
                                Privacy Policy
                            </a>
                            <a href="#">
                                Terms and Conditions
                            </a>
                            <a href="#">
                                Cookie Policy
                            </a>
                            <a href="#">
                                VIP Discount
                            </a>
                            <a href="#">
                                All Categories
                            </a>
                        </div>
                    </div>
                    <div class="u1-left-col">
                        <div class="u1-tit">
                            Support (Customer Care)
                        </div>
                        <div class="u1-list">
                            <a href="#">
                                Contact US
                            </a>
                            <a href="#">
                                FAQ
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-comment-dots"></i>  Whatsapp
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-phone"></i>  your phone number
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-envelope"></i>  your email
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-headset"></i>  Live Chat
                            </a>
                            
                        </div>
                    </div>
                </div>

                <!-- u1-right -->
                <div class="u1-right grid">
                    <div>
                        <div class="u1-tit">
                            Join Our Community
                        </div>
                        <div class="our-app">
                            <a href="https://www.facebook.com/people/Perhiasandirect/61574061251340/" rel="nofollow">
                                <div class="basic_image me-5 w-7.5">
                                    <img src="https://image3.nihaojewelry.com/filters:format(webp)/eh/2022-09-01/1662023343198214761/community-icon.png" alt="community icon" style="" class="h-full object-cover w-full">
                                </div>
                            </a>
                            <a href="#" rel="nofollow">
                                <div class="basic_image me-5 w-7.5">
                                    <img src="https://image3.nihaojewelry.com/filters:format(webp)/eh/2022-09-01/1662023352969502566/community-icon.png" alt="community icon" style="" class="h-full object-cover w-full">
                                </div>
                            </a>
                            <a href="https://www.tiktok.com/@nihaojewelry" rel="nofollow">
                                <div class="basic_image me-5 w-7.5">
                                    <img src="https://image3.nihaojewelry.com/filters:format(webp)/eh/2022-09-01/1662023362988938040/community-icon.png" alt="community icon" style="" class="h-full object-cover w-full">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div>
                        <div class="u1-tit">
                            Our Mobile Apps
                        </div>

                    </div>
                    <div class="u1-right-bottom">
                        <div style="font-size: 20px;">Sign up for Our news</div>
                        <form method="POST" action="" style="display: flex; margin-top: 1rem;">
                            <input type="email" name="email_subscribe" placeholder="Your Email Address" required>
                            <button type="submit" name="submit_email">Subscribe</button>
                        </form>
                        
                        <div style="font-size: 20px; margin-top: 20px;">Subscribe to Our Newsletter & Get Exclusive Offers</div>

                        <!-- 引入样式 -->
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet" />

                        <div class="form-inline-group">
                            <!-- 下拉菜单 -->
                            <select id="country" class="country-select" name="country_code">
                            <?php
                                $countries = [
                                    ['code' => 'ES', 'flag' => 'es', 'name' => 'Spain', 'dial_code' => '+34'],
                                    ['code' => 'PT', 'flag' => 'pt', 'name' => 'Portugal', 'dial_code' => '+351'],
                                    ['code' => 'BR', 'flag' => 'br', 'name' => 'Brazil', 'dial_code' => '+55'],
                                    ['code' => 'RU', 'flag' => 'ru', 'name' => 'Russia', 'dial_code' => '+7'],
                                    ['code' => 'PK', 'flag' => 'pk', 'name' => 'Pakistan', 'dial_code' => '+92'],
                                    ['code' => 'US', 'flag' => 'us', 'name' => 'United States', 'dial_code' => '+1']
                                ];

                                foreach ($countries as $country) {
                                    echo '<option value="' . $country['dial_code'] . '" data-flag="' . $country['flag'] . '">'
                                    . '[' . $country['name'] . '] ' . $country['dial_code'] . '</option>';
                                }
                            ?>
                            </select>
                            <input class='fo-in' type="text" name="whatsapp_number" placeholder="WhatsApp Number" required>
                            <button class='fo-bu' type="submit" name="submit_whatsapp">Subscribe</button>
                        </div>

                        <!-- 脚本 -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
                        <script>
                        $(document).ready(function () {
                            $('#country').select2({
                            templateResult: formatState,
                            templateSelection: formatState
                            });

                            function formatState(state) {
                            if (!state.id) return state.text;
                            const flag = $(state.element).data('flag');
                            return $(
                                `<span><span class="flag-icon flag-icon-${flag}"></span> ${state.text}</span>`
                            );
                            }
                        });
                        </script>
                        
                        <div style="margin-top: 0.25rem; color: #A4A4A4;">By clicking the SUBSCRIBE button, you are agreeing to our 
                            <a href="#" style="text-decoration: underline;">Privacy & Cookie Policy. </a>
                            If you want to unsubsribe the marketing email, please proceed to our 
                            <a href="#" style="text-decoration: underline;">privacy center.</a>
                        </div>
                    </div>
                </div>

                <!-- 折叠footer -->
                <div class="footer-accordion mobile-only">
                    <div class="accordion-item">
                        <div class="accordion-header">
                            Guide
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="accordion-content">
                        <a href="#">How to Register</a>
                        <a href="#">How to Order</a>
                        <a href="#">Price</a>
                        <a href="#">Discount and Coupons</a>
                        <a href="#">Credit</a>
                        <a href="#">Payment</a>
                        <a href="#">Shipping</a>
                        <a href="#">Customs</a>
                        <a href="#">Order Tracking</a>
                        <a href="#">Return and refund</a>
                        <a href="#">Intellectual Property Rights</a>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header">
                            PerhiasanDirect
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="accordion-content">
                        <a href="#">About US</a>
                        <a href="#">Blog</a>
                        <a href="#">Buyer's Show</a>
                        <a href="#">Beginners Guide</a>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms and Conditions</a>
                        <a href="#">Cookie Policy</a>
                        <a href="#">VIP Discount</a>
                        <a href="#">All Categories</a>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header">
                            Support (Customer Care)
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                        <div class="accordion-content">
                        <a href="#">Contact US</a>
                        <a href="#">FAQ</a>
                        <a href="#"><i class="fa-solid fa-comment-dots"></i> Whatsapp</a>
                        <a href="#"><i class="fa-solid fa-phone"></i> your phone number</a>
                        <a href="#"><i class="fa-solid fa-envelope"></i> your email</a>
                        <a href="#"><i class="fa-solid fa-headset"></i> Live Chat</a>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                    const headers = document.querySelectorAll(".accordion-header");

                    headers.forEach(header => {
                        header.addEventListener("click", () => {
                        header.classList.toggle("active");
                        const content = header.nextElementSibling;
                        content.style.display = content.style.display === "flex" ? "none" : "flex";
                        });
                    });
                    });
                </script>
            </div>
              
            <div class="u4">
                <div>
                    <img src="http://my-website.local/wp-content/uploads/2025/05/Paypal.png" alt="payment-logo">
                </div>
            </div>
        </div>
    </div>
    <!-- 最底部 -->
    <div class="footer-down">
        <div class="down-up">
        © 2014-2025 ### Wholesale Store. All Rights Reserved.
        <a href='#'>INTELLECTUAL PROPERTY RIGHTS</a>
        </div>
        <div class="down-down">
        </div>

    </div>

    <!-- 底部留白 -->
    <?php if ( !is_product() ) : ?>
        <div class="dibuliubai">
        </div>
    <?php endif; ?>

    <?php if ( is_product() ): ?>
        <div class="dibuliubai" style="height: 104px;"></div>
    <?php endif; ?>


    <?php if ( !is_product() ) : ?>
        <!-- 手机端固定底部栏 -->
        <div class="charli" role="tablist">
            <a class='xcxx' role="tab" href="/" data-path="/">
                <div class="aaaa">
                    <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/img_v3_02lf_a440cb43-b083-46ff-8089-9c17ea754d8g.png" alt="">
                </div>
                <div class="bbbb">
                    <span>
                        <!-- Home -->
                        <?php echo esc_html(t([
                            'en' => 'Home',
                            'es' => 'Hogar',
                            'ru' => 'Дом'
                        ])); ?>
                    </span>
                </div>
            </a>
            <a class='xcxx' role="tab" href="/categories" data-path="/categories">
                <div class="aaaa">
                    <!-- <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/gdscategory-2.png" alt=""> -->
                    <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/ico-category.png" alt="">
                </div>
                <div class="bbbb">
                    <span>
                        <!-- Categories -->
                        <?php echo esc_html(t([
                            'en' => 'Categories',
                            'es' => 'Categorías',
                            'ru' => 'Категории'
                        ])); ?>
                    </span>
                </div>
            </a>
            <a class='xcxx' role="tab" href="#" data-path="#">
                <div class="aaaa">
                    <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/new-1.png" alt="">
                </div>
                <div class="bbbb">
                    <span>
                        <!-- New -->
                        <?php echo esc_html(t([
                            'en' => 'New',
                            'es' => 'Nuevo',
                            'ru' => 'Новый'
                        ])); ?>
                    </span>
                </div>
            </a>
            <a class='xcxx' role="tab" href="/cart" data-path="/cart">
                <div class="aaaa">
                    <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/cart.png" alt="">
                    <div class="kkkk">
                        <?php echo WC()->cart->get_cart_contents_count(); ?>
                    </div>
                </div>
                <div class="bbbb">
                    <span>
                        <!-- Cart -->
                        <?php echo esc_html(t([
                            'en' => 'Cart',
                            'es' => 'Carro',
                            'ru' => 'Корзина'
                        ])); ?>
                    </span>
                </div>
            </a>
            <a class='xcxx' role="tab" href="/my-account" data-path="/my-account">
                <div class="aaaa">
                    <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/user-1.png" alt="">
                </div>
                <div class="bbbb">
                    <span>
                        <!-- Account -->
                        <?php echo esc_html(t([
                            'en' => 'Account',
                            'es' => 'Cuenta',
                            'ru' => 'Счет'
                        ])); ?>
                    </span>
                </div>
            </a>
        </div>
    <?php endif; ?>

    <?php if ( is_product() ) : ?>
        <div class="bigb">
            <div class="biga">
                <div class="tu-1">
                    <!-- <img src="" alt="" class="tu-4"> -->
                    <!-- <i class="fa-solid fa-heart-circle-plus tu-4"></i> -->
                    <a href="#"
                        class="add_to_wishlist single_add_to_wishlist"
                        data-product-id="<?php echo esc_attr( $product_id ); ?>"
                        data-product-type="simple"
                        data-title="Add to wishlist"
                        style="margin-left: 10px; font-size: 18px; color: #d60000;">
                        <!-- <div>
                            Add to wishlist
                        </div> -->
                        
                        <i class="fa-solid fa-heart-circle-plus"></i>
                    </a>
                </div>
                <div class="tu-2">
                    <span class="tu-5">
                        <!-- Add To Cart -->
                        <?php echo esc_html(t([
                            'en' => 'Add To Cart',
                            'es' => 'Añadir a la cesta',
                            'ru' => 'Добавить в корзину'
                        ])); ?>
                    </span>
                </div>
            </div>
            <div class="bign">
                <img src="http://my-website.local/wp-content/uploads/2025/05/Paypal.png" alt="paypal">
                <span>
                    <!-- Paypal safeguard your property. -->
                    <?php echo esc_html(t([
                            'en' => 'Paypal safeguard your property.',
                            'es' => 'Paypal protege tu propiedad.',
                            'ru' => 'PayPal защитит вашу собственность.'
                        ])); ?>
                </span>
            </div>
            <div class="bigg">
            </div>

            <!-- 黑幕 -->
            <div class="black-back">

            </div>
            <!-- popup -->
            <div class="PopUp">
                <div class="jk-1">

                </div>
                <?php
                global $product;
                $product_id = $product->get_id();
                $product_image = $product->get_image_id()
                    ? wp_get_attachment_image_url($product->get_image_id(), 'full')
                    : wc_placeholder_img_src();
                ?>

                <div class="jk-2">
                    <!-- 主图区域 -->
                    <div class="jk-3">
                        <img src="<?php echo esc_url($product_image); ?>" alt="Main Product Image" class="jk-6">
                        <div class="jk-7"></div>
                        <div class="jk-8">
                            <i class="fa-solid fa-xmark jk-9"></i>
                        </div>
                    </div>

                    <!-- 表头 -->
                    <div class="jk-4">
                        <div class="jj-3">
                            <!-- Color -->
                            <?php echo esc_html(t([
                                'en' => 'Color',
                                'es' => 'Color',
                                'ru' => 'Цвет'
                            ])); ?>
                        </div>
                        <div class="jj-1">
                            <!-- Sku -->
                            <?php echo esc_html(t([
                                'en' => 'Sku',
                                'es' => 'SKU',
                                'ru' => 'Артикул'
                            ])); ?>
                        </div>
                        <div class="jj-1">
                            <!-- Price -->
                            <?php echo esc_html(t([
                                'en' => 'Price',
                                'es' => 'Precio',
                                'ru' => 'Цена'
                            ])); ?>
                        </div>
                        <div class="jj-4">
                            <!-- Quantity -->
                            <?php echo esc_html(t([
                                'en' => 'Quantity',
                                'es' => 'Cantidad',
                                'ru' => 'Количество'
                            ])); ?>
                        </div>
                    </div>

                    <!-- 商品项列表 -->
                    <div class="qq-1">
                        <?php if ( $product->is_type('variable') ):
                            $variations = $product->get_available_variations();
                            foreach ( $variations as $variation ):
                                $var_id = $variation['variation_id'];
                                $sku = $variation['sku'];
                                $price_html = $variation['price_html'];
                                $image_url = $variation['image']['url'] ?: wc_placeholder_img_src();
                        ?>
                            <div class="oo-1">
                                <div class="oo-2">
                                    <div class="oo-3">
                                        <img src="<?php echo esc_url($image_url); ?>" alt="Variation Image" class="pp-1">
                                    </div>
                                    <div class="oo-4">
                                        <p class="pp-2"><?php echo esc_html($sku); ?></p>
                                    </div>
                                    <div class="oo-5">
                                        <span><?php echo $price_html; ?></span>
                                    </div>
                                    <span class="oo-6">
                                        <div class="vv-1">
                                            <button class="gggg">-</button>
                                            <input class="aerxz" data-var-id="<?php echo esc_attr($var_id); ?>" value="0" min="0">
                                            <button class="gggg">+</button>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; else:
                            // Simple 商品处理
                            $sku = $product->get_sku();
                            $price_html = $product->get_price_html();
                        ?>
                            <div class="oo-1">
                                <div class="oo-2">
                                    <div class="oo-3">
                                        <img src="<?php echo esc_url($product_image); ?>" alt="Product Image" class="pp-1">
                                    </div>
                                    <div class="oo-4">
                                        <p class="pp-2"><?php echo esc_html($sku); ?></p>
                                    </div>
                                    <div class="oo-5">
                                        <span><?php echo $price_html; ?></span>
                                    </div>

                                    <span class="oo-6">
                                        <div class="vv-1">
                                            <button class="gggg">-</button>
                                            <input class="aerxz" data-var-id="<?php echo esc_attr($product_id); ?>" value="0" min="0">
                                            <button class="gggg">+</button>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- 操作区 -->
                    <div class="qq-2">
                        <div class="tu-1">
                            <a href="#"
                                class="add_to_wishlist single_add_to_wishlist"
                                data-product-id="<?php echo esc_attr($product_id); ?>"
                                data-product-type="simple"
                                data-title="Add to wishlist"
                                style="margin-left: 10px; font-size: 18px; color: #d60000;">     
                                <i class="fa-solid fa-heart-circle-plus"></i>
                            </a>
                        </div>
                        <div class="tu-2">
                            <span class="tu-5">
                                <!-- Add To Cart -->
                                <?php echo esc_html(t([
                                    'en' => 'Add To Cart',
                                    'es' => 'Añadir a la cesta',
                                    'ru' => 'Добавить в корзину'
                                ])); ?>
                            </span>
                        </div>                   
                    </div>
                </div>


            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
            const popup = document.querySelector('.PopUp');
            const overlay = document.querySelector('.black-back');
            const openBtn = document.querySelector('.tu-2 .tu-5'); // 主页面按钮
            const openBtn2 = document.querySelector('.labubu');
            const closeBtn = document.querySelector('.jk-9');       // 弹窗内关闭按钮
            const addToCartBtn = document.querySelector('.qq-2 .tu-5'); // 弹窗内加购按钮

            // 打开弹窗
            function openPopup() {
                popup.style.display = 'block';
                overlay.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }

            // 关闭弹窗
            function closePopup() {
                popup.style.display = 'none';
                overlay.style.display = 'none';
                document.body.style.overflow = '';
            }

            // 绑定弹窗显示/隐藏
            if (openBtn) openBtn.addEventListener('click', openPopup);

            if (openBtn2) openBtn2.addEventListener('click', openPopup);

            if (closeBtn) closeBtn.addEventListener('click', closePopup);
            if (overlay) overlay.addEventListener('click', closePopup);

            // 加减按钮逻辑
            document.querySelectorAll('.oo-1').forEach(item => {
                const minus = item.querySelector('.gggg:first-child');
                const plus = item.querySelector('.gggg:last-child');
                const input = item.querySelector('.aerxz');

                minus.addEventListener('click', () => {
                let val = parseInt(input.value) || 0;
                input.value = Math.max(0, val - 1);
                });

                plus.addEventListener('click', () => {
                let val = parseInt(input.value) || 0;
                input.value = val + 1;
                });
            });

            // ✅ 表单式批量 Ajax 加购（统一提交）
            if (addToCartBtn) {
                addToCartBtn.addEventListener('click', function (e) {
                e.preventDefault();

                const formData = new FormData();
                let hasValid = false;

                document.querySelectorAll('.aerxz').forEach(input => {
                    const qty = parseInt(input.value) || 0;
                    const vid = input.dataset.varId;
                    if (qty > 0 && vid) {
                    formData.append(`custom_bulk_variations[${vid}]`, qty);
                    hasValid = true;
                    }
                });

                if (!hasValid) {
                    alert('Please select quantity first.');
                    return;
                }

                fetch('<?php echo admin_url("admin-ajax.php"); ?>?action=ajax_add_bulk_variations', {
                    method: 'POST',
                    body: formData,
                    credentials: 'same-origin'
                })
                .then(res => res.json())
                .then(response => {
                    if (response.success) {
                    alert('Products added successfully!');
                    // WooCommerce 自动刷新 mini cart
                    if (typeof jQuery !== 'undefined') {
                        jQuery(document.body).trigger("added_to_cart");
                        jQuery(document.body).trigger("wc_fragment_refresh");
                    }
                    closePopup();
                    } else {
                    alert(response.data?.message || 'Add to cart failed.');
                    }
                });
                });
            }
            });
        </script>

    <?php endif; ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const tabs = document.querySelectorAll(".charli .xcxx");
        const currentPath = window.location.pathname.replace(/\/$/, ''); // 去除末尾斜杠

        tabs.forEach(tab => {
            const tabPath = tab.dataset.path.replace(/\/$/, ''); // data-path 也去除末尾斜杠

            if (tabPath === currentPath || (tabPath === '' && currentPath === '')) {
            tab.classList.add("active");
            } else {
            tab.classList.remove("active");
            }
        });
        });
    </script>

  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
