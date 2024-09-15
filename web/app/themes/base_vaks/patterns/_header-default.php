<?php
/**
 * Title: Default Header
 * Slug: header-default
 * Categories: caballero-patterns-main
 * Keywords: Default Header
 */
?>
<!-- wp:group {"tagName":"header","className":"container","layout":{"inherit":true}} -->
<header class="wp-block-group container">
	<!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"nowrap"},"className":"container-boxed"} -->
	<div class="wp-block-group container-boxed">
		<!-- wp:site-logo {"shouldSyncIcon":false,"className":"is-style-default"} /-->
		<!-- wp:woocommerce/customer-account {"displayStyle":"icon_only","iconStyle":"line","iconClass":"wc-block-customer-account__account-icon","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} /-->
		<!-- wp:woocommerce/mini-cart /-->
		<!-- wp:navigation {"ref":121,"layout":{"type":"flex","justifyContent":"left"}} /-->
	</div>
	<!-- /wp:group -->
	<!-- wp:separator {"className":"is-style-wide"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->
</header>
<!-- /wp:group -->