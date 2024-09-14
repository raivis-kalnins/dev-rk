<?php
$data = apply_filters( 'vgp_small_data', array() );
?>
<div class="grain">
	<button class="btn btn-header grain-toggle grain-toggle--desktop">
		<?php
		foreach ( $data as $gid => $days ) :
			$price_diff = $days[0]['price'] - $days[1]['price'];

			$icon = $price_diff > 0 ? 'vaks-up' : 'vaks-down';
			$icon = $price_diff == 0 ? 'vaks-neutral' : $icon;

			$class = $price_diff > 0 ? 'positive' : 'negative';
			$class = $price_diff == 0 ? 'neutral' : $class;
			?>
			<div class="text-micro grain-toggle__item">
				<span class="grain-toggle__item-label"><?php echo pll__( $gid ); ?></span>
				<div class="grain-toggle__item-value <?php echo $class; ?>">
					<?php echo get_svg_icon( $icon ); ?>
					<span><?php echo wp_kses_post( number_format( $price_diff, 2, ',', '' ) ); ?></span>
				</div>
			</div>
			<?php
		endforeach;
		?>
		<?php echo get_svg_icon( 'vaks-chevron-down' ); ?>
	</button>
	<button class="btn btn-header grain-toggle grain-toggle--mobile">
		<?php echo get_svg_icon( 'vaks-grain-prices' ); ?>
		<?php echo get_svg_icon( 'vaks-close-burger' ); ?>
	</button>

	<ul class="grain__dropdown hidden">
		<?php
		foreach ( $data as $gid => $days ) :
			$day        = $days[0];
			$price_diff = $days[0]['price'] - $days[1]['price'];

			$icon = $price_diff > 0 ? 'vaks-up' : 'vaks-down';
			$icon = $price_diff == 0 ? 'vaks-neutral' : $icon;

			$class = $price_diff > 0 ? 'positive' : 'negative';
			$class = $price_diff == 0 ? 'neutral' : $class;
			?>
			<li>
				<div class="text-micro grain-item">
					<div class="grain-item__trend <?php echo esc_attr( $class ); ?>">
						<?php echo get_svg_icon( $icon ); ?>
					</div>
					<span class="grain-item__label"><?php echo pll__( $gid ); ?></span>
					<span class="grain-item__value"><?php echo wp_kses_post( number_format( $price_diff, 2, ',', '' ) ); ?></span>

					<div class="grain-item__highlow grain-item__highlow--top">
						<?php echo get_svg_icon( 'vaks-up-2' ); ?>
						<span><?php echo wp_kses_post( number_format( $day['high_price'], 2, ',', '' ) ); ?></span>
					</div>

					<div class="grain-item__highlow grain-item__highlow--bottom">
						<?php echo get_svg_icon( 'vaks-down-2' ); ?>
						<span><?php echo wp_kses_post( number_format( $day['low_price'], 2, ',', '' ) ); ?></span>
					</div>

					<a href="<?php echo esc_url( $day['link'] ); ?>"
						class="btn btn-header grain-item__btn"
						target="_blank"
						rel="noreferrer"
						aria-label="<?php echo esc_attr( pllc__( 'Go to provider', 'grain-prices' ) ); ?>"
					>
						<?php echo get_svg_icon( 'vaks-out' ); ?>
					</a>
				</div>

			</li>
			<?php
		endforeach;
		?>
	</ul>
</div>
