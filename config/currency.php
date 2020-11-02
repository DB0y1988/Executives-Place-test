<?php

/*
    |--------------------------------------------------------------------------
    | Default Currency Driver
    |--------------------------------------------------------------------------
    |
    | Provides the default driver and default exchange rates to be used when no driver
    | is specified in the currency controller
    |
    */

return [

	'default' => 'local',

	'exchange_rates' => [
		'GBP' => [
			'USD' => 1.3,
			'EUR' => 1.1
		],
		'EUR' => [
			'GBP' => 0.9,
			'USD' => 1.2,
		],
		'USD' => [
			'GBP' => 0.7,
			'EUR' => 0.8
		]
	]

];