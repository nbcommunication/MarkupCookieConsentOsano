/**
 * Markup Cookie Consent JS
 *
 * @copyright 2019 NB Communication Ltd
 * @license Mozilla Public License v2.0 http://mozilla.org/MPL/2.0/
 *
 */

var CookieConsent = {

	options: {},
	consent: false,
	type: "",

	init: function() {

		var element = document.querySelector("[data-cookieconsent]");
		if(!element) return;

		var options = JSON.parse(element.dataset.cookieconsent);
		if(!options || typeof options !== "object") return;

		if("type" in options) {
			options["onInitialise"] = CookieConsent.check;
			options["onStatusChange"] = CookieConsent.check;
			options["onRevokeChoice"] = CookieConsent.check;
		}

		this.options = options;
		this.type = options.type;
		window.cookieconsent.initialise(this.options);
	},

	check: function() {

		// Has consent been given?
		CookieConsent.consent = this.hasConsented() == (CookieConsent.type == "opt-in" ? true : false);

		// Hook
		CookieConsent.event(CookieConsent.consent);
	},

	event: function(consent) {
		
	}
}

CookieConsent.init();

CookieConsent.event = function(consent) {
	
	//console.log("Cookie Consent is " + (consent ? "" : "not ") + "given");

	// Enable/Disable Google Analytics
	//window["ga-disable-" + gtagId] = consent;
};
