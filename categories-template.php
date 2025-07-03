<?php
/*
Template Name: Categories Page
*/
?>

<?php include get_stylesheet_directory() . '/custom-header.php'; ?>

<main class="custom-categories-main">
    <div class="container cate-container">
        
    <!-- 左侧分类按钮 -->
    <div class="cate-left">
    <div class="cate-left-a">

        <?php
        $categories = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        ]);
        ?>

        <?php foreach ($categories as $cat): ?>

        <div class="cate-left-aok">
            <div class="laksjd fy-33<?php if ($cat === reset($categories)) echo ' active'; ?>" data-category="<?php echo esc_attr($cat->slug); ?>">
                <?php echo esc_html(get_translated_category_name($cat)); ?>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
    </div>

    <!-- 右侧分类内容 -->
    <div class="cate-right">
    <?php foreach ($categories as $cat): ?>
        <div class="cate-right-ye category-content" data-content="<?php echo esc_attr($cat->slug); ?>" style="<?php echo $cat === reset($categories) ? '' : 'display:none;'; ?>">
        <!-- 产品列表结构保持不变 -->
        <div class="mzxnc">
            <div class="qwe1">
                <a href="<?php echo get_term_link($cat); ?>">
                    
                <?php echo esc_html( get_translated_category_name($cat) ); ?>

                </a>
                <i class="fa-solid fa-angle-right qwe5"></i>
            </div>
            <div class="qwe2">
                <?php
                $products = wc_get_products([
                    'limit' => 3,
                    'status' => 'publish',
                    'category' => [$cat->slug],
                ]);
                foreach ($products as $product):
                    $img = wp_get_attachment_image_src($product->get_image_id(), 'medium')[0];
                ?>
                    <a href="<?php echo get_permalink($product->get_id()); ?>" class="wer1">
                    <img class="wer2" src="<?php echo esc_url($img); ?>" alt="">
                    
                    <div class="asd1"><?php echo esc_html(get_translated_product_title($product)); ?></div>

                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    <?php endforeach; ?>
    </div>

    

    <script>
    document.addEventListener("DOMContentLoaded", function () {
    const triggers = document.querySelectorAll(".fy-33");
    const contents = document.querySelectorAll(".category-content");

    triggers.forEach(trigger => {
        trigger.addEventListener("click", function () {
        const target = this.getAttribute("data-category");

        //  移除所有左侧按钮的 active 类
        triggers.forEach(t => t.classList.remove("active"));

        //  添加当前按钮 active 类
        this.classList.add("active");

        //  隐藏所有右侧内容
        contents.forEach(c => c.style.display = "none");

        //  显示匹配类目内容
        const match = document.querySelector(`.category-content[data-content="${target}"]`);
        if (match) {
            match.style.display = "block";
        }
        });
    });
    });
    </script>






        
































        
    </div>
</main>

<?php include get_stylesheet_directory() . '/custom-footer.php'; ?>
