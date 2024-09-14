<?php
/**
 * Weather integration from openweathermap
 *
 * @package vaks
 */

/**
 * Class VAKS_Wearther
 */
class VAKS_Wearther {
	/**
	 * VAKS_Wearther constructor.
	 */
	public function __construct() {
		// Create settings page.
		add_action( 'admin_menu', array( $this, 'settings_page' ) );

		// Save settings.
		add_action( 'admin_post_vaks_weather_save', array( $this, 'save_settings' ) );

		// Create cron every 15 minutes.
		add_action(
			'cron_schedules',
			function ( $schedules ) {
				$schedules['every_15_minutes'] = array(
					'interval' => 15 * 60,
					'display'  => 'Every 15 minutes',
				);

				return $schedules;
			}
		);

		// Request and save weather data.
		add_action( 'vaks_weather_cron', array( $this, 'reqest_save' ) );

		// Schedule cron.
		add_action(
			'init',
			function () {
				if ( ! wp_next_scheduled( 'vaks_weather_cron' ) ) {
					wp_schedule_event( time(), 'every_15_minutes', 'vaks_weather_cron' );
				}
			}
		);
	}

	/**
	 * Settings page
	 */
	public function settings_page() {
		add_submenu_page(
			'options-general.php',
			'Weather',
			'Weather',
			'manage_options',
			'vaks-weather',
			array( $this, 'settings_page_content' )
		);
	}

	/**
	 * Settings page content
	 */
	public function settings_page_content() {
		$action_url = admin_url( 'admin-post.php?action=vaks_weather_save' );

		$last_update = get_option( 'vaks_weather_last_update' );
		$api_key     = get_option( 'vaks_weather_api_key' );
		?>
		<div class="wrap">
			<h1><?php pllc_e( 'Weather', 'weather' ); ?></h1>

			<?php
			if ( ! $api_key ) {
				?>
				<div class="notice notice-error">
					<p><?php pllc_e( 'Please enter API key', 'weather' ); ?></p>
				</div>
				<?php
			}
			?>

			<?php
			// show last update time.
			if ( $last_update ) {
				?>
				<div>
					<p><?php pllc_e( 'Last update', 'weather' ); ?>: <?php echo gmdate( 'Y-m-d H:i:s', $last_update ); ?></p>
				</div>
				<?php
			}
			?>

			<form method="post" action="<?php echo $action_url; ?>">
				<div>
					<label for="">API key</label><br>
					<input type="text" name="api_key" value="<?php echo $api_key; ?>">
				</div>
				<br>

				<button class="button" type="submit">Save</button>
			</form>
		</div>
		<?php
	}

	/**
	 * Save settings
	 */
	public function save_settings() {
		$url = 'options-general.php?page=vaks-weather';

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_redirect( $url );
			exit;
		}

		if ( ! isset( $_POST['api_key'] ) ) {
			wp_redirect( $url );
			exit;
		}

		update_option( 'vaks_weather_api_key', sanitize_text_field( $_POST['api_key'] ) );

		wp_redirect( $url );
		exit;
	}

	/**
	 * Locations
	 *
	 * @return array
	 */
	private function locations() {
		$locations = array(
			'gulbene'   => array(
				'lat' => 57.1759721,
				'lon' => 26.7514713,
			),
			'valmiera'  => array(
				'lat' => 57.5389148,
				'lon' => 25.4261688,
			),
			'varaklani' => array(
				'lat' => 56.743777,
				'lon' => 21.5828975,
			),
			'matisi'    => array(
				'lat' => 57.7007457,
				'lon' => 25.155324163290256,
			),
			'jelgava'   => array(
				'lat' => 56.6514394,
				'lon' => 23.7339143,
			),
		);

		return $locations;
	}

	/**
	 * Abstract request to openweathermap
	 */
	private function request( $url, $data ) {
		$base    = 'https://api.openweathermap.org/data';
		$api_key = get_option( 'vaks_weather_api_key', '' );

		$req_url = $base . $url;

		$req_url = add_query_arg(
			array(
				...$data,
				'units' => 'metric',
				'appid' => $api_key,
			),
			$req_url
		);

		$response = wp_remote_get( $req_url );

		$body = wp_remote_retrieve_body( $response );

		return json_decode( $body, true );
	}

	/**
	 * Call and save weather data
	 */
	public function reqest_save() {
		$locations = $this->locations();

		// Save last update time.
		update_option( 'vaks_weather_last_update', time() );

		$db_locations = array();

		foreach ( $locations as $key => $loc ) {
			$line_data = $this->request(
				'/2.5/weather',
				array(
					'lat' => $loc['lat'],
					'lon' => $loc['lon'],
				)
			);

			$db_locations[ $key ] = $line_data;
		}

		update_option( 'vaks_weather_locations', $db_locations );
	}

	/**
	 * Wind direction
	 *
	 * @param int $deg Wind direction in degrees.
	 *
	 * @return string
	 */
	private static function wind_dir( $deg ) {
		$dirs = array(
			pll__( 'N', 'wind' ),
			pll__( 'NE', 'wind' ),
			pll__( 'E', 'wind' ),
			pll__( 'SE', 'wind' ),
			pll__( 'S', 'wind' ),
			pll__( 'SW', 'wind' ),
			pll__( 'W', 'wind' ),
			pll__( 'NW', 'wind' ),
		);

		$index = round( $deg / 45 );

		return $dirs[ $index ];
	}

	/**
	 * Get weather icon
	 *
	 * @param string $icon Icon code.
	 *
	 * @return string
	 */
	private static function weather_icon( $icon_id ) {
		$icons = array(
			// Day.
			'01d' => 'sunny',
			'02d' => 'day-cloudy',
			'03d' => 'few-clouds',
			'04d' => 'cloudy',
			'09d' => 'rain',
			'10d' => 'day-rain',
			'11d' => 'day-thunderstorm',
			'13d' => 'day-snow',
			'50d' => 'day-mist',
			// night.
			'01n' => 'moon',
			'02n' => 'night-cloudy',
			'03n' => 'few-clouds',
			'04n' => 'cloudy',
			'09n' => 'rain',
			'10n' => 'night-rain',
			'11n' => 'night-thunderstorm',
			'13n' => 'night-snow',
			'50n' => 'night-mist',
		);

		return 'weather/' . $icons[ $icon_id ];
	}

	/**
	 * City name
	 */
	private static function city_name( $key ) {
		$cities = array(
			'gulbene'   => pll__( 'Gulbene', 'weather' ),
			'valmiera'  => pll__( 'Valmiera', 'weather' ),
			'varaklani' => pll__( 'Varaklāni', 'weather' ),
			'matisi'    => pll__( 'Mātīši', 'weather' ),
			'jelgava'   => pll__( 'Jelgava', 'weather' ),
		);

		return $cities[ $key ];
	}

	/**
	 * Get weather data
	 *
	 * @return array
	 */
	public static function get_all() {
		$db_locations = get_option( 'vaks_weather_locations' );

		$locations = array();

		foreach ( $db_locations as $key => $loc ) {
			$locations[ $key ] = array(
				'city'       => self::city_name( $key ),
				'temp'       => $loc['main']['temp'],
				'icon'       => self::weather_icon( $loc['weather'][0]['icon'] ),
				'wind_speed' => $loc['wind']['speed'],
				'wind_dir'   => self::wind_dir( $loc['wind']['deg'] ),
			);
		}

		return $locations;
	}
}
new VAKS_Wearther();
