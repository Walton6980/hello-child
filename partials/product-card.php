<?php
// 保证传入 $product 是有效的
if (!isset($product) || !is_a($product, 'WC_Product')) return;

$product_id = $product->get_id();
$image = wp_get_attachment_image_url($product->get_image_id(), 'medium');
$min_order = get_field('min_order_quantity', $product_id);
$wholesale_price = get_field('wholesale_price', $product_id);
$gallery_ids = $product->get_gallery_image_ids();
?>

<div class="fg-g-i">
    <a href="<?php echo get_permalink($product_id); ?>">
        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($product->get_name()); ?>">
    </a>
    

    <!-- 展示不同语言title -->
    <a href="<?php echo get_permalink($product->get_id()); ?>">
        <span class="fg-title"><?php echo esc_html(get_translated_product_title($product)); ?></span>
    </a>


    <span class="fg-price"><?php echo convert_price($product->get_price()); ?></span>

    <div class="shierpx">
        <!-- Min. order:  -->
        <?php echo esc_html(t([
            'en' => 'Min. order: ',
            'es' => 'Pedido mínimo:',
            'ru' => 'Минимальный заказ:',
            'pt' => 'Pedido mínimo:',
            'ar' => 'الحد الأدنى للطلب:',
        ])); ?>
        <?php echo $min_order ?: '1'; ?> piece</div>
    <div class="shierpx">
        <div>
            <!-- Sold:  -->
            <?php echo esc_html(t([
                'en' => 'Sold: ',
                'es' => 'Vendido: ',
                'ru' => 'Продал: ',
                'pt' => 'Vendido:',
                'ar' => 'مُباع:',
                
            ])); ?>
            <?php echo $product->get_total_sales(); ?></div>
        <div>
            <?php if (is_user_logged_in() && $wholesale_price): ?>
                <span>
                    <!-- Wholesale:  -->
                    <?php echo esc_html(t([
                        'en' => 'Wholesale: ',
                        'es' => 'Al por mayor: ',
                        'ru' => 'Оптовая продажа: ',
                        'pt' => 'Atacado:',
                        'ar' => 'بالجملة:'
                    ])); ?>
                    <?php echo wc_price($wholesale_price); ?></span>
            <?php else: ?>
                <a href="/my-account">
                    <!-- Login &gt;&gt; -->
                    <?php echo esc_html(t([
                        'en' => 'Login &gt;&gt;',
                        'es' => 'Iniciar sesión &gt;&gt;',
                        'ru' => 'Войти &gt;&gt;',
                        'pt' => 'Entrar &gt;&gt;',
                        'ar' => 'تسجيل الدخول &gt;&gt;'
                    ])); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="yu">
        <a href="<?php echo get_permalink($product_id); ?>">
            <?php
            if ($gallery_ids) {
                foreach ($gallery_ids as $img_id) {
                    $thumb = wp_get_attachment_image_url($img_id, 'thumbnail');
                    echo '<div class="selena"><img src="' . esc_url($thumb) . '" alt=""></div>';
                }
            }
            ?>
        </a>       
            
        <div class="product-card bingo">
            <a href="#" 
                class="add_to_wishlist single_add_to_wishlist" 
                data-product-id="<?php echo esc_attr($product_id); ?>" 
                data-product-type="simple" 
                data-title="Add to wishlist">
                <i class="fa-solid fa-heart-circle-plus"></i>
            </a>
            <a href="?add-to-cart=<?php echo esc_attr($product_id); ?>"
            data-product_id="<?php echo esc_attr($product_id); ?>"
            data-quantity="1"
            class="ajax_add_to_cart add_to_cart_button single_add_to_cart_button">
                <i class="fa-solid fa-cart-plus"></i>
            </a>
        </div>
    </div>
</div>
