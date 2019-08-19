<?php

/**
 * Markup Cookie Consent Configuration
 *
 */

class MarkupCookieConsentConfig extends ModuleConfig {

	/**
	 * Returns default values for module variables
	 *
	 * @return array
	 *
	 */
	public function getDefaults() {
		return [
			"popup" => "#000000",
			"popupText" => "#ffffff",
			"button" => "#ffffff",
			"buttonText" => "#000000",
		];
	}

	/**
	 * Returns inputs for module configuration
	 *
	 * @return InputfieldWrapper
	 *
	 */
	public function getInputfields() {

		$modules = $this->wire("modules");
		$inputfields = parent::getInputfields();

		// Position
		$inputfields->add([
			"type" => "radios",
			"name" => "position",
			"label" => $this->_("Position"),
			"icon" => "arrows",
			"options" => [
				"" => "Banner bottom",
				"top" => "Banner top",
				"top2" => "Banner top (pushdown)",
				"bottom-left" => "Floating left",
				"bottom-right" => "Floating right",
			],
			"optionColumns" => 1,
		]);

		// Layout
		$inputfields->add([
			"type" => "radios",
			"name" => "theme",
			"label" => $this->_("Layout"),
			"icon" => "th-list",
			"options" => [
				"" => "Block",
				"edgeless" => "Edgeless",
				"classic" => "Classic",
				"wire" => "Wire",
			],
			"optionColumns" => 1,
		]);

		// Palette
		$fieldset = $modules->get("InputfieldFieldset");
		$fieldset->label = $this->_("Palette");
		$fieldset->icon = "paint-brush";

		$fieldset->add([
			"type" => "text",
			"name" => "popup",
			"label" => $this->_("Banner"),
			"attr" => ["type" => "color"],
			"columnWidth" => 25,
		]);

		$fieldset->add([
			"type" => "text",
			"name" => "popupText",
			"label" => $this->_("Banner text"),
			"attr" => ["type" => "color"],
			"columnWidth" => 25,
		]);

		$fieldset->add([
			"type" => "text",
			"name" => "button",
			"label" => $this->_("Button"),
			"attr" => ["type" => "color"],
			"columnWidth" => 25,
		]);

		$fieldset->add([
			"type" => "text",
			"name" => "buttonText",
			"label" => $this->_("Button text"),
			"attr" => ["type" => "color"],
			"columnWidth" => 25,
		]);

		$inputfields->add($fieldset);

		// Learn more link
		$fieldset = $modules->get("InputfieldFieldset");
		$fieldset->label = $this->_("Learn more link");
		$fieldset->icon = "link";

		$fieldset->add([
			"type" => "pageListSelect",
			"name" => "linkInt",
			"label" => $this->_("Select a page"),
		]);

		$fieldset->add([
			"type" => "URL",
			"name" => "linkExt",
			"label" => $this->_("Enter a URL"),
			"placeholder" => "https://www.cookiesandyou.com/",
			"showIf" => "linkInt=''",
		]);

		$inputfields->add($fieldset);

		// Compliance type
		$inputfields->add([
			"type" => "radios",
			"name" => "type",
			"label" => $this->_("Compliance type"),
			"icon" => "star-o",
			"options" => [
				"" => "Just tell users that we use cookies",
				"opt-out" => "Let users opt out of cookies ",
				"opt-in" => "Ask users to opt into cookies",
			],
		]);

		// Custom text
		$fieldset = $modules->get("InputfieldFieldset");
		$fieldset->label = $this->_("Custom text");
		$fieldset->icon = "pencil";

		$fieldset->add([
			"type" => "text",
			"name" => "textMessage",
			"label" => $this->_("Message"),
			"placeholder" => $this->_("This website uses cookies to ensure you get the best experience on our website."),
		]);

		$fieldset->add([
			"type" => "text",
			"name" => "textDismiss",
			"label" => $this->_("Dismiss button text"),
			"placeholder" => $this->_("Got it!"),
			"columnWidth" => 50,
		]);

		$fieldset->add([
			"type" => "text",
			"name" => "textLink",
			"label" => $this->_("Policy link text"),
			"placeholder" => $this->_("Learn more"),
			"columnWidth" => 50,
		]);

		$fieldset->add([
			"type" => "text",
			"name" => "textDeny",
			"label" => $this->_("Deny button text"),
			"placeholder" => $this->_("Decline"),
			"columnWidth" => 50,
		]);

		$fieldset->add([
			"type" => "text",
			"name" => "textAllow",
			"label" => $this->_("Accept button text"),
			"placeholder" => $this->_("Allow cookies"),
			"columnWidth" => 50,
		]);

		$inputfields->add($fieldset);

		// Disable the initialisation script
		$inputfields->add([
			"type" => "checkbox",
			"name" => "noScript",
			"label" => $this->_("Disable the initialisation script"),
			"notes" => $this->_("Please select this if you want to add it to your template manually."),
			"collapsed" => 2,
		]);

		return $inputfields;
	}
}
