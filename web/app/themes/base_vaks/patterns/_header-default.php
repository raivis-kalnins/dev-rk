<?php
/**
 * Title: Default Header
 * Slug: header-default
 * Categories: caballero-patterns-main
 * Keywords: Default Header
 */
?>
<!-- wp:group {"tagName":"div","className":"container header-wrap","layout":{"inherit":true}} -->
<div class="wp-block-group container header-wrap">
	<!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"nowrap"},"className":"container-boxed header-wrap_top"} -->
	<div class="wp-block-group container-boxed header-wrap_top">		
		<!-- wp:woocommerce/customer-account {"displayStyle":"icon_only","iconStyle":"line","iconClass":"wc-block-customer-account__account-icon","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} /-->
		 <!-- wp:list -->
		<ul class="wp-block-list">
			<?php pll_the_languages( array( 'show_flags' => 1,'show_names' => 0, 'current_lang' => 1 ) ); ?>
		</ul>
		<!-- /wp:list -->
		
		<!-- wp:woocommerce/mini-cart /-->
	</div>
	<!-- /wp:group -->
	 <!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"nowrap"},"className":"container-boxed header-wrap_nav"} -->
	<div class="wp-block-group container-boxed header-wrap_nav">
		<!-- wp:site-logo {"shouldSyncIcon":false,"className":"is-style-default"} /-->
		<!-- wp:navigation {"ref":121,"layout":{"type":"flex","justifyContent":"left"}} /-->
	</div>
	<!-- /wp:group -->
	<!-- wp:separator {"className":"is-style-wide"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->
</div>
<!-- /wp:group -->