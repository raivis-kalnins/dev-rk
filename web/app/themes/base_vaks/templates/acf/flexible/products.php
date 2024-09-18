<?php
$id = 1;
//var_dump($products);
$productsCat = $products['prod_category_name'] ?? '';
$productsCatClass = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','', $productsCat));
$productsDesc = $products['prod_group_description'] ?? '';
$productsItems = $products['product_items'] ?? '';
?>
<!-- acf flexible - products -->
	<div class="section__products container-boxed products-section products-section-<?=$productsCatClass?>" catitem="<?=$productsCatClass?>" prodname="<?=$productsCat?>">
		<?php if (!empty($productsCat)): ?><h3 class="prod-group-name"><?=$productsCat?></h3><?php endif; ?>
		<?php if (!empty($productsDesc)): ?><p class="prod-group-description"><?=$productsDesc?></p><?php endif; ?>
		<ul>
			<?php foreach($productsItems as $item): //var_dump($item);
				$bgC = $item['select_field'] ?? '';
				if ( $bgC == 'dzeltens' ) {
					$bgColor = '#ffc54d33';
				} elseif ( $bgC == 'zals' ) {
					$bgColor = '#82d26033';
				} else {
					$bgColor = '#0aafff33';
				}
				$image = $item['product_image'] ?? '';
				$imageBg = wp_get_attachment_image_src($image,'full') ?? '';
				$imageMeta = get_post_meta( $image ) ?? '';
				$imageAlt = $imageMeta['_wp_attachment_image_alt'][0] ?? '';
				$productCaption = $item['product_description']['product_caption'] ?? '';
				$fauxUrl = $item['product_description']['product_link'] ?? '';
				//var_dump($imageAlt);
			?>
				<li class="products-section faux-link__element" <?php if (!empty($imageBg)): ?>style="background: <?=$bgColor?> url('<?=$imageBg[0]?>') 75% bottom / auto 80px no-repeat"<?php endif; ?>>
					<div class="products-section-wrap">
						<div class="products-section-wrap-desc overlay">
							<?php if (!empty($productCaption)): ?><?=$productCaption?><?php endif; ?>
							<?php /* if (!empty($fauxUrl['url'])): ?>
								<a href="<?=$fauxUrl['url']?>" <?php if (!empty($fauxUrl['target'])): ?>target="<?=$fauxUrl['target']?>"<?php endif; ?> class="shop-now above-faux">Shop now</a>
								<a href="<?=$fauxUrl['url']?>" <?php if (!empty($fauxUrl['target'])): ?>target="<?=$fauxUrl['target']?>"<?php endif; ?> class="faux-link__overlay-link"></a>
							<?php endif; */ ?>
						</div>
					</div>
				</li>
			<?php endforeach; ?> 
		</ul>
	</div>
<!-- acf flexible - products -->