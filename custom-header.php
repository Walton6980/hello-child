<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?></title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="custom-header">

  <div class="container">
    <!-- 手机端顶部标语 -->
    <div class="mobile-top-banner">
        <span>
            Sign up & Get up to US$40 off for first order
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
    
  </div>
</header>
