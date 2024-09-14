<?php
/**
 * Custom integrations for website
 *
 * @package vaks
 */

/**
 * Load integrations
 */
function vaks_load_integrations() {
	$integrations = array(
		'calendar',
		'weather',
	);

	foreach ( $integrations as $integration ) {
		require_once __DIR__ . '/' . $integration . '/index.php';
	}
}
vaks_load_integrations();
