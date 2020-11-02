<?php 

namespace App\Components\Currency\Drivers;

use App\Components\Currency\Contracts\Currency;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

final class exchangeRatesApiDriver implements Currency {

	public function convert($data) {
		$currencyFrom = $data['currency_from'];
		$currencyTo = $data['currency_to'];
		$response = Http::get("https://api.exchangeratesapi.io/latest?symbols=".$currencyTo."&base=".$currencyFrom);
		$exchangeRates = $response->body();
		$rates =  $response['rates'];
		return $data['rate_per_hr'] * $rates[$currencyTo];
	}

}