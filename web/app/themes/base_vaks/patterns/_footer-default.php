<?php
/**
 * Title: Default Footer
 * Slug: footer-default
 * Categories: caballero-patterns-main
 * Keywords: Default Footer
 */
?>
<!-- wp:group {"tagName":"div","className":"container-boxed","layout":{"inherit":true}} -->
<div class="wp-block-group container">
	<!-- wp:separator {"className":"is-style-wide"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity is-style-wide"/>
	<!-- /wp:separator -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"0px"}},"className":"container-boxed flexbox flexbox--grid"} -->
	<div class="wp-block-group container-boxed flexbox flexbox--grid">
		<!-- wp:spacer {"height":"20px"} -->
		<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		<!-- wp:group {"tagName":"div","className":"foo-logo col col-25 col-l-100","layout":{"inherit":true}} -->
		<div class="wp-block-group foo-logo col col-25 col-l-100">
			<!-- wp:site-logo {"width":116,"shouldSyncIcon":false,"className":"is-style-default"} /-->
			<!-- wp:html -->
				<?php
				$fields = get_fields('option');
				$fb = $fields['soc_fb'] ?? '';
				$in = $fields['soc_in'] ?? '';
				$ln = $fields['soc_ln'] ?? '';
				$tw = $fields['soc_tw'] ?? '';
				$yt = $fields['soc_yt'] ?? '';
		
				$content = '
					<!-- wp:social-links {"iconColor":"foreground","iconColorValue":"#000000","openInNewTab":true,"size":"has-small-icon-size","align":"center","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"}} -->
					<ul class="wp-block-social-links aligncenter has-small-icon-size has-icon-color is-style-logos-only">
						<!-- wp:social-link {"url":"'.$yt.'","service":"youtube"} /-->
						<!-- wp:social-link {"url":"'.$tw.'","service":"x"} /-->
						<!-- wp:social-link {"url":"'.$fb.'","service":"facebook"} /-->
						<!-- wp:social-link {"url":"'.$in.'","service":"instagram"} /-->
						<!-- wp:social-link {"url":"'.$ln.'","service":"linkedin"} /-->
					</ul>
					<!-- /wp:social-links -->';
				echo do_blocks($content);
				?>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->
		<!-- wp:group {"tagName":"div","className":"foo-menu col col-75 col-l-100","layout":{"inherit":true}} -->
		<div class="wp-block-group foo-menu col col-75 col-l-100">
			<!-- wp:html -->
				<?php
				wp_nav_menu(array(
					'theme_location' => 'caballero-footer-menu',
					'container' => 'nav',
					'container_class' => 'foo-menu',
					'menu_class' => 'nav-menu',
				));
				?>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->
		<!-- wp:spacer {"height":"20px"} -->
		<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		<!-- wp:separator {"className":"is-style-default"} -->
		<hr class="wp-block-separator has-alpha-channel-opacity is-style-default"/>
		<!-- /wp:separator -->
		<!-- wp:spacer {"height":"20px"} -->
		<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		<!-- wp:group {"tagName":"div","className":"foo-menu col col-100","layout":{"inherit":true}} -->
		<div class="wp-block-group foo-menu col col-100">
			<!-- wp:paragraph {"align":"left"} -->
			<p class="has-text-align-left foo__copy">© <em>2023</em> VAKS. Visas tiesības rezervētas. <a rel="noreferrer noopener" href="https://caballero.lv" target="_blank" style="float:right"><img src="<?=get_template_directory_uri()?>/assets/img/svg/caballero-logo.svg" alt="Caballero" /></a><a  href="#cookies" target="_blank" style="float:right">Sīkdatnes</a><a  href="#terms" target="_blank" style="float:right">Privātuma politika</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<!-- wp:spacer {"height":"20px"} -->
		<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->