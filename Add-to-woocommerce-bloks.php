<?php 

/* Plugin name: Add to woocommerce bloks */

function customize_block_product( $html, $data, $product ) {
	$short_description = $product->get_short_description() ? '<div class="wp-block-grid__short-description">' . wc_format_content( $product->get_short_description() ) . ' </div>' : '';
	$add_to_wishlist = do_shortcode( '[yith_wcwl_add_to_wishlist product_id="' . $product->get_id() . '"]' );
	$html = "<li class=\"wc-block-grid__product\">
				<a href=\"{$data->permalink}\" class=\"wc-block-grid__product-link\">
					{$data->image}
					{$data->title}
				</a>
				{$short_description}
				{$data->badge}
				{$data->price}
				{$data->rating}
				{$data->button}
				{$add_to_wishlist}
			</li>";
	return $html;
}
add_filter( 'woocommerce_blocks_product_grid_item_html', 'customize_block_product', 10, 3 );
