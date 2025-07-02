<footer class="custom-footer">
  <!-- 自定义 footer 内容，比如版权、友情链接、底部导航等 -->
  <div class="container">
    <!-- 手机端固定底部栏 -->
    <div class="charli" role="tablist">
        <a class='xcxx' role="tab" href="/" data-path="/">
            <div class="aaaa">
                <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/img_v3_02lf_a440cb43-b083-46ff-8089-9c17ea754d8g.png" alt="">
            </div>
            <div class="bbbb">
                <span>Home</span>
            </div>
        </a>
        <a class='xcxx' role="tab" href="/categories" data-path="/categories">
            <div class="aaaa">
                <!-- <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/gdscategory-2.png" alt=""> -->
                <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/ico-category.png" alt="">
            </div>
            <div class="bbbb">
                <span>Categories</span>
            </div>
        </a>
        <a class='xcxx' role="tab" href="#" data-path="#">
            <div class="aaaa">
                <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/new-1.png" alt="">
            </div>
            <div class="bbbb">
                <span>New</span>
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
                <span>Cart</span>
            </div>
        </a>
        <a class='xcxx' role="tab" href="/my-account" data-path="/my-account">
            <div class="aaaa">
                <img class='cccc' src="http://my-website.local/wp-content/uploads/2025/06/user-1.png" alt="">
            </div>
            <div class="bbbb">
                <span>Account</span>
            </div>
        </a>
    </div>

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
