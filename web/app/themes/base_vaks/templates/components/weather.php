<?php
$weather   = VAKS_Wearther::get_all();
$main_city = 'valmiera';
$main      = $weather[ $main_city ];
?>
<div class="header-weather">
	<div class="btn btn-header weather-item header-weather__toggle-open">
		<?php echo get_svg_icon( $main['icon'] ); ?>
		<span class="weather-item__temp"><?php echo round( $main['temp'] ) . '°'; ?></span>
		<span class="weather-item__city"><?php echo $main['city']; ?></span>
		<span><?php echo round( $main['wind_speed'] ) . 'm/s'; ?></span>
		<span><?php echo $main['wind_dir']; ?></span>
		<?php echo get_svg_icon( 'vaks-chevron-down' ); ?>
	</div>

	<ul class="header-weather__dropdown hidden">
		<?php
		foreach ( $weather as $city => $data ) :
			if ( $city == $main_city ) :
				continue;
			endif;
			?>
			<li>
				<div class="weather-item">
					<span class="weather-item__city"><?php echo $data['city']; ?></span>
				</div>
			</li>
			<?php
		endforeach;
		?>
		<button class="btn header-weather__close">
		<?php echo get_svg_icon( 'vaks-close-small' ); ?>

		</button>
	</ul>
</div>


<!-- <?php echo get_svg_icon( $data['icon'] ); ?>
					<span><?php echo round( $data['temp'] ) . '°'; ?></span>
					<span><?php echo round( $data['wind_speed'] ) . 'm/s'; ?></span>
					<span><?php echo $data['wind_dir']; ?></span> -->