<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

		do_action( 'woocommerce_single_product_summary' );
		?>


	<!-- #region实时更新批发价 -->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
		const qtyInput = document.querySelector('input.qty');
		const priceWrapper = document.querySelector('p.price'); // 原价父元素
		const priceAmount = priceWrapper?.querySelector('.woocommerce-Price-amount');

		const basePrice = <?php echo floatval($product->get_price()); ?>;

		// 创建包含批发价 + 节省信息的包裹元素
		const wholesaleLine = document.createElement('div');
		wholesaleLine.className = 'wholesale-line';
		wholesaleLine.style.display = 'none'; // 默认隐藏

		wholesaleLine.innerHTML = `
			<span class="wholesale-price" style="color:#d32f2f; font-size: 30px; font-weight: bold;"></span>
			<span class="savings" style="font-size: 13px; color: #388e3c; display: block;"></span>
		`;

		// 插入到原价后
		if (priceWrapper && priceAmount) {
			priceWrapper.appendChild(wholesaleLine);
		}

		function getDiscountPerItem(qty) {
			if (qty >= 500) return 3500;
			if (qty >= 100) return 2000;
			if (qty >= 50) return 1000;
			return 0;
		}

		function updateWholesale() {
			const qty = parseInt(qtyInput?.value) || 1;
			const discount = getDiscountPerItem(qty);
			const newPrice = basePrice - discount;
			const totalSave = discount * qty;

			const wholesaleEl = wholesaleLine.querySelector('.wholesale-price');
			const savingsEl = wholesaleLine.querySelector('.savings');

			if (discount > 0) {
			wholesaleEl.textContent = `¥${newPrice.toLocaleString()}`;
			savingsEl.textContent = `have save ¥${totalSave.toLocaleString()}`;
			wholesaleLine.style.display = 'block'; // ✅ 显示整个区域

			// 原价划线
			priceAmount.style.textDecoration = 'line-through';
			priceAmount.style.color = '#999';
			} else {
			wholesaleLine.style.display = 'none'; // ✅ 整体隐藏无占位
			priceAmount.style.textDecoration = 'none';
			priceAmount.style.color = '';
			}
		}

		qtyInput?.addEventListener('input', updateWholesale);
		updateWholesale(); // 初始化
		});
	</script>
	<!-- #endregion实时更新批发价 -->


	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
