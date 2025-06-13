/**
 * Show the banner and handle position changes.
 *
 * @package WPConsent
 */

// Define global WPConsent namespace
window.WPConsent = {
	// Hook system for display checks
	displayChecks: [],
	checksPassed: true,

	// Register a display check function that returns a promise
	registerDisplayCheck: function(checkFunction) {
		this.displayChecks.push(checkFunction);
		this.checksPassed = false;
	},

	// Run all display checks and return a promise
	runDisplayChecks: function() {
		if (this.displayChecks.length === 0) {
			this.checksPassed = true;
			return Promise.resolve();
		}

		return Promise.all(this.displayChecks.map(check => check()))
			.then(() => {
				this.checksPassed = true;
				return Promise.resolve();
			})
			.catch(error => {
				console.error('Error in WPConsent display check:', error);
				this.checksPassed = true; // Default to showing banner on error
				return Promise.resolve();
			});
	},

	// Core functions that need to be globally accessible
	acceptAll: function () {
		const preferences = {};
		if (Array.isArray(wpconsent.slugs)) {
			wpconsent.slugs.forEach(slug => {
				preferences[slug] = true;
			});
		}
		this.savePreferences(preferences);
		this.closePreferences();
	},

	savePreferences: function ( preferences ) {
		const existingPreferences = this.getCookie( 'wpconsent_preferences' );
		let reload = false;

		// Clear cookies if the preferences changed OR if wpconsent.default_allow is true and not all settings are true.
		if ( existingPreferences && JSON.stringify( existingPreferences ) !== JSON.stringify( preferences ) || (
			wpconsent.default_allow && Object.values(preferences).some(value => value === false)
		) ) {
			this.clearCookies();
			reload = true;
		}

		// Save preferences to a cookie
		this.setCookie( 'wpconsent_preferences', JSON.stringify( preferences ), wpconsent.consent_duration );

		// Hide the banner
		this.hideBanner();

		// Close preferences modal if open
		this.closePreferences();

		// Unlock scripts based on the new preferences
		this.unlockScripts( preferences );

		// Unlock iframes based on the new preferences
		this.unlockIframes( preferences );

		// Show the floating button
		const floatingButton = this.shadowRoot?.querySelector( '#wpconsent-consent-floating' );
		if ( floatingButton ) {
			floatingButton.style.display = 'block';
		}

		this.updateWordPressConsent( preferences );

		// Trigger events.
		window.dispatchEvent( new CustomEvent( 'wpconsent_consent_saved', {detail: preferences} ) );

		if ( existingPreferences ) {
			window.dispatchEvent( new CustomEvent( 'wpconsent_consent_updated', {detail: preferences} ) );
		}

		if ( reload ) {
			// Override document.cookie to prevent new cookies from being set before we reload the page.
			Object.defineProperty( document, 'cookie', {
				get: function () {
					return '';
				},
				set: function ( value ) {
				}
			} );
			// Reload the page if we cleared cookies to ensure the new preferences are applied.
			window.location.reload();
		}
	},

	showPreferences: function () {
		const modal = this.shadowRoot?.querySelector( '#wpconsent-preferences-modal' );
		if ( modal ) {
			modal.style.display = 'flex';
			// Set up focus trap for the preferences modal
			this.setupFocusTrap( modal );
			// Focus the preferences title
			const modalTitle = this.shadowRoot?.querySelector( '#wpconsent-preferences-title' );
			if ( modalTitle ) {
				setTimeout( () => {
					modalTitle.focus( {preventScroll: true} );
					// Set this as our tracked element
					this.lastFocusedElement = modalTitle;
				}, 100 );
			}

			// Set checkbox states based on saved preferences
			const preferences = this.getCookie( 'wpconsent_preferences' );
			if ( preferences ) {
				try {
					const savedPreferences = JSON.parse( preferences );
					const checkboxes = this.shadowRoot.querySelectorAll( '#wpconsent-preferences-modal input[type="checkbox"]' );
					checkboxes.forEach( checkbox => {
						const category = checkbox.value;
						if ( category in savedPreferences ) {
							checkbox.checked = savedPreferences[category];
						}
					} );
				} catch ( e ) {
					console.error( 'Error parsing WPConsent preferences:', e );
				}
			}
		}
	},

	closePreferences: function () {
		const modal = this.shadowRoot?.querySelector( '#wpconsent-preferences-modal' );
		if ( modal ) {
			modal.style.display = 'none';
			// Remove focus trap when preferences modal is closed
			this.removeFocusTrap();
			// Return focus to the element that had focus before the modal was shown
			if ( this.previouslyFocusedElement ) {
				this.previouslyFocusedElement.focus( {preventScroll: true} );
				this.previouslyFocusedElement = null;
			}
		}
	},

	showBanner: function () {
		const banner = this.shadowRoot?.querySelector( '#wpconsent-banner-holder' );
		if ( banner ) {
			banner.classList.add( 'wpconsent-banner-visible' );
			// Set up focus trap for the banner
			this.setupFocusTrap( banner );
		}
	},

	hideBanner: function () {
		const banner = this.shadowRoot?.querySelector( '#wpconsent-banner-holder' );
		if ( banner ) {
			banner.classList.remove( 'wpconsent-banner-visible' );
			// Remove focus trap when banner is hidden
			this.removeFocusTrap();
			// Return focus to the element that had focus before the banner was shown
			if ( this.previouslyFocusedElement ) {
				this.previouslyFocusedElement.focus( {preventScroll: true} );
				this.previouslyFocusedElement = null;
			}
		}
	},

	setCookie: function ( name, value, days ) {
		let expires = '';
		if ( days > 0 ) {
			const date = new Date();
			date.setTime( date.getTime() + (
				days * 24 * 60 * 60 * 1000
			) );
			expires = 'expires=' + date.toUTCString() + ';';
		}
		document.cookie = name + '=' + value + ';' + expires + 'path=/';
	},

	getCookie: function ( name ) {
		const value = `; ${document.cookie}`;
		const parts = value.split( `; ${name}=` );
		if ( parts.length === 2 ) {
			return parts.pop().split( ';' ).shift();
		}
	},

	hasConsent: function ( category ) {
		// Get current preferences from cookie
		const preferencesStr = this.getCookie( 'wpconsent_preferences' );
		if ( !preferencesStr ) {
			return false;
		}

		try {
			const preferences = JSON.parse( preferencesStr );
			// Essential cookies are always allowed
			if ( category === 'essential' ) {
				return true;
			}
			// Return the status for the requested category
			return preferences[category] === true;
		} catch ( e ) {
			console.error( 'Error parsing WPConsent preferences:', e );
			return false;
		}
	},

	shouldUnlockContent: function(preferences, service, category) {
		// Essential category is always allowed
		if (category === 'essential') {
			return true;
		}

		// If manual toggle services is enabled
		if (wpconsent.manual_toggle_services) {
			if (service && preferences[service] !== undefined) {
				return preferences[service];
			}
			return false;
		}

		return preferences[category] === true;
	},

	unlockScripts: function ( preferences ) {
		const scripts = document.querySelectorAll( 'script[type="text/plain"]' );
		scripts.forEach( script => {
			const category = script.getAttribute( 'data-wpconsent-category' );
			const service = script.getAttribute( 'data-wpconsent-name' );

			if (this.shouldUnlockContent(preferences, service, category)) {
				const newScript = document.createElement( 'script' );

				// Copy all attributes except 'type'
				script.getAttributeNames().forEach( attr => {
					if ( attr !== 'type' ) {
						newScript.setAttribute( attr, script.getAttribute( attr ) );
					}
				} );

				// Handle src attribute
				const src = script.getAttribute( 'data-wpconsent-src' );
				if ( src ) {
					newScript.src = src;
				} else {
					newScript.text = script.text;
				}

				script.parentNode.replaceChild( newScript, script );
			}
		} );

		// Send a custom event on the document when consent is processed.
		document.dispatchEvent( new CustomEvent( 'wpconsent_consent_processed', {detail: preferences} ) );
	},

	unlockIframes: function ( preferences ) {
		const iframes = document.querySelectorAll( 'iframe[data-wpconsent-src]' );
		iframes.forEach( iframe => {
			const category = iframe.getAttribute( 'data-wpconsent-category' );
			const service = iframe.getAttribute( 'data-wpconsent-name' );

			if (this.shouldUnlockContent(preferences, service, category)) {
				// Get the src from the data attribute
				const src = iframe.getAttribute( 'data-wpconsent-src' );
				if ( src ) {
					iframe.src = src;
				}

				// Remove the data attributes
				iframe.removeAttribute( 'data-wpconsent-src' );
				iframe.removeAttribute( 'data-wpconsent-name' );
				iframe.removeAttribute( 'data-wpconsent-category' );
			}
		} );

		// Let's loop through all .wpconsent-iframe-placeholder and remove thumbnail and overlay based on data-wpconsent-category.
		const placeholders = document.querySelectorAll( '.wpconsent-iframe-placeholder' );
		placeholders.forEach( placeholder => {
			const category = placeholder.getAttribute( 'data-wpconsent-category' );
			const service = placeholder.getAttribute( 'data-wpconsent-name' );

			if (this.shouldUnlockContent(preferences, service, category)) {
				const thumbnail = placeholder.querySelector( '.wpconsent-iframe-thumbnail' );
				const overlay = placeholder.querySelector( '.wpconsent-iframe-overlay-content' );
				if ( thumbnail ) {
					thumbnail.remove();
				}
				if ( overlay ) {
					overlay.remove();
				}
				// Remove wpconsent-iframe-placeholder class.
				placeholder.classList.remove( 'wpconsent-iframe-placeholder' );
			}
		} );
	},

	// Initialize the banner
	init: function () {
		this.initWordPress();

		const container = document.getElementById( 'wpconsent-container' );
		const template = document.getElementById( 'wpconsent-template' );

		// Get existing shadow root or create new one
		this.shadowRoot = container.shadowRoot;
		if ( !this.shadowRoot ) {
			this.shadowRoot = container.attachShadow( {mode: 'open'} );
			const content = template.content.cloneNode( true );
			this.shadowRoot.appendChild( content );
			template.remove();

			// Initialize event listeners and other UI components
			this.initializeEventListeners();
			this.initializeAccordions();
			this.initializeKeyboardHandlers();

			// Run all display checks before proceeding with banner initialization
			this.runDisplayChecks().then(() => {
				// Only load CSS and potentially show banner after all checks have passed
				this.loadExternalCSS(container).then(() => {
					this.processBannerDisplay();
				});
			});
		} else {
			// If shadow root already exists, just process banner display
			this.processBannerDisplay();
		}
	},

	// Process banner display based on existing preferences
	processBannerDisplay: function() {
		// Check for existing preferences.
		const existingPreferences = this.getCookie( 'wpconsent_preferences' );
		if ( existingPreferences ) {
			let preferences = {};
			try {
				// Check if the preferences are valid JSON.
				preferences = JSON.parse( existingPreferences );

				// Check if preferences keys match current slugs
				if (
					wpconsent.slugs && Array.isArray(wpconsent.slugs) &&
					!wpconsent.slugs.every(slug => preferences.hasOwnProperty(slug))
				) {
					// Preferences are outdated, clear cookie and show banner
					this.setCookie('wpconsent_preferences', '', -1); // Expire the cookie
					this.showBanner();
					return;
				}

				this.unlockScripts( preferences );
				this.unlockIframes( preferences );
			} catch ( e ) {
				console.error( 'Error parsing WPConsent preferences:', e );
			}
			const floatingButton = this.shadowRoot.querySelector( '#wpconsent-consent-floating' );
			if ( floatingButton ) {
				floatingButton.style.display = 'block';
			}
		} else {
			// Only show banner if all checks have passed
			if (this.checksPassed) {
				this.showBanner();
			}

			// If default_allow is true, let's unlock scripts until the user accepts or declines.
			if ( wpconsent.default_allow ) {
				const allPreferences = {};
				// Get all slugs and set them to true.
				wpconsent.slugs.forEach(slug => {
					allPreferences[slug] = true;
				});
				this.unlockScripts(allPreferences);
				this.unlockIframes(allPreferences);
			}
		}
	},

	// Load external CSS
	loadExternalCSS: function ( container ) {
		return new Promise((resolve, reject) => {
			try {
				const cssUrl = `${wpconsent.css_url}?ver=${wpconsent.css_version}`;
				fetch(cssUrl)
					.then(response => response.text())
					.then(css => {
						const style = document.createElement('style');
						style.textContent = css;
						this.shadowRoot.appendChild(style);
						container.style.display = 'block';
						resolve();
					})
					.catch(error => {
						console.error('Failed to load WPConsent styles:', error);
						// Still resolve so the flow continues even if CSS fails to load
						resolve();
					});
			} catch (error) {
				console.error('Failed to load WPConsent styles:', error);
				// Still resolve so the flow continues even if CSS fails to load
				resolve();
			}
		});
	},

	// Initialize event listeners
	initializeEventListeners: function () {
		// Accept all button
		this.shadowRoot.querySelectorAll( '.wpconsent-accept-all' ).forEach( button => button.addEventListener( 'click', () => this.acceptAll() ) );

		// Cancel all button
		this.shadowRoot.querySelector( '#wpconsent-cancel-all' )?.addEventListener( 'click', () => {
			const preferences = {};
			wpconsent.slugs.forEach(slug => {
				const serviceCheckbox = this.shadowRoot.querySelector(`#wpconsent-preferences-modal input[type="checkbox"][id="cookie-service-${slug}"]`);
				if (serviceCheckbox && serviceCheckbox.disabled) {
					preferences[slug] = true;
				} else {
					preferences[slug] = false;
				}
			});
			preferences.essential = true; // Essential is always true
			this.savePreferences( preferences );
		} );

		// Close button
		this.shadowRoot.querySelector( '#wpconsent-banner-close' )?.addEventListener( 'click', () => this.hideBanner() );

		// Preferences button
		this.shadowRoot.querySelector( '#wpconsent-preferences-all' )?.addEventListener( 'click', () => this.showPreferences() );

		// Floating button
		const floatingButton = this.shadowRoot.querySelector( '#wpconsent-consent-floating' );
		if ( floatingButton ) {
			floatingButton.addEventListener( 'click', () => this.showPreferences() );
		}

		// Add checkbox event listeners
		this.initializeCheckboxListeners();

		// Iframe placeholder buttons
		document.addEventListener( 'click', ( e ) => {
			const iframeButton = e.target.closest( '.wpconsent-iframe-accept-button' );
			if ( iframeButton ) {
				const category = iframeButton.getAttribute( 'data-category' );
				const placeholder = iframeButton.closest( '.wpconsent-iframe-placeholder' );
				const service = placeholder?.getAttribute( 'data-wpconsent-name' );

				if ( category ) {
					// Get current preferences.
					let currentPreferences = {};
					try {
						currentPreferences = JSON.parse( this.getCookie( 'wpconsent_preferences' ) || '{}' );
					} catch ( error ) {
						console.error( 'Failed to parse wpconsent_preferences cookie:', error );
					}

					// Update preferences for this category and service
					const newPreferences = {
						...currentPreferences,
						essential: true, // Essential is always true
						[category]: true
					};

					// If we have a service name, also set its preference
					if ( service ) {
						newPreferences[service] = true;
					}

					// Save preferences and trigger unlock
					this.savePreferences( newPreferences );
				}
			}
		} );

		// Preferences modal buttons
		this.shadowRoot.querySelector( '.wpconsent-preferences-header-close' )?.addEventListener( 'click', () => this.closePreferences() );
		this.shadowRoot.querySelector( '.wpconsent-save-preferences' )?.addEventListener( 'click', () => {
			const checkboxes = this.shadowRoot.querySelectorAll( '#wpconsent-preferences-modal input[type="checkbox"]' );
			const selectedCookies = Array.from(checkboxes)
				.filter(checkbox => checkbox.checked)
				.map(checkbox => checkbox.value);

			const preferences = {};

			wpconsent.slugs.forEach(slug => {
				preferences[slug] = selectedCookies.includes(slug);
			});

			preferences.essential = true; // Essential is always true

			this.savePreferences(preferences);
		});
		this.shadowRoot.querySelector( '.wpconsent-close-preferences' )?.addEventListener( 'click', () => this.closePreferences() );

		window.addEventListener( 'wpconsent_consent_saved', function ( event ) {
			// Fire this only if gtag exists.
			if ( typeof gtag !== 'function' ) {
				return;
			}
			// Passed detail is preferences.
			const preferences = event.detail;
			gtag( 'consent', 'update', {
				'ad_storage': preferences.marketing ? 'granted' : 'denied',
				'analytics_storage': preferences.statistics ? 'granted' : 'denied',
				'ad_user_data': preferences.marketing ? 'granted' : 'denied',
				'ad_personalization': preferences.marketing ? 'granted' : 'denied',
				'security_storage': 'granted',
				'functionality_storage': 'granted'
			} );
		} );
	},

	// Initialize checkbox listeners for category and service checkboxes
	initializeCheckboxListeners: function() {
		const categoryCheckboxes = this.shadowRoot.querySelectorAll('#wpconsent-preferences-modal input[type="checkbox"][id^="cookie-category-"]');

		categoryCheckboxes.forEach(categoryCheckbox => {
			categoryCheckbox.addEventListener('change', (e) => {
				this.handleCategoryCheckboxChange(e.target);
			});
		});

		const serviceCheckboxes = this.shadowRoot.querySelectorAll('#wpconsent-preferences-modal input[type="checkbox"][id^="cookie-service-"]');

		serviceCheckboxes.forEach(serviceCheckbox => {
			serviceCheckbox.addEventListener('change', (e) => {
				this.handleServiceCheckboxChange(e.target);
			});
		});
	},

	handleCategoryCheckboxChange: function(categoryCheckbox) {
		const categoryId = categoryCheckbox.id.replace('cookie-category-', '');

		// Find all service checkboxes in this category
		const serviceCheckboxes = this.shadowRoot.querySelectorAll(`#wpconsent-preferences-modal input[type="checkbox"][id^="cookie-service-"]`);

		serviceCheckboxes.forEach(serviceCheckbox => {
			// Only update service checkboxes that belong to this category
			if (serviceCheckbox.closest(`.wpconsent-cookie-category-${categoryId}`)) {
				serviceCheckbox.checked = categoryCheckbox.checked;
			}
		});
	},

	handleServiceCheckboxChange: function(serviceCheckbox) {
		const categoryAccordion = serviceCheckbox.closest('.wpconsent-cookie-category');
		if (!categoryAccordion) return;

		const categoryCheckbox = categoryAccordion.querySelector('input[type="checkbox"][id^="cookie-category-"]');
		if (!categoryCheckbox) return;

		const serviceCheckboxes = categoryAccordion.querySelectorAll('input[type="checkbox"][id^="cookie-service-"]');

		let anyChecked = false;
		serviceCheckboxes.forEach(checkbox => {
			if (checkbox.checked) {
				anyChecked = true;
			}
		});

		categoryCheckbox.checked = anyChecked;
	},

	initializeAccordions() {
		const accordions = this.shadowRoot.querySelectorAll( '.wpconsent-preferences-accordion-item' );
		accordions.forEach( ( accordion ) => {
			const header = accordion.querySelector( '.wpconsent-preferences-accordion-header' );
			const content = accordion.querySelector( '.wpconsent-preferences-accordion-content' );

			if ( header && content ) {
				header.addEventListener( 'click', ( e ) => {
					// Don't toggle if clicking checkbox
					if ( e.target.closest( '.wpconsent-preferences-checkbox-toggle' ) ) {
						return;
					}
					this.toggleAccordion( accordion, content );
				} );
			}
		} );
	},

	toggleAccordion( accordion, content ) {
		const isActive = accordion.classList.contains( 'active' );
		const parent = accordion.parentElement;
		const isService = accordion.classList.contains( 'wpconsent-cookie-service' );
		const isCategory = accordion.classList.contains( 'wpconsent-cookie-category' );

		// If this is a category accordion
		if ( isCategory ) {
			// Close all other category accordions at the same level
			if ( parent ) {
				parent.querySelectorAll( ':scope > .wpconsent-preferences-accordion-item.wpconsent-cookie-category' ).forEach( ( otherAccordion ) => {
					if ( otherAccordion !== accordion ) {
						otherAccordion.classList.remove( 'active' );
						// Also close all service accordions within this category
						otherAccordion.querySelectorAll( '.wpconsent-cookie-service' ).forEach( ( service ) => {
							service.classList.remove( 'active' );
						} );
					}
				} );
			}
		}
		// If this is a service accordion
		else if ( isService ) {
			// Close all other service accordions at the same level
			if ( parent ) {
				parent.querySelectorAll( ':scope > .wpconsent-preferences-accordion-item.wpconsent-cookie-service' ).forEach( ( otherAccordion ) => {
					if ( otherAccordion !== accordion ) {
						otherAccordion.classList.remove( 'active' );
					}
				} );
			}
		}

		// Toggle current accordion
		accordion.classList.toggle( 'active' );
	},

	// Initialize keyboard handlers for accessibility
	initializeKeyboardHandlers: function () {
		// Add event listener for tab key to manage focus
		document.addEventListener( 'keydown', ( e ) => {
			if ( e.key === 'Tab' ) {
				this.handleTabKey( e );
			} else if ( e.key === 'Escape' ) {
				this.handleEscapeKey( e );
			}
		} );
	},

	// Handle escape key press
	handleEscapeKey: function ( e ) {
		const preferencesModal = this.shadowRoot?.querySelector( '#wpconsent-preferences-modal' );
		const bannerHolder = this.shadowRoot?.querySelector( '#wpconsent-banner-holder' );

		// If preferences modal is open, close it
		if ( preferencesModal && preferencesModal.style.display === 'flex' ) {
			this.closePreferences();
		}
		// Otherwise, if banner is visible, close it
		else if ( bannerHolder && bannerHolder.classList.contains( 'wpconsent-banner-visible' ) ) {
			this.hideBanner();
		}
	},

	// Handle tab key press to implement focus trap
	handleTabKey: function ( e ) {
		// Check if banner or preferences modal is visible
		const bannerHolder = this.shadowRoot?.querySelector( '#wpconsent-banner-holder' );
		const preferencesModal = this.shadowRoot?.querySelector( '#wpconsent-preferences-modal' );

		const bannerVisible = bannerHolder && bannerHolder.classList.contains( 'wpconsent-banner-visible' );
		const preferencesVisible = preferencesModal && preferencesModal.style.display === 'flex';

		// If neither is visible, do nothing
		if ( !bannerVisible && !preferencesVisible ) {
			return;
		}

		// Determine which container is active
		const container = preferencesVisible ? preferencesModal : bannerHolder;

		// Get all focusable elements in the container
		const focusableElements = this.getFocusableElements( container );

		if ( focusableElements.length === 0 ) {
			return;
		}

		// Prevent default tab behavior
		e.preventDefault();

		// Set up variables for the first and last focusable elements
		const firstElement = focusableElements[0];
		const lastElement = focusableElements[focusableElements.length - 1];

		// Track current element index
		let currentElement;

		// If we already have a tracked element, use it
		if ( this.lastFocusedElement && focusableElements.includes( this.lastFocusedElement ) ) {
			currentElement = this.lastFocusedElement;
		} else {
			// Otherwise, start with the first element
			currentElement = firstElement;
			this.lastFocusedElement = currentElement;
		}

		// Find the index of the current element
		const currentIndex = focusableElements.indexOf( currentElement );

		// Determine the next element to focus
		let nextElement;

		if ( e.shiftKey ) {
			// Shift+Tab moves backwards
			if ( currentIndex <= 0 ) {
				nextElement = lastElement; // Wrap to last element
			} else {
				nextElement = focusableElements[currentIndex - 1];
			}
		} else {
			// Tab moves forward
			if ( currentIndex >= focusableElements.length - 1 ) {
				nextElement = firstElement; // Wrap to first element
			} else {
				nextElement = focusableElements[currentIndex + 1];
			}
		}

		// Focus the next element and update our tracking
		nextElement.focus( {preventScroll: true} );
		this.lastFocusedElement = nextElement;
	},

	// Set up focus trap for a container
	setupFocusTrap: function ( container ) {
		// Store the element that had focus before opening the container
		this.previouslyFocusedElement = document.activeElement;
		// Reset the tracked focused element
		this.lastFocusedElement = null;
	},

	// Remove focus trap
	removeFocusTrap: function () {
		// Clear the tracked focused element
		this.lastFocusedElement = null;
	},

	// Set initial focus to the first focusable element
	setInitialFocus: function ( container ) {
		const focusableElements = this.getFocusableElements( container );
		if ( focusableElements.length > 0 ) {
			// Focus on the first button for better accessibility
			setTimeout( () => {
				focusableElements[0].focus( {preventScroll: true} );
				// Set this as our tracked element
				this.lastFocusedElement = focusableElements[0];
			}, 100 );
		}
	},

	// Get all focusable elements within a container
	getFocusableElements: function ( container ) {
		// Selectors for focusable elements
		const focusableSelectors = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';

		// Query all focusable elements within the container
		const elements = Array.from( container.querySelectorAll( focusableSelectors ) )
			// Filter out hidden elements
			                  .filter( el => {
				                  // Check if element and all its ancestors are visible
				                  let currentElement = el;
				                  while ( currentElement && currentElement !== container ) {
					                  const style = window.getComputedStyle( currentElement );
					                  if ( style.display === 'none' ||
					                       style.visibility === 'hidden' ||
					                       style.opacity === '0' ||
					                       currentElement.disabled ||
					                       currentElement.getAttribute( 'aria-hidden' ) === 'true' ) {
						                  return false;
					                  }
					                  currentElement = currentElement.parentElement;
				                  }
				                  return true;
			                  } );

		return elements;
	},

	// Check if an element is contained within a container
	isElementInContainer: function ( element, container ) {
		if ( !element || !container ) {
			return false;
		}

		// Check if the element is within the shadow DOM container
		if ( container.shadowRoot ) {
			return container.shadowRoot.contains( element );
		}

		return container.contains( element );
	},

	// Clear all cookies.
	clearCookies: function () {
		// Delete all cookies.
		var cookies = document.cookie.split( '; ' );
		for ( var c = 0; c < cookies.length; c ++ ) {
			var d = window.location.hostname.split( '.' );
			while ( d.length > 0 ) {
				var cookieBase = encodeURIComponent( cookies[c].split( ';' )[0].split( '=' )[0] ) + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=' + d.join( '.' ) + ' ;path=';
				var p = location.pathname.split( '/' );
				document.cookie = cookieBase + '/';
				while ( p.length > 0 ) {
					document.cookie = cookieBase + p.join( '/' );
					p.pop();
				}
				;
				d.shift();
			}
		}
	},

	// Initialize WordPress consent.
	initWordPress: function () {
		window.wp_consent_type = wpconsent.consent_type;

		let event = new CustomEvent( 'wp_consent_type_defined' );
		document.dispatchEvent( event );
	},

	// Update using wp_set_consent if it exists.
	updateWordPressConsent: function ( preferences ) {
		// Check if WP Consent API is available.
		if ( typeof wp_set_consent === 'function' ) {
			// Map our preference categories to WP Consent API categories.

			// Essential/functional cookies are always allowed.
			wp_set_consent( 'functional', 'allow' );

			// Preferences category - map to essential as we don't have a separate category for this
			// These are typically cookies that store user interface preferences.
			wp_set_consent( 'preferences', 'allow' );

			// Statistics categories.
			wp_set_consent( 'statistics', preferences.statistics ? 'allow' : 'deny' );
			// For anonymous statistics, we'll use the same preference as regular statistics.
			wp_set_consent( 'statistics-anonymous', preferences.statistics ? 'allow' : 'deny' );

			// Marketing category.
			wp_set_consent( 'marketing', preferences.marketing ? 'allow' : 'deny' );
		}
	}
};

// Initialize when DOM is ready.
document.addEventListener( 'DOMContentLoaded', () => WPConsent.init() );
