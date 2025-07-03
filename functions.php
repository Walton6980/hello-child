<?php
// 加载子主题样式，并确保继承父主题样式
add_action( 'wp_enqueue_scripts', function() {
    // 加载父主题 CSS
    wp_enqueue_style( 'hello-parent-style', get_template_directory_uri() . '/style.css' );

    // 加载子主题 CSS
    wp_enqueue_style( 'hello-child-style', get_stylesheet_directory_uri() . '/style.css', [], wp_get_theme()->get('Version') );
});

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
  });
  
// 加载自定义 JS（轮播图）
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script(
        'my-custom-js',
        get_stylesheet_directory_uri() . '/custom.js', 
        array(),
        null,
        true
    );
});

// foryouJS
function enqueue_foryou_ajax_script() {
    // 注册并加载自定义 JS（foryouJS）
    wp_enqueue_script(
        'foryou-ajax',
        get_stylesheet_directory_uri() . '/foryou.js',
        array('jquery'),
        null,
        true
    );

    // 把 admin-ajax.php 的地址传进去
    wp_localize_script('foryou-ajax', 'foryou_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_foryou_ajax_script');

// foryou-choose
add_action('wp_ajax_load_products_by_category', 'load_products_by_category');
add_action('wp_ajax_nopriv_load_products_by_category', 'load_products_by_category');

function load_products_by_category() {
    $category = sanitize_text_field($_POST['category']);

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 15,
    );

    if ($category && $category !== 'all') {
        $args['tax_query'] = array(array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $category,
        ));
    }

    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        echo '<div class="fg-g">';
        while ($loop->have_posts()) {
            $loop->the_post();
            global $product;

            include locate_template('partials/product-card.php');

        }
        echo '</div>';
    } else {
        echo '<p>No products found.</p>';
    }

    wp_reset_postdata();
    wp_die(); // 结束 AJAX 响应
}

// 1. 将自定义数量加入购物车项数据中
add_filter('woocommerce_add_cart_item_data', function($cart_item_data, $product_id, $variation_id, $quantity) {
    $cart_item_data['custom_quantity'] = $quantity;
    return $cart_item_data;
}, 10, 4);




// 4.注入Whatsapp
add_action('wp_footer', function () {
    ?>
    <style>
      .whatsapp-float-btn {
        position: fixed;
        bottom: 57px;
        right: .625rem;
        width: 50px;
        height: 50px;    
        background-color: #0e9e44;
        color: white;
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9;
        cursor: pointer;
        transition: transform 0.2s ease;
      }
      .whatsapp-float-btn:hover {
        transform: scale(1.1);
      }
      .whatsapp-float-btn svg {
        width: 50px;
        height: 50px;
        fill: white;
      } 
      @media (max-width: 768px) {
        .whatsapp-float-btn {
          right: .625rem;
          bottom: 110px;
        }
      }
    </style>
  
    <a href="https://wa.me/6289519388679?text=Hello" 
        class="whatsapp-float-btn" 
        target="_blank" 
        rel="noopener noreferrer" 
        aria-label="Chat via WhatsApp">
        <!-- WhatsApp SVG 图标 -->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="50" height="50" viewBox="0 0 256 256" xml:space="preserve">
            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                <!-- <circle cx="45" cy="45" r="45" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(42,181,64); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/> -->
                <path d="M 16.138 44.738 c -0.002 5.106 1.332 10.091 3.869 14.485 l -4.112 15.013 l 15.365 -4.029 c 4.233 2.309 8.999 3.525 13.85 3.527 h 0.012 c 15.973 0 28.976 -12.999 28.983 -28.974 c 0.003 -7.742 -3.01 -15.022 -8.481 -20.498 c -5.472 -5.476 -12.749 -8.494 -20.502 -8.497 C 29.146 15.765 16.145 28.762 16.138 44.738 M 25.288 58.466 l -0.574 -0.911 c -2.412 -3.834 -3.685 -8.266 -3.683 -12.816 c 0.005 -13.278 10.811 -24.081 24.099 -24.081 c 6.435 0.003 12.482 2.511 17.031 7.062 c 4.548 4.552 7.051 10.603 7.05 17.037 C 69.205 58.036 58.399 68.84 45.121 68.84 h -0.009 c -4.323 -0.003 -8.563 -1.163 -12.261 -3.357 l -0.88 -0.522 l -9.118 2.391 L 25.288 58.466 z M 45.122 73.734 L 45.122 73.734 L 45.122 73.734 C 45.122 73.734 45.121 73.734 45.122 73.734" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
                <path d="M 37.878 32.624 c -0.543 -1.206 -1.113 -1.23 -1.63 -1.251 c -0.422 -0.018 -0.905 -0.017 -1.388 -0.017 c -0.483 0 -1.268 0.181 -1.931 0.906 c -0.664 0.725 -2.535 2.477 -2.535 6.039 c 0 3.563 2.595 7.006 2.957 7.49 c 0.362 0.483 5.01 8.028 12.37 10.931 c 6.118 2.412 7.362 1.933 8.69 1.812 c 1.328 -0.121 4.285 -1.751 4.888 -3.442 c 0.604 -1.691 0.604 -3.14 0.423 -3.443 c -0.181 -0.302 -0.664 -0.483 -1.388 -0.845 c -0.724 -0.362 -4.285 -2.114 -4.948 -2.356 c -0.664 -0.241 -1.147 -0.362 -1.63 0.363 c -0.483 0.724 -1.87 2.355 -2.292 2.838 c -0.422 0.484 -0.845 0.544 -1.569 0.182 c -0.724 -0.363 -3.057 -1.127 -5.824 -3.594 c -2.153 -1.92 -3.606 -4.29 -4.029 -5.015 c -0.422 -0.724 -0.045 -1.116 0.318 -1.477 c 0.325 -0.324 0.724 -0.846 1.087 -1.268 c 0.361 -0.423 0.482 -0.725 0.723 -1.208 c 0.242 -0.483 0.121 -0.906 -0.06 -1.269 C 39.929 37.637 38.522 34.056 37.878 32.624" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"/>
            </g>
        </svg>
    </a>
    <?php
  });
  
// 5.注入一键返回顶部按钮

  add_action('wp_footer', function () {
    ?>
    <!-- 回到顶部按钮 (手机端) -->
    <button id="back-to-top" class="back-to-top" aria-label="Back to Top">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 20px; height: 20px;">
        <path d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z"/>
      </svg>
    </button>


    <style>
      .back-to-top {
        display: none;
        position: fixed;
        z-index: 9;
        border-radius: 50%;
        font-size: 34px;
        width: 50px;
        height: 50px;
        border: none;
        background-color: white;
        color: white;
        bottom: 171px;
        right: 35px;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: opacity 0.3s ease;
      }

      /* 按钮在页面滚动到一定位置时显示 */
      .back-to-top.show {
        display: flex;
      }

      /* 仅在最大宽度为768px以下时显示 */
      @media (max-width: 768px) {
        .back-to-top {
          display: flex;  
          right: 10px;
          bottom: 220px;
          background-color: #ebebeb;
        }
      }

      @media (min-width: 769px) {
        #back-to-top {
          display:none;
        }
      }
    </style>

    <!-- 手机端按钮逻辑 -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById("back-to-top");

        window.addEventListener("scroll", () => {
          if (window.scrollY > 300) {
            btn.classList.add("show");
          } else {
            btn.classList.remove("show");
          }
        });

        btn.addEventListener("click", () => {
          window.scrollTo({
            top: 0,
            behavior: "smooth"
          });
        });
      });
    </script>
    <!-- 电脑端按钮逻辑 -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById("back-top");

        btn.addEventListener("click", () => {
          window.scrollTo({
            top: 0,
            behavior: "smooth"
          });
        });
      });
    </script>

    <?php
});

// 6.侧边展开收起
function enqueue_custom_filter_script() {
  wp_enqueue_script(
      'filter-toggle',
      get_template_directory_uri() . '/filter-toggle.js', 
      array(),
      null,
      true
  );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_filter_script');

// 7.类目页增加内容
add_action('woocommerce_before_main_content', function () {

    echo '<main class="main-layout-wrap" style="background-color: #f7f7ff;">'; 

    // 居中最外层容器
    echo '<div class="main-layout" style="max-width: 1536px; margin: 0 auto; background-color: white;">'; 

    // 分类图导航模块
    echo '<div class="category-navbar bangbang" style="padding: 16px;">';
    echo '<ul class="category-navbar-item" style="display: flex; gap: 15px; padding: 0; list-style: none;">';

    $terms = get_terms([
    'taxonomy'   => 'product_cat',
    // 'parent'     => 0,
    'hide_empty' => false,
    ]);

    foreach ($terms as $term) {
    $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
    $image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : wc_placeholder_img_src();
    $link = get_term_link($term);
    // $name = $term->name;
    $name = get_translated_category_name($term);


    echo '<li style="text-align: center;">';
    echo '<a href="' . esc_url($link) . '">';
    echo '<div class="category-navbar-item-pic" style="margin-bottom: 5px;">';
    echo '<img src="' . esc_url($image_url) . '" width="80" height="80" alt="' . esc_attr($name) . '" style="border-radius: 50px; object-fit: cover;">';
    echo '</div>';
    echo '<div class="category-navbar-item-title" style="text-align: center;">';
    echo '<span style="font-size: 12px;">' . esc_html($name) . '</span>';
    echo '</div>';
    echo '</a>';
    echo '</li>';
    }

    echo '</ul>';
    echo '</div>';
  
    // 下模块
    echo '<div class="main-layout" style="display: flex; gap: 30px;">';
    
    // 侧边模块
    echo '<aside class="custom-left" style="width: 240px; background: #f9f9f9; padding: 20px; border: 1px solid #ccc; z-index: 1; padding-inline-start: 1.25rem; max-height: calc(100vh - 20px); transition: all .3s ease; position: sticky; top: 14px; height: auto; overflow: auto;">';

    echo '<ul class="filter-menu">';

    // === Price ===
    echo '<li>';
    echo '  <div class="filter-header" onclick="toggleFilter(this)"> 
                <span>Price</span>
                <svg xmlns="http://www.w3.org/2000/svg" height="12" width="10.5" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
            </div>';
    echo '  <ul class="filter-options">';
    echo '      <li><a href="?price=0-100">$0 - $100</a></li>';
    echo '      <li><a href="?price=101-1000">$101 - $1000</a></li>';
    echo '  </ul>';
    echo '</li>';

    add_action('wp_footer', function () {
      ?>
    <script>
      function toggleFilter(headerElement) {
          // 找到这个 header 旁边的 .filter-options
          const options = headerElement.nextElementSibling;

          if (options) {
              // 切换显示/隐藏
              options.style.display = (options.style.display === 'none' || options.style.display === '') ? 'block' : 'none';
          }
      }
    </script>
    <?php
    });


    // === Color ===
    echo '<li>';
    echo '  <div class="filter-header" onclick="toggleFilter(this)"> 
                <span>Color</span>
                <svg xmlns="http://www.w3.org/2000/svg" height="12" width="10.5" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
            </div>';
    echo '  <ul class="filter-options">';
    echo '      <li><a href="?color=red">Red</a></li>';
    echo '      <li><a href="?color=blue">Blue</a></li>';
    echo '  </ul>';
    echo '</li>';

    // === Type ===
    echo '<li>';
    echo '  <div class="filter-header" onclick="toggleFilter(this)"> 
                <span>Type</span>
                <svg xmlns="http://www.w3.org/2000/svg" height="12" width="10.5" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
            </div>';
    echo '  <ul class="filter-options">';
    echo '      <li><a href="?type=ring">Ring</a></li>';
    echo '      <li><a href="?type=necklace">Necklace</a></li>';
    echo '  </ul>';
    echo '</li>';

    echo '</ul>';

    // 推荐商品展示区
    $category_slug = 'bracelet'; //  需要展示的分类 slug
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 3,
        'product_cat' => $category_slug,
        'post_status' => 'publish',
    );
    $products = new WP_Query($args);



    if ($products->have_posts()) {
        echo '<div class="sidebar-products" style="margin-top: 20px;">';
        echo '<h4 style="margin-bottom: 10px;">' .
            esc_html(t([
                'en' => 'Recommend',
                'es' => 'Recomendado',
                'ru' => 'Рекомендуемое'
            ])) .
        '</h4>';
    
        while ($products->have_posts()) {
            $products->the_post();
            global $product;
            echo '<div class="sidebar-product" style="margin-bottom: 15px;">';
            echo '<a href="' . get_permalink() . '" style="display: block; text-align: center;">';
            echo woocommerce_get_product_thumbnail('woocommerce_thumbnail');
            echo '<div style="font-size: 14px; margin-top: 5px;">' . esc_html(get_translated_product_title($product)) . '</div>';
            echo '</a>';
            echo '</div>';
        }
    
        echo '</div>';
        wp_reset_postdata();
    }
  

    echo '</aside>';

    echo '<main class="product-area" style="flex: 1;">';
  }, 5);
  
  add_action('woocommerce_after_main_content', function () {
    echo '</main>'; // 关闭右侧 product-area
    echo '</div>';  // 关闭 main-layout
    echo '</div>';  // 关闭 main-layout-wrap
  }, 50);
  
 
// ajax接口
  add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'my_ajax_add_to_cart');
  add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'my_ajax_add_to_cart');
  
  function my_ajax_add_to_cart() {
    $product_id = intval($_POST['product_id'] ?? 0);
    $quantity = intval($_POST['quantity'] ?? 1);
    if (!$product_id) wp_send_json_error();
  
    $result = WC()->cart->add_to_cart($product_id, $quantity);
    if ($result) {
      wc_add_to_cart_message($product_id);
      wp_send_json_success();
    } else {
      wp_send_json_error();
    }
  }
  

// 8.商品页增加收藏按钮
  add_action( 'woocommerce_after_add_to_cart_button', 'insert_custom_wishlist_button' );
  function insert_custom_wishlist_button() {
      global $product;
      $product_id = $product->get_id();
      ?>
      <a href="#"
          class="add_to_wishlist single_add_to_wishlist"
          data-product-id="<?php echo esc_attr( $product_id ); ?>"
          data-product-type="simple"
          data-title="Add to wishlist"
          style="margin-left: 10px; font-size: 18px; color: #d60000;">
          
          <i class="fa-solid fa-heart-circle-plus"></i>
      </a>
      <?php
  }
  
// 删去商品页sku展示
  add_action('woocommerce_before_single_product', function () {
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
  });
  

function get_discount_rate_by_quantity($quantity) {
  if ($quantity >= 500) return 0.3;  // 30% off
  if ($quantity >= 100) return 0.2;  // 20% off
  if ($quantity >= 50) return 0.1;   // 10% off
  return 0;
}



add_action('woocommerce_before_calculate_totals', function($cart) {
  if (is_admin() && !defined('DOING_AJAX')) return;

  foreach ($cart->get_cart() as $cart_item) {
      if (!isset($cart_item['custom_quantity'])) continue;

      $product = $cart_item['data'];
      $base_price = floatval($product->get_sale_price()) ?: floatval($product->get_regular_price());
      $quantity = $cart_item['quantity'];
      
      // 使用折扣率
      $rate = get_discount_rate_by_quantity($quantity);
      $new_price = $base_price * (1 - $rate);

      if ($new_price > 0) {
          $product->set_price($new_price);
      }
  }
});


// 添加阶梯价展示
add_action('woocommerce_single_product_summary', 'add_wholesale_tier_box', 25);
function add_wholesale_tier_box() {
    global $product;

    $is_variable = $product instanceof WC_Product_Variable;

    $base_price = $product instanceof WC_Product_Variable
      ? min(array_map(fn($v) => floatval($v['display_price']), $product->get_available_variations()))
      : floatval($product->get_price());


    if ($is_variable) {
        $variations = $product->get_available_variations();
        echo '<script>';
        echo 'const WHOLESALE_PRICE_MAP = {';
        foreach ($variations as $v) {
            $vid = $v['variation_id'];
            $price = floatval($v['display_price']);
            echo "'$vid': $price,";
        }
        echo '};';
        echo '</script>';
    }

    //所有商品都默认显示阶梯价
    $display_style = 'display:flex;';

    echo '<div class="wholesale-tier-box" style="' . esc_attr($display_style) . '">';
    ?>
      <div class="molly">
        <div class="tips"><?php echo esc_html(t([
            'en' => 'Price',
            'ru' => 'Цена',
            'es' => 'Precio',
        ])); ?></div>
        <div class="tips"><?php echo esc_html(t([
            'en' => 'Quantity',
            'ru' => 'Количество',
            'es' => 'Cantidad',
        ])); ?></div>
      </div>
      <div class="tier">
        <div class="tier-price" id="tier1-price">$ -</div>
        <div class="tier-label" id="tier1-label">50-99</div>
      </div>
      <div class="tier">
        <div class="tier-price" id="tier2-price">$ -</div>
        <div class="tier-label" id="tier2-label">100-499</div>
      </div>
      <div class="tier">
        <div class="tier-price" id="tier3-price">$ -</div>
        <div class="tier-label" id="tier3-label">500+</div>
      </div>
    </div>
    <?php

      $currency = get_current_currency_config();
      $symbol = $currency['symbol'];
      $rate = $currency['rate'];

      echo "<script>
      const CURRENCY_SYMBOL = '" . esc_js($symbol) . "';
      const CURRENCY_RATE = " . floatval($rate) . ";
      </script>";




    ?>

    


    <script>
    document.addEventListener("DOMContentLoaded", function () {
      const tierBox = document.querySelector(".wholesale-tier-box");

      const tier1El = document.getElementById("tier1-price");
      const tier2El = document.getElementById("tier2-price");
      const tier3El = document.getElementById("tier3-price");

      const label1El = document.getElementById("tier1-label");
      const label2El = document.getElementById("tier2-label");
      const label3El = document.getElementById("tier3-label");


      const format = n => CURRENCY_SYMBOL + ' ' + (n * CURRENCY_RATE).toLocaleString("en-US", {minimumFractionDigits: 2});

      

      function updateTiers(basePrice) {
        tierBox.style.display = 'flex';

        const rate = typeof CURRENCY_RATE !== 'undefined' ? CURRENCY_RATE : 1;
        const symbol = typeof CURRENCY_SYMBOL !== 'undefined' ? CURRENCY_SYMBOL : '$';

        // 使用 toLocaleString 加入千位分隔符，保留两位小数
        const format = n => symbol + (n * rate).toLocaleString(undefined, {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2
        });

        // 调整这些折扣比例
        tier1El.textContent = format(basePrice * 0.9); // 10% off
        tier2El.textContent = format(basePrice * 0.8); // 20% off
        tier3El.textContent = format(basePrice * 0.7); // 30% off
      }




      function highlightTier(qty) {
        // 移除所有高亮
        tier1El.classList.remove('active');
        tier2El.classList.remove('active');
        tier3El.classList.remove('active');
        label1El.classList.remove('active');
        label2El.classList.remove('active');
        label3El.classList.remove('active');

        // 添加对应高亮
        if (qty >= 500) {
          tier3El.classList.add('active');
          label3El.classList.add('active');
        } else if (qty >= 100) {
          tier2El.classList.add('active');
          label2El.classList.add('active');
        } else if (qty >= 50) {
          tier1El.classList.add('active');
          label1El.classList.add('active');
        }
      }

      // 所有商品初始都加载主价格阶梯价
      updateTiers(<?php echo $base_price; ?>);

      // 非变体商品初始可高亮（如数量=0时无效果）
      highlightTier(0);

      // 有变体时，监听点击行更新阶梯价
      <?php if ($is_variable): ?>
      document.querySelectorAll("tr[data-vid]").forEach(row => {
        row.querySelectorAll(".qty-btn, .qty-input").forEach(btn => {
          btn.addEventListener("click", function () {
            const vid = row.dataset.vid;
            const base = WHOLESALE_PRICE_MAP[vid];
            // if (base) updateTiers(base);
            if (base) {
              updateTiers(base);
              const input = row.querySelector(".qty-input");
              const qty = parseInt(input.value) || 0;
              highlightTier(qty);
            }

          });
        });
      });
      <?php endif; ?>

      document.querySelectorAll(".qty-input").forEach(input => {
        input.addEventListener("input", function () {
          const qty = parseInt(this.value) || 0;
          highlightTier(qty);
        });
      });

    });

    </script>
    <?php
}


// 添加手机端查看更多变体
add_action('woocommerce_single_product_summary', 'inject_labubu_variation_preview', 26);

function inject_labubu_variation_preview() {
    global $product;

    // 仅在变量商品上显示
    if (!is_product() || !$product instanceof WC_Product_Variable) return;

    $variations = $product->get_available_variations();
    $total_variants = count($variations);
    $max_display = 3;

    echo '<div class="hidilao">
      <div>
        <div class="labubu">
          <div class="labubu-1">';

    // 展示前3张变体图
    $shown = 0;
    foreach ($variations as $variation) {
        if ($shown >= $max_display) break;

        $img = $variation['image']['src'] ?: wc_placeholder_img_src();
        $name = $variation['attributes'] ? implode(', ', $variation['attributes']) : 'Variation';

        echo '<img src="' . esc_url($img) . '" alt="' . esc_attr($name) . '" class="labubu-2">';
        $shown++;
    }

    // 仅当变体超过3个时显示提示
    if ($total_variants > $max_display) {
        echo '<div class="labubu-9">';
        echo '... ' . $total_variants . ' styles to choose from';
        echo '</div>';
    }

    echo '</div></div></div></div>';
}


// 添加手机端选择运输国家
add_action('woocommerce_single_product_summary', 'inject_country_selector_component', 27);

function inject_country_selector_component() {
  ?>
    <div class="jacky">
        <div>

            <div class="michelle">
                <div class="your">
                    <span>Delivery:</span>

                </div>
                <div class="mine">
                    <span class="guang">
                        <!-- 国旗 -->
                        <img class="cmz-1" src="#" alt="">
                        <!-- 国家名 -->
                        <span class="cmz-2"></span>
                        <!-- 下箭头 -->
                        <i class="fa-solid fa-angle-down cmz-3"></i>
                    </span>
                </div>
            </div>

            <div class="cmz-7">
                <div class="cmz-8">
                    <!-- 物流 -->
                    <div class="cmz-9">
                        <div class="cmz-10">
                            <!-- 物流公司id -->
                            <div class="cmz-11">
                            Fedex IP
                            </div>
                            <!-- estimate ship time -->
                            <div class="cmz-12">
                                <div class="cmz-14">
                                    <span class="zzt-1">
                                    Estimated ship date
                                    </span>
                                </div>
                                <div class="cmz-15">
                                Sun, Jun 22 
                                <div class="zzt-2">
                                - Tues, Jun 24
                                </div>
                                </div>
                            </div>
                            <!-- estimate delivery time -->
                            <div class="cmz-13">
                                <!-- <p class="zzt-4"> -->
                                    <div class="zzt-9">
                                        Estimated delivery date
                                    </div>
                                <!-- </p> -->
                                <p class="zzt-5">
                                    Wed, Jul 02 - Fri, Jul 04
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>
        <!-- 黑幕 -->
        <div class="cnael">

        </div>

        <!-- 弹窗 -->
        <div class="cnaleqe">
            <!-- 弹窗搜索框 -->
            <div class="kyoto">
                <div class="yzs-1">
                    <div class="yzs-2">
                        <!-- search-icon -->
                        <div class="yzs-3">
                            <i class="fa-solid fa-magnifying-glass yzs-9"></i>
                        </div>
                        <!-- search-box -->
                        <div class="yzs-4">
                            <div class="ysl-1">
                                <input type="search" placeholder="search" class="ysl-2" id="cnz-w1">
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>

            <!-- 弹窗选择框 -->
            <div class="tokyo">
                <!--  -->
                <div class="kenan1">
                    <button class="kenan3">
                    Cancel
                    </button>
                    <button class="kenan4">
                    Confirm
                    </button>
                </div>
                <!--  -->
                <div class="kenan2">
                    <div class="moli1">

                        <ul class="moli4">
                            <li class="moli9" data-code="US">
                                <!-- 国家 -->
                                <div class="moli11">
                                [US] United States
                                </div>
                            </li>
                            <li class="moli9" data-code="RU">
                                <!-- 国家 -->
                                <div class="moli11">
                                [RU] Russia
                                </div>
                            </li>
                            <li class="moli9" data-code="PK">
                                <!-- 国家 -->
                                <div class="moli11">
                                [PK] Pakistan
                                </div>
                            </li>
                            <li class="moli9" data-code="SP">
                                <!-- 国家 -->
                                <div class="moli11">
                                [ES] Spain
                                </div>
                            </li>
                            <li class="moli9" data-code="BR">
                                <!-- 国家 -->
                                <div class="moli11">
                                [BR] Brazil
                                </div>
                            </li>
  
                        </ul>
                    </div>
                    <div class="moli2">

                    </div>
                    <div class="moli3">

                    </div>

                </div>

            </div>

        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const popup = document.querySelector('.cnaleqe');
    const overlay = document.querySelector('.cnael');
    const trigger = document.querySelector('.guang');
    const confirmBtn = document.querySelector('.kenan4');
    const cancelBtn = document.querySelector('.kenan3');
    const scrollBox = document.querySelector('.moli1');
    const items = [...scrollBox.querySelectorAll('.moli9')];

    const flagImg = document.querySelector('.cmz-1');
    const countryText = document.querySelector('.cmz-2');
    const carrierEl = document.querySelector('.cmz-11');
    const shipDateEl = document.querySelector('.cmz-15');
    const deliveryDateEl = document.querySelector('.zzt-5');

    const logisticsData = {
        US: {
        name: 'United States',
        flag: 'us',
        carrier: 'FedEx IP',
        shipDate: 'Sun, Jun 22 - Tue, Jun 24',
        deliveryDate: 'Wed, Jul 02 - Fri, Jul 04'
        },
        RU: {
        name: 'Russia',
        flag: 'ru',
        carrier: 'CDEK',
        shipDate: 'Mon, Jun 24 - Wed, Jun 26',
        deliveryDate: 'Thu, Jul 06 - Mon, Jul 10'
        },
        PK: {
        name: 'Pakistan',
        flag: 'pk',
        carrier: 'DHL Express',
        shipDate: 'Tue, Jun 25 - Thu, Jun 27',
        deliveryDate: 'Fri, Jul 05 - Mon, Jul 08'
        },
        BR: {
        name: 'Brazil',
        flag: 'br',
        carrier: 'Correios',
        shipDate: 'Wed, Jun 26 - Fri, Jun 28',
        deliveryDate: 'Mon, Jul 08 - Wed, Jul 10'
        },
        SP: {
        name: 'Spain',
        flag: 'es',
        carrier: 'Correos',
        shipDate: 'Thu, Jun 27 - Sat, Jun 29',
        deliveryDate: 'Tue, Jul 09 - Thu, Jul 11'
        }
    };

    // 设置默认国家信息（US）
    const defaultCode = 'US';
    const defaultData = logisticsData[defaultCode];
    if (defaultData) {
      flagImg.src = `https://flagcdn.com/48x36/${defaultData.flag}.png`;
      flagImg.alt = defaultData.name;
      countryText.textContent = defaultData.name;
      carrierEl.textContent = defaultData.carrier;
      shipDateEl.textContent = defaultData.shipDate;
      deliveryDateEl.textContent = defaultData.deliveryDate;
    }

    // 初始激活第一个国家项
    const defaultItem = scrollBox.querySelector(`.moli9[data-code="${defaultCode}"]`);
    if (defaultItem) {
      defaultItem.classList.add('active');
    }


    const highlightTop = 110;      // 高亮框的 top 值
    const highlightHeight = 44;    // 高亮框高度
    let scrollTimer = null;

    // 显示弹窗
    trigger.addEventListener('click', () => {
        popup.style.display = 'block';
        overlay.style.display = 'block';
    });

    // 关闭弹窗
    function closePopup() {
        popup.style.display = 'none';
        overlay.style.display = 'none';
    }
    cancelBtn.addEventListener('click', closePopup);
    overlay.addEventListener('click', closePopup);

    // 点击某项手动高亮（也会 scroll 过去）
    items.forEach(item => {
        item.addEventListener('click', function () {
        const code = this.dataset.code;
        if (!code) return;

        items.forEach(i => i.classList.remove('active'));
        this.classList.add('active');

        // 手动吸附到中间
        const scrollBoxRect = scrollBox.getBoundingClientRect();
        const itemRect = this.getBoundingClientRect();
        const delta = itemRect.top - scrollBoxRect.top;
        const targetScrollTop = scrollBox.scrollTop + delta - highlightTop;

        scrollBox.scrollTo({ top: targetScrollTop, behavior: 'smooth' });
        });
    });

    // 获取距离高亮线中心最近的项
    function getClosestItemToCenter() {
        const scrollBoxRect = scrollBox.getBoundingClientRect();
        const centerY = scrollBoxRect.top + highlightTop + (highlightHeight / 2);

        let closest = null;
        let minDiff = Infinity;

        items.forEach(item => {
        const itemRect = item.getBoundingClientRect();
        const itemCenter = itemRect.top + itemRect.height / 2;
        const diff = Math.abs(itemCenter - centerY);

        if (diff < minDiff) {
            minDiff = diff;
            closest = item;
        }
        });

        return closest;
    }

    // 高亮当前项
    function highlightActive() {
        const active = getClosestItemToCenter();
        if (!active) return;

        items.forEach(i => i.classList.remove('active'));
        active.classList.add('active');
    }

    // 吸附到中间
    function snapToCenter() {
        const active = getClosestItemToCenter();
        if (!active) return;

        const scrollBoxRect = scrollBox.getBoundingClientRect();
        const itemRect = active.getBoundingClientRect();
        const delta = itemRect.top - scrollBoxRect.top;
        const targetScrollTop = scrollBox.scrollTop + delta - highlightTop;

        scrollBox.scrollTo({
        top: targetScrollTop,
        behavior: 'smooth'
        });
    }

    // 滚动监听：高亮 + 吸附
    scrollBox.addEventListener('scroll', () => {
        highlightActive();

        if (scrollTimer) clearTimeout(scrollTimer);
        scrollTimer = setTimeout(() => {
        snapToCenter();
        }, 250);
    });

    // 点击确认按钮 → 读取当前 active 项并更新 UI
    confirmBtn.addEventListener('click', function () {
        const activeItem = document.querySelector('.moli9.active');
        if (!activeItem) return;

        const code = activeItem.dataset.code;
        const data = logisticsData[code];
        if (!data) return;

        flagImg.src = `https://flagcdn.com/48x36/${data.flag}.png`;
        flagImg.alt = data.name;
        countryText.textContent = data.name;
        carrierEl.textContent = data.carrier;
        shipDateEl.textContent = data.shipDate;
        deliveryDateEl.textContent = data.deliveryDate;

        closePopup();
    });

    // 初始加载：自动吸附第一个居中
    window.addEventListener('load', () => {
        snapToCenter();
        highlightActive();
    });
    });
    </script>


  <?php
}


// 商品页多变体加购
add_action('woocommerce_single_product_summary', function () {
  global $product;
  if ($product instanceof WC_Product_Variable) {
      echo do_shortcode('[bulk_variation_table]');
  }
}, 26);

add_shortcode('bulk_variation_table', 'render_bulk_variation_table');
function render_bulk_variation_table() {
    global $product;
    if (!is_product() || !$product instanceof WC_Product_Variable) return '';

    ob_start();
    $product_id = $product->get_id();
    $variations = $product->get_available_variations();
    $ajax_url = admin_url('admin-ajax.php');
    ?>
    <form method="post" class="bulk-variation-form">
        
      <table class="bv-table">
          <thead>
            <tr>
              <th>
                <!-- Image -->
                <?php echo t([
                    'en' => 'Image',
                    'ru' => 'Изображение',
                    'es' => 'Imagen'
                ]); ?>
              </th>
              <th>
                <!-- Attributes -->
                <?php echo t([
                    'en' => 'Attributes',
                    'ru' => 'Атрибуты',
                    'es' => 'Atributos'
                ]); ?>
              </th>
              <th>
                <!-- Price -->
                <?php echo t([
                    'en' => 'Price',
                    'ru' => 'Цена',
                    'es' => 'Precio'
                ]); ?>
              </th>
              <th>
                <!-- Quantity -->
                <?php echo t([
                    'en' => 'Quantity',
                    'ru' => 'Количество',
                    'es' => 'Cantidad'
                ]); ?>
              </th>
            </tr>
          </thead>


          <tbody>
            <?php foreach ($variations as $variation):
                $vid = $variation['variation_id'];
                $price = $variation['display_price'];
                $img = $variation['image']['src'] ?: wc_placeholder_img_src();
                $attrs = implode(', ', array_map('ucfirst', $variation['attributes']));
            ?>
                <tr data-vid="<?php echo esc_attr($vid); ?>">
                    <td><img src="<?php echo esc_url($img); ?>" width="50"></td>
                    <td><?php echo esc_html($attrs); ?></td>
                    
                    <td>
                      <?php
                          $regular_price = floatval($variation['display_regular_price']);
                          $sale_price = floatval($variation['display_price']);

                          $converted_regular = convert_price($regular_price);
                          $converted_sale = convert_price($sale_price);

                          // if ($sale_price < $regular_price) {
                              
                          //     echo wc_price($sale_price) . ' <del style="color: #888; text-decoration: line-through;">' . wc_price($regular_price) . '</del>';
                          // } else {
                              
                          //     echo wc_price($regular_price);
                          // }


                          if ($sale_price < $regular_price) {
                              echo esc_html(convert_price($sale_price)) . 
                                  ' <del style="color: #888; text-decoration: line-through;">' . 
                                  esc_html(convert_price($regular_price)) . 
                                  '</del>';
                          } else {
                              echo esc_html(convert_price($regular_price));
                          }
                        
                      ?>
                    </td>

                    <td>
                        <div class="qty-wrapper">
                            <button type="button" class="qty-btn minus">−</button>
                            <input type="number" name="custom_bulk_variations[<?php echo esc_attr($vid); ?>]" min="0" value="0" class="qty-input claps" />
                            <button type="button" class="qty-btn plus">+</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
          </tbody>

      </table>
          
        <div class="brother">
          <a href="#" 
              class="add_to_wishlist single_add_to_wishlist" 
              data-product-id="<?php echo esc_attr($product_id); ?>" 
              data-product-type="simple" 
              data-title="Add to wishlist">
              <i class="fa-solid fa-heart-circle-plus"></i>
          </a>
          <button type="submit" class="add-to-cart">
            <!-- Add Selected to Cart -->
            <?php echo t([
                'en' => 'Add Selected to Cart',
                'ru' => 'Добавить выбранное в корзину',
                'es' => 'Añadir los seleccionados al carrito'
            ]); ?>

          </button>
        </div>
    </form>
    <div class="bv-message" style="margin-top:10px;"></div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
          // 表单提交 Ajax 加购逻辑
          const form = document.querySelector(".bulk-variation-form");
          form.addEventListener("submit", function (e) {
              e.preventDefault();
              const data = new FormData(form);
              fetch("<?php echo esc_url($ajax_url); ?>?action=ajax_add_bulk_variations", {
                  method: "POST",
                  body: data,
                  credentials: "same-origin"
              })
              .then(res => res.json())
              .then(response => {
                  const msg = document.querySelector(".bv-message");
                  if (response.success) {
                      msg.innerHTML = "<span style='color:green'>Products added successfully!</span>";
                      jQuery(document.body).trigger("added_to_cart");
                      jQuery(document.body).trigger("wc_fragment_refresh");
                  } else {
                      msg.innerHTML = "<span style='color:red'>" + response.data.message + "</span>";
                  }
              });
          });

          // 加减按钮逻辑（和 input 同步）
          document.querySelectorAll(".qty-wrapper").forEach(wrapper => {
              const input = wrapper.querySelector(".qty-input");
              const minus = wrapper.querySelector(".qty-btn.minus");
              const plus = wrapper.querySelector(".qty-btn.plus");

              minus.addEventListener("click", () => {
                  let val = parseInt(input.value) || 0;
                  if (val > 0) input.value = val - 1;
              });

              plus.addEventListener("click", () => {
                  let val = parseInt(input.value) || 0;
                  input.value = val + 1;
              });
          });
      });
    </script>

    <?php
    return ob_get_clean();
}

add_action('wp_ajax_ajax_add_bulk_variations', 'handle_bulk_variation_ajax');
add_action('wp_ajax_nopriv_ajax_add_bulk_variations', 'handle_bulk_variation_ajax');

function handle_bulk_variation_ajax() {
    if (!isset($_POST['custom_bulk_variations'])) {
        wp_send_json_error(['message' => 'No variations selected']);
    }

    $items = $_POST['custom_bulk_variations'];
    $added = 0;

    foreach ($items as $vid => $qty) {
        $variation_id = intval($vid);
        $qty = intval($qty);
        if ($variation_id > 0 && $qty > 0) {
            $product = wc_get_product($variation_id);
            if (!$product) continue;

            // 查找是否已存在相同变体项
            $found = false;
            foreach (WC()->cart->get_cart() as $cart_key => $item) {
                if ($item['variation_id'] == $variation_id) {
                    WC()->cart->set_quantity($cart_key, $item['quantity'] + $qty);
                    $found = true;
                    break;
                }
            }

            // 如果未找到，添加新项
            if (!$found) {
                $result = WC()->cart->add_to_cart($product->get_parent_id(), $qty, $variation_id);
                if ($result) $added++;
            } else {
                $added++;
            }
        }
    }

    if ($added > 0) {
        wp_send_json_success(['added' => $added]);
    } else {
        wp_send_json_error(['message' => 'No valid items added']);
    }
}

add_action('wp_head', function () {
  echo '<style>
  .bv-table { width: 100%; border-collapse: collapse; margin-bottom: 15px; font-size: 14px; }
  .bv-table th, .bv-table td { border: 1px solid #ddd; padding: 10px; text-align: center; }
  .bv-table img { max-height: 40px; border-radius: 4px; }
  .bulk-variation-form button { background: #7f54b3; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
  .bulk-variation-form button:hover { background: #68409c; }
  .qty-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 5px;
}
.qty-btn {
  // width: 28px;
  // height: 28px;
  font-size: 18px;
  border: none;
  background: #eee;
  cursor: pointer;
  border-radius: 4px;
  line-height: 1;
  user-select: none;
}

.qty-btn:hover {
  background: #ddd;
}

.qty-input {
  width: 50px;
  text-align: center;
  height: 30px;
}
  </style>';

});


// 全局右侧边栏
add_action('wp_footer', function () {
  ?>
  <div class="right-sidebar-container">
    <div class="right-sidebar">
      <!-- bulk discount -->
      <a href="" class="right-s-a">
        <div class="r-s-a-d">
          <img src="http://my-website.local/wp-content/uploads/2025/06/discount-1.png" alt="discount" class="r-s-i">
        </div>
      </a>
      <!-- Pre sale -->
      <a href="" class="right-s-a">
        <div class="r-s-a-d">
          <img src="http://my-website.local/wp-content/uploads/2025/06/pre-sale-1.png" alt="presale" class="r-s-i">
        </div>
      </a>
      <!-- Track -->
      <a href="" class="right-s-a">
        <div class="r-s-a-d">
          <img src="http://my-website.local/wp-content/uploads/2025/06/plane-1.png" alt="track" class="r-s-i">
        </div>
      </a>
      <!-- Back to top -->
      <a href='#' id="back-top" class="right-s-a" aria-label="Back to Top">
        <div class="r-s-a-d">
          <img src="http://my-website.local/wp-content/uploads/2025/06/top.png" alt="back to top" class="r-s-i">
        </div>
      </a>     
    </div>
  </div>
  
  <?php
});

// 注入salesamrtly
add_action('wp_footer', function () {
?>
<style>
  @media (min-width: 769px) {
    #s-chat-plugin {
      margin-right: -14px !important;
      margin-bottom: 80px !important;
    }
  }
  @media (max-width: 768px) {
    #s-chat-plugin {
      margin-right: -14px !important;
      margin-bottom: 131px !important;
    }
  }
  
</style>
<?php
});


// PopUp多变体加购逻辑 
add_action('wp_ajax_add_to_cart_custom', 'handle_ajax_add_to_cart_custom');
add_action('wp_ajax_nopriv_add_to_cart_custom', 'handle_ajax_add_to_cart_custom');

function handle_ajax_add_to_cart_custom() {
  if (!isset($_POST['product_id']) || !isset($_POST['quantity'])) {
      wp_send_json_error('Missing data');
  }

  $product_id = absint($_POST['product_id']);
  $quantity = absint($_POST['quantity']);

  if ($quantity < 1) {
      wp_send_json_error('Invalid quantity');
  }

  $added = WC()->cart->add_to_cart($product_id, $quantity);

  if ($added) {
      wp_send_json_success(['message' => 'Added', 'product_id' => $product_id]);
  } else {
      wp_send_json_error('Add failed');
  }
}
  



// 展开收起description
add_filter('woocommerce_product_tabs', 'wrap_product_description_in_collapse', 98);
function wrap_product_description_in_collapse($tabs) {
    if (isset($tabs['description'])) {
        $desc = $tabs['description']['callback'];
        $tabs['description']['callback'] = function () use ($desc) {
            echo '
            <div class="desc-container">
                <div class="custom-desc-wrap" id="descContent">';
            call_user_func($desc); // 输出描述内容


            echo '
                <div class="desc-overlay"></div>
            </div>';
            ?>
            <button class="desc-toggle-btn" onclick="toggleProductDesc()">
                <?php echo esc_html(t([
                    'en' => 'More details',
                    'es' => 'Más detalles',
                    'ru' => 'Подробнее'
                ])); ?>
            </button>
            </div>
            <?php

        };
    }
    return $tabs;
}



add_action('wp_footer', function () {
  if (!is_product()) return;

  // 用 t() 函数获取当前语言的翻译
  $label_more = t([
    'en' => 'More details',
    'es' => 'Más detalles',
    'ru' => 'Подробнее'
  ]);

  $label_close = t([
    'en' => 'Close',
    'es' => 'Cerrar',
    'ru' => 'Закрыть'
  ]);
  ?>
  <script>
    const LANG_LABEL_MORE = <?php echo json_encode($label_more); ?>;
    const LANG_LABEL_CLOSE = <?php echo json_encode($label_close); ?>;

    function toggleProductDesc() {
      const wrapper = document.getElementById('descContent');
      const btn = document.querySelector('.desc-toggle-btn');
      if (!wrapper || !btn) return;
      wrapper.classList.toggle('expanded');
      btn.textContent = wrapper.classList.contains('expanded') ? LANG_LABEL_CLOSE : LANG_LABEL_MORE;
    }
  </script>
  <?php
});



// minicart
function get_discounted_price_for_cart_item($cart_item) {
  $product = $cart_item['data'];
  $quantity = $cart_item['quantity'];
  $base_price = floatval($product->get_sale_price()) ?: floatval($product->get_regular_price());

  // 逻辑依赖
  if (function_exists('get_discount_amount_by_quantity')) {
      $discount = get_discount_amount_by_quantity($quantity);
      $final_price = $base_price - $discount;
  } else {
      $final_price = $base_price;
  }

  return $final_price;
}



function get_current_lang() {
  if (isset($_COOKIE['site_lang'])) {
      $lang = $_COOKIE['site_lang'];
      if (in_array($lang, ['en', 'ru', 'es'])) {
          return $lang;
      }
  }
  return 'en'; // 默认英文
}


function t($translations = []) {
  $lang = get_current_lang();
  return $translations[$lang] ?? $translations['en'] ?? '';
}



// 函数封装product_title
function get_translated_product_title($product) {
  if (!is_a($product, 'WC_Product')) return '';

  $lang = get_current_lang();
  $title = $product->get_name();

  $custom_titles = [
      'es' => 'product_title_es',
      'ru' => 'product_title_ru',
  ];

  if (isset($custom_titles[$lang])) {
      $alt_title = get_post_meta($product->get_id(), $custom_titles[$lang], true);
      if (!empty($alt_title)) {
          $title = $alt_title;
      }
  }

  return $title;
}

// 函数封装category_name
function get_translated_category_name($term) {
  if (!is_a($term, 'WP_Term')) return '';

  $lang = function_exists('get_current_lang') ? get_current_lang() : 'en';
  
  // 自定义字段映射
  $custom_fields = [
      'es' => 'title_es',
      'ru' => 'title_ru',
  ];

  // 获取对应语言的自定义字段值
  if (isset($custom_fields[$lang])) {
      $translated_name = get_field($custom_fields[$lang], $term); // ACF 获取 taxonomy 的字段
      if (!empty($translated_name)) {
          return $translated_name;
      }
  }

  return $term->name; // 默认返回原始分类名
}


// 多语言标题输出
add_action('woocommerce_single_product_summary', 'custom_translated_product_title', 5);

function custom_translated_product_title() {
    global $product;

    if (!$product) return;

    
    $title = get_translated_product_title($product);

    echo '<h1 class="product_title entry-title">' . esc_html($title) . '</h1>';
}


// 创建一个获取货币设置的函数

function get_current_currency_code() {
  return $_COOKIE['site_currency'] ?? 'USD'; // fallback 默认 USD
}

function get_current_currency_config() {
  $code = get_current_currency_code();

  $currency_map = [
      'USD' => ['symbol' => '$',  'rate' => 1],
      'GBP' => ['symbol' => '£',  'rate' => 0.8],
      'EUR' => ['symbol' => '€',  'rate' => 0.92],
      'RUB' => ['symbol' => '₽',  'rate' => 90],
      'CNY' => ['symbol' => '¥',  'rate' => 7.1],
  ];

  return $currency_map[$code] ?? $currency_map['USD'];
}



// 格式化价格显示函数
function convert_price($base_price) {
  $currency = get_current_currency_config();
  $converted = $base_price * $currency['rate'];
  return $currency['symbol'] . number_format($converted, 2);
}



// 自定义价格显示逻辑
add_action('woocommerce_single_product_summary', 'custom_multicurrency_product_price', 10);


function custom_multicurrency_product_price() {
  global $product;
  if (!$product) return;

  $currency = get_current_currency_config();

  if ($product instanceof WC_Product_Variable) {
      // 变体商品：获取价格区间
      $min_price = floatval($product->get_variation_price('min', true));
      $max_price = floatval($product->get_variation_price('max', true));

      $min_display = $currency['symbol'] . number_format($min_price * $currency['rate'], 2);
      $max_display = $currency['symbol'] . number_format($max_price * $currency['rate'], 2);

      if ($min_price !== $max_price) {
          echo '<p class="price">' . esc_html($min_display . ' – ' . $max_display) . '</p>';
      } else {
          echo '<p class="price">' . esc_html($min_display) . '</p>';
      }

  } else {
      // 简单商品
      $price = floatval($product->get_price());
      echo '<p class="price">' . esc_html(convert_price($price)) . '</p>';
  }
}



function get_current_country() {
  // 优先 cookie
  return $_COOKIE['site_country'] ?? 'US'; // fallback
}



add_action('woocommerce_before_calculate_totals', function($cart) {
  if (is_admin() && !defined('DOING_AJAX')) return;

  $currency = get_current_currency_config();
  $rate = floatval($currency['rate']);

  foreach ($cart->get_cart() as $cart_item) {
    $product = $cart_item['data'];

    // 原价（经过阶梯折扣处理后）
    $base_price = floatval($product->get_sale_price()) ?: floatval($product->get_regular_price());

    // 如果使用阶梯折扣（例如 10%、20%、30%）
    if (isset($cart_item['quantity'])) {
      $qty = $cart_item['quantity'];
      $discount_rate = get_discount_rate_by_quantity($qty);
      $base_price = $base_price * (1 - $discount_rate);
    }

    // 按照语言币种换算
    $converted_price = $base_price * $rate;

    if ($converted_price > 0) {
      $product->set_price($converted_price);
    }
  }
});




add_filter('woocommerce_currency_symbol', 'custom_woocommerce_currency_symbol', 10, 2);
function custom_woocommerce_currency_symbol($currency_symbol, $currency) {
    $custom = get_current_currency_config();
    return $custom['symbol'];
}



// 商品描述语言变更
add_filter('the_content', 'replace_product_description_with_translation');

function replace_product_description_with_translation($content) {
    if (!is_product()) return $content;

    global $product;
    if (!$product || !is_a($product, 'WC_Product')) return $content;

    // 获取自定义多语言描述
    $translated = get_translated_product_description($product);

    // 保留格式并输出
    return !empty($translated)
        ? wpautop(wp_kses_post($translated))
        : $content;
}

function get_translated_product_description($product) {
  if (!is_a($product, 'WC_Product')) return '';

  $lang = get_current_lang();

  $default_description = $product->get_description();

  $custom_descriptions = [
      // 'zh' => 'product_desc_zh',
      'es' => 'product_desc_es',
      'ru' => 'product_desc_ru',
      // 'id' => 'product_desc_id',
  ];

  if (isset($custom_descriptions[$lang])) {
      $alt_desc = get_post_meta($product->get_id(), $custom_descriptions[$lang], true);
      if (!empty($alt_desc)) {
          return $alt_desc;
      }
  }

  return $default_description;
}


// 商品页语言变更
add_filter('woocommerce_product_tabs', 'custom_rename_product_tabs', 98);
function custom_rename_product_tabs($tabs) {
    $lang = get_current_lang(); // 语言判断函数

    if ($lang === 'ru') { 
        $tabs['description']['title'] = 'описание';
        $tabs['additional_information']['title'] = 'Дополнительная информация';
        $tabs['reviews']['title'] = 'обзоры';
    } elseif ($lang === 'es') { 
        $tabs['description']['title'] = 'descripción';
        $tabs['additional_information']['title'] = 'información adicional';
        $tabs['reviews']['title'] = 'reseñas';
    }

    return $tabs;
}





// H1商品页语言
add_filter('woocommerce_page_title', 'custom_translate_category_title');
function custom_translate_category_title($title) {
    if (is_product_category()) {
        $term = get_queried_object(); // 当前分类对象
        $lang = function_exists('get_current_lang') ? get_current_lang() : 'en';

        $field_map = [
            'es' => 'title_es',
            'ru' => 'title_ru',
        ];

        if (isset($field_map[$lang])) {
            $custom_title = get_field($field_map[$lang], 'product_cat_' . $term->term_id);
            if (!empty($custom_title)) {
                return $custom_title;
            }
        }

        return $term->name; // 默认分类名
    }

    return $title;
}


// 面包屑导航语言
add_filter('woocommerce_get_breadcrumb', 'custom_translate_breadcrumb_all');
function custom_translate_breadcrumb_all($crumbs) {
    $lang = function_exists('get_current_lang') ? get_current_lang() : 'en';
    $field_map = [
        'es' => 'title_es',
        'ru' => 'title_ru',
    ];

    // 替换每一项
    foreach ($crumbs as &$crumb) {
        $label = $crumb[0];

        // 替换分类名
        $term = get_term_by('name', $label, 'product_cat');
        if ($term && isset($field_map[$lang])) {
            $translated = get_field($field_map[$lang], 'product_cat_' . $term->term_id);
            if (!empty($translated)) {
                $crumb[0] = $translated;
            }
        }
    }

    // 替换商品标题（最后一个 crumb）
    if (is_product()) {
        global $product;
        if ($product && isset($field_map[$lang])) {
            $translated_title = get_translated_product_title($product);
            if (!empty($translated_title)) {
                $crumbs[count($crumbs) - 1][0] = $translated_title;
            }
        }
    }

    return $crumbs;
}



add_action('init', 'apply_user_language_from_cookie');
function apply_user_language_from_cookie() {
    // 避免影响后台和登录页语言
    if (is_admin() || in_array($GLOBALS['pagenow'], ['wp-login.php'])) {
        return;
    }

    if (isset($_COOKIE['site_lang'])) {
        $map = [
            'en' => 'en_US',
            'ru' => 'ru_RU',
            'es' => 'es_ES',
            'zh' => 'zh_CN',
        ];
        $short = $_COOKIE['site_lang'];
        if (isset($map[$short])) {
            switch_to_locale($map[$short]);
        }
    }
}
































