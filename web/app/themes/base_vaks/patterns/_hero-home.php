<?php
/**
 * Title: Home Hero
 * Slug: home-hero
 * Categories: caballero-patterns-main
 * Keywords: Home Hero
 */
$h = get_fields() ?? '';
$hero_h1 = $h['hero_title'] ?? '';
$hero_h1 = $h['hero_title'] ?? '';
if ( !empty($hero_h1) ) { 
	$hero_t = '<h1 class="alignwide has-white-color wp-block-post-title">'.$hero_h1.'</h1>'; 
} else { 
	$hero_t = '<!-- wp:post-title {"level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} /-->';
}
$hero_btn = $h['hero_btn'] ?? '';
if ( !empty($hero_btn) ) { 
	$hero_b = '<a href="'.$hero_btn['url'].'" target="'.$hero_btn['target'].'" class="btn btn-primary">'.$hero_btn['title'].'</a>'; 
} else { 
	$hero_b = '';
}
$hero_desc = $h['hero_desc'] ?? '';
if ( !empty($hero_desc) ) {
	$hero_d = '<!-- wp:paragraph --><p>'.$hero_desc.'</p><!-- /wp:paragraph -->';
} else { 
	$hero_d = '';
}
?>
<!-- wp:group {"className":"hero hero-default"} -->
<div class="wp-block-group hero hero-default">
	<!-- wp:group {"className":"container-boxed hero-wrap"} -->
	<div class="wp-block-group container-boxed hero-wrap"><?=$hero_t?></div>
	<!-- /wp:group -->
	 <!-- wp:group {"className":"container-boxed hero-wrap_desc","layout":{"type":"constrained"}} -->
	<div class="wp-block-group container-boxed hero-wrap_desc"><?=$hero_d?><?=$hero_b?></div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
