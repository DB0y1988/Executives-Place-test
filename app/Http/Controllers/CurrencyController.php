<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Container\Container;
use App\Models\User;
use App\Components\Currency\Contracts\Currency;
use App\Components\Currency\Contracts\exchangeRatesApiDriver;
use App\Components\Currency\CurrencyManager;

class CurrencyController extends Controller
{	
	/*
	* Show the converted currency
	*/
    public function show(Request $request, User $user, CurrencyManager $currencyManager) {
    	// Just make sure no funny business is going on
        $request->validate(['currency' => 'required']);
        // Prepare the data to send to the convert method
        $data = [
        	'rate_per_hr' => $user->rate_per_hr,
        	'currency_from' => $user->currency,
        	'currency_to' => $request->currency
        ];
        // If the same currency has been set, no need to convert it
        if($data['currency_from'] === $data['currency_to']) {
        	return response()->json([
        		'currency' => $request->currency,
        		'rate_per_hr' => number_format($user->rate_per_hr, 2)
        	]);
        }
        else {
        	// Run the conversion
        	$currencyConversion = $currencyManager->service('local')->convert($data);
        	return response()->json([
        		'currency' => $request->currency,
        		'exchange_rate' => config('currency.exchange_rates.'.$user->currency.'.'.$request->currency),
        		'rate_per_hr' => number_format($currencyConversion, 2)
        	]);
        }     
    }	
}
