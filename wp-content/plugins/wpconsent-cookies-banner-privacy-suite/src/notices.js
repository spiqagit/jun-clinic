/* global wpconsent_admin_notices */

/**
 * WPConsent Dismissible Notices.
 *
 * @since 1.6.7.1
 */

'use strict';

var WPConsentAdminWideNotices = window.WPConsentAdminWideNotices || ( function( document, window, $ ) {

	/**
	 * Public functions and properties.
	 *
	 * @since 1.6.7.1
	 *
	 * @type {object}
	 */
	var app = {

		/**
		 * Start the engine.
		 *
		 * @since 1.6.7.1
		 */
		init: function() {

			$( app.ready );
		},

		/**
		 * Document ready.
		 *
		 * @since 1.6.7.1
		 */
		ready: function() {

			app.events();
		},

		/**
		 * Dismissible notices events.
		 *
		 * @since 1.6.7.1
		 */
		events: function() {

			$( document ).on(
				'click',
				'.wpconsent-notice .notice-dismiss, .wpconsent-notice .wpconsent-notice-dismiss',
				app.dismissNotice
			);
		},

		/**
		 * Dismiss notice event handler.
		 *
		 * @since 1.6.7.1
		 *
		 * @param {object} e Event object.
		 * */
		dismissNotice: function( e ) {

			if ( e.target.classList.contains( 'wpconsent-notice-dismiss' ) ) {
				$( this ).closest( '.wpconsent-notice' ).slideUp();
			}

			$.post( wpconsent_admin_notices.ajax_url, {
				action: 'wpconsent_notice_dismiss',
				_wpnonce:   wpconsent_admin_notices.nonce,
				id: 	 ( $( this ).closest( '.wpconsent-notice' ).attr( 'id' ) || '' ).replace( 'wpconsent-notice-', '' ),
			} );
		},
	};

	return app;

}( document, window, jQuery ) );

// Initialize.
WPConsentAdminWideNotices.init();
