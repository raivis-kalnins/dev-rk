<?php
/**
 * Implemantation of nameday calendar
 *
 * @package vaks
 */

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

/**
 * Class VAKS_Calendar
 */
class VAKS_Calendar {
	/**
	 * Nameday data file
	 */
	private $filename = '';

	/**
	 * Constructor
	 */
	public function __construct() {
		// Namedays in uploads.
		$this->init_file();

		// Create settings page.
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );

		// Save nameday data.
		add_action( 'admin_post_vaks_calendar_save', array( $this, 'save_nameday_data' ) );
	}

	/**
	 * Initialize nameday file
	 */
	public function init_file() {
		$upload_dir     = wp_upload_dir();
		$this->filename = $upload_dir['basedir'] . '/namedays.json';
	}

	/**
	 * Add options page
	 */
	public function add_plugin_page() {
		add_submenu_page(
			'options-general.php',
			'Calendar',
			'Calendar',
			'manage_options',
			'vaks-calendar',
			array( $this, 'create_admin_page' )
		);
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page() {
		$action_url = admin_url( 'admin-post.php?action=vaks_calendar_save' );

		$last_update = get_option( 'vaks_nameday_last_update' );
		?>
		<div class="wrap">
			<h2>Calendar</h2>

			<?php
			if ( $last_update ) :
				?>
				<p>Last update: <?php echo $last_update; ?></p>
				<?php
			endif;
			?>
			<br>

			<form method="post" action="<?php echo $action_url; ?>" enctype="multipart/form-data">
				<p>You can take nameday xlsx from <a href="https://data.gov.lv/dati/lv/dataset/latviesu-tradicionalais-un-paplasinatais-kalendarvardu-saraksts" rel="noreferrer">Tradicionālais kalendārvārdu saraksts</a> then click "Izpētīt" and "Lejupielādēt"</p>

				<p>
					<input type="file" name="namedays" id="namedays" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
				</p>

				<button class="button" type="submit">Update</button>
			</form>
		</div>
		<?php
		$vaks_nameday_data = get_option( 'vaks_nameday_data' );
		if ( $vaks_nameday_data ) {
			?>
			<table>
				<thead>
					<tr>
						<th>Date</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ( $vaks_nameday_data as $date => $name ) {
						?>
						<tr>
							<td><?php echo $date; ?></td>
							<td><?php echo $name; ?></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
			<?php
		}
	}

	/**
	 * Save nameday xlsx file
	 */
	public function save_nameday_data() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$redirect_url = admin_url( 'options-general.php?page=vaks-calendar' );

		if ( ! isset( $_FILES['namedays'] ) ) {
			wp_redirect( $redirect_url );
			exit;
		}

		$file = $_FILES['namedays'];

		if ( ! $file ) {
			wp_redirect( $redirect_url );
			exit;
		}

		// is the uploaded file a xlsx
		$ext = pathinfo( $file['name'], PATHINFO_EXTENSION );

		if ( 'xlsx' !== $ext ) {
			wp_redirect( $redirect_url );
			exit;
		}

		$nameday_data = array();

		// Read xlsx file.
		$reader = new Xlsx();

		$spreadsheet = $reader->load( $file['tmp_name'] );

		$data = $spreadsheet->getActiveSheet()->toArray();

		foreach ( $data as $index => $row ) {
			if ( 0 === $index ) {
				continue;
			}

			$date = substr_replace( $row[0], '', -1 );
			$name = $row[1];

			$nameday_data[ $date ] = $name;
		}

		// Save nameday last update.
		update_option( 'vaks_nameday_last_update', date( 'Y-m-d H:i:s' ) );

		// Save nameday data to json in uploads.
		file_put_contents( $this->filename, json_encode( $nameday_data ) );

		wp_redirect( $redirect_url );
	}

	/**
	 * Get nameday data
	 */
	public static function get_nameday( $day_month ) {
		$upload_dir = wp_upload_dir();
		$filename   = $upload_dir['basedir'] . '/namedays.json';

		if ( ! file_exists( $filename ) ) {
			return array();
		}

		$nameday_data = json_decode( file_get_contents( $filename ), true );

		return $nameday_data[ $day_month ];
	}
}

new VAKS_Calendar();
