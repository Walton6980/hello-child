<?php
defined( 'ABSPATH' ) || exit;

global $product;

// 如果不是合法商品或不可见，跳过
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
	return;
}
?>

<li <?php wc_product_class( '', $product ); ?>>
	<?php
	// 这里直接调用你封装好的卡片模板
	include locate_template('partials/product-card.php');
	?>
</li>
