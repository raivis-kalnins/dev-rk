<?php
/**
 * Nameday display
 */

$day_month = gmdate( 'd.m' );
$nameday   = VAKS_Calendar::get_nameday( $day_month );
?>
<p class="text-micro"><?php echo $nameday; ?></p>
