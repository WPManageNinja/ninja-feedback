var form = {
	"texts": {
		"supported_fields": [
			"text",
			"email",
			"password",
			"number",
			"url",
			"hidden",
			"file",
			"date"
		],
		"structure": {
			"type": "text",

			"attributes": {
				"name": "first_name",
				"value": "",
				"id": "",
				"class": "",
				"placeholder": "",
				"required": true
			},

			"settings": {
				"container_class": "",
				"label": "First Name",
				"help_message": "",
				"error_message": "",
				"validation_rules": ["email", "unique", "min:4", "max:10"],

				"conditional_logics": {
					"status": true,
					"type": 'any|all',
					"conditions":	[
						{
							"field": 'is_married',
							"operator": '=',
							"value": 'yes'
						},
						{
							"field": 'has_kids',
							"operator": '!=',
							"value": 'no'
						}
					]
				}
			}
		}
	},

	"textarea": {
		"supported_fields": ["textarea"],
		"structure": {
			"type": "text",

			"attributes": {
				"name": "first_name",
				"value": "",
				"id": "",
				"rows": 4,
				"cols": 2,
				"class": "",
				"placeholder": "",
				"required": true
			},

			"settings": {
				"container_class": "",
				"label": "First Name",
				"help_message": "",
				"error_message": "",
				"validation_rules": ["email", "unique", "min:4", "max:10"],
				"conditional_logics": {
					"status": true,
					"type": 'any|all',
					"conditions":	[
						{
							"field": 'is_married',
							"operator": '=',
							"value": 'yes'
						},
						{
							"field": 'has_kids',
							"operator": '!=',
							"value": 'no'
						}
					]
				}
			}
		}
	},


	"radio_checkbox": {
		"supported_fields": ["radio", "checkbox"],
		"structure": {
			"type": "radio|checkbox",

			"attributes": {
				"name": "first_name",
				"value": "",
				"id": "",
				"class": "",
				"required": true
			},

			"settings": {
				"container_class": "",
				"label": "First Name",
				"help_message": "",
				"error_message": "",
				"validation_rules": ["email", "unique", "min:4", "max:10"],
				"conditional_logics": {
					"status": true,
					"type": 'any|all',
					"conditions":	[
						{
							"field": 'is_married',
							"operator": '=',
							"value": 'yes'
						},
						{
							"field": 'has_kids',
							"operator": '!=',
							"value": 'no'
						}
					]
				}
			},

			"options": {
				"yes": "YES, I am ready",
				"no": "Sorry, I can't now"
			}

		}
	},


	"select": {
		"supported_fields": ["radio", "checkbox"],
		"structure": {
			"type": "radio",

			"attributes": {
				"name": "first_name",
				"value": "",
				"id": "",
				"class": "",
				"multiple": true,
				"required": true
			},

			"settings": {
				"container_class": "",
				"label": "First Name",
				"help_message": "",
				"error_message": "",
				"validation_rules": ["email", "unique", "min:4", "max:10"],
				"conditional_logics": {
					"status": true,
					"type": 'any|all',
					"conditions":	[
						{
							"field": 'is_married',
							"operator": '=',
							"value": 'yes'
						},
						{
							"field": 'has_kids',
							"operator": '!=',
							"value": 'no'
						}
					]
				}
			},

			"options": {
				"yes": "YES, I am ready",
				"no": "Sorry, I can't now"
			}
		}
	}

	"html_block": {
		"supported_fields": ["html_block"],
		"structure": {
			"type": "html_block",
			"attributes": {
				"class": "",
				"id": "",
				"name": ""
			},
			"settings": {
				"conditional_logics": {
					"status": true,
					"type": 'any|all',
					"conditions":	[
						{
							"field": 'is_married',
							"operator": '=',
							"value": 'yes'
						},
						{
							"field": 'has_kids',
							"operator": '!=',
							"value": 'no'
						}
					]
				}
			}
			"html": ""
		}
	},

	"shortcode": {
		"supported_fields": ["shortcode"],
		"structure": {
			"type": "shortcode",
			"attributes": {
				"class": "",
				"id": "",
				"name": ""
			},
			"settings": {
				"conditional_logics": {
					"status": true,
					"type": 'any|all',
					"conditions":	[
						{
							"field": 'is_married',
							"operator": '=',
							"value": 'yes'
						},
						{
							"field": 'has_kids',
							"operator": '!=',
							"value": 'no'
						}
					]
				}
			},
			"html": "[latest_posts items='2']"
		}
	},

	"address_block": {
		"supported_fields": ["address_block"],
		"structure": {
			"type": "address_block",
			"attributes": {
				"id": "",
				"class": ""
			},
			"settings": {
				"container_class": "",
				"label": "Your Address",
				"conditional_logics": {
					"status": true,
					"type": 'any|all',
					"conditions":	[
						{
							"field": 'is_married',
							"operator": '=',
							"value": 'yes'
						},
						{
							"field": 'has_kids',
							"operator": '!=',
							"value": 'no'
						}
					]
				}
			},
			fields: [
				{
					"type": "text",
					"attributes": {
						"name": "first_name",
						"value": "",
						"id": "",
						"class": "",
						"placeholder": "",
						"required": true
					},

					"settings": {
						"container_class": "",
						"label": "First Name",
						"help_message": "",
						"error_message": "",
						"validation_rules": ["email", "unique", "min:4", "max:10"]
					}
				}
			]
		}
	},


	"captcha": {
		"supported_fields": ["captcha"],
		"structure": {
			"type": "text",
			"attributes": {
			},
			"settings": {
				"container_class": "",
				"label": "Are You a human!",
				"help_message": "",
				"error_message": "Security Error, Please try again!"
			}
		}
	},

	"container": {
		"supported_fields": ["container"],
		"structure": {
			"type": "container",
			"settings": {

			},
			"attributes": {
				"id": '',
				"class": ''
			},
			"columns": [
				{
					"fields": [
						{

						}
					]
				},
				{
					"fields": [
						{

						}
					]
				}
			]
		}
	}
}


