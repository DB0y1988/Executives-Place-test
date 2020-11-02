<?php 

namespace App\Components\Currency\Drivers;

use App\Components\Currency\Contracts\Currency;

final class LocalDriver implements Currency {

	public function convert($data) {
		$exchangeRate = config('currency.exchange_rates.'.$data['currency_from'].'.'.$data['currency_to']);
		return ($data['rate_per_hr'] * $exchangeRate);
	}

}