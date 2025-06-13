<?php
/**
 * Uninstall WPConsent.
 *
 * Remove:
 * - Custom post types and taxonomies
 * - Plugin settings and options
 * - Custom database tables
 * - Uploaded files
 * - Scheduled events
 *
 * @package WPConsent
 */

// Exit if accessed directly.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// If the function already exists we shouldn't run the uninstall as another version of the plugin is active.
if ( function_exists( 'wpconsent' ) ) {
	return;
}

// Load the main plugin file to access the classes.
require_once 'wpconsent.php';

// Clear any scheduled events.
wp_clear_scheduled_hook( 'wpconsent_auto_scanner' );

// Remove notifications.
if ( class_exists( 'WPConsent_Notifications' ) ) {
	WPConsent_Notifications::delete_notifications_data();
}

// Let's see if the uninstall_data option is set.
$settings = get_option( 'wpconsent_settings', array() );

if ( ! empty( $settings['uninstall_data'] ) ) {

	// Remove custom post types and taxonomies.
	global $wpdb;

	// Let's make sure our post type and taxonomy are registered.
	wpconsent()->load_components();
	wpconsent()->cookies->register_post_type();
	wpconsent()->cookies->register_taxonomy();

	// Delete all posts of our custom post type.
	$wpconsent_cookies = get_posts(
		array(
			'post_type'   => 'wpconsent_cookie',
			'post_status' => 'any',
			'numberposts' => - 1,
			'fields'      => 'ids',
		)
	);

	foreach ( $wpconsent_cookies as $cookie_id ) {
		wp_delete_post( $cookie_id, true );
	}

	// Delete all terms and taxonomies.
	$terms = get_terms(
		array(
			'taxonomy'   => 'wpconsent_category',
			'hide_empty' => false,
			'fields'     => 'ids',
		)
	);

	if ( ! is_wp_error( $terms ) ) {
		foreach ( $terms as $term_id ) {
			wp_delete_term( $term_id, 'wpconsent_category' );
		}
	}

	// Delete all plugin options.
	$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'wpconsent\_%'" ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

	// Delete all plugin user meta.
	$wpdb->query( "DELETE FROM {$wpdb->usermeta} WHERE meta_key LIKE 'wpconsent\_%'" ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

	// Delete all plugin post meta.
	$wpdb->query( "DELETE FROM {$wpdb->postmeta} WHERE meta_key LIKE 'wpconsent\_%'" ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$wpdb->query( "DELETE FROM {$wpdb->postmeta} WHERE meta_key LIKE '\_wpconsent\_%'" ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

	// Remove any transients we've left behind.
	$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '\_transient\_wpconsent\_%'" ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '\_site\_transient\_wpconsent\_%'" ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '\_transient\_timeout\_wpconsent\_%'" ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '\_site\_transient\_timeout\_wpconsent\_%'" ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

	// Remove uploaded files.
	$uploads_directory = wp_upload_dir();
	if ( empty( $uploads_directory['error'] ) ) {
		global $wp_filesystem;
		WP_Filesystem();

		// Remove the wpconsent directory from uploads.
		$wp_filesystem->rmdir( $uploads_directory['basedir'] . '/wpconsent/', true );
	}

	// Remove translation files.
	$languages_directory = defined( 'WP_LANG_DIR' ) ? trailingslashit( WP_LANG_DIR ) : trailingslashit( WP_CONTENT_DIR ) . 'languages/';
	$translations        = glob( wp_normalize_path( $languages_directory . 'plugins/wpconsent-*' ) );

	if ( ! empty( $translations ) ) {
		global $wp_filesystem;
		WP_Filesystem();

		foreach ( $translations as $file ) {
			$wp_filesystem->delete( $file );
		}
	}

	// Maybe drop the "records of consent" table.
	if ( class_exists( 'WPConsent_Consent_Log' ) ) {
		$records_table = $wpdb->prefix . 'wpconsent_consent_logs';
		$wpdb->query( "DROP TABLE IF EXISTS {$records_table}" ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
	}
}
