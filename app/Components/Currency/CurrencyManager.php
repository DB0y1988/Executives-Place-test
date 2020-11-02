<?php 

namespace App\Components\Currency;

use Illuminate\Support\Manager;
use App\Components\Currency\Drivers\LocalDriver;
use App\Components\Currency\Drivers\exchangeRatesApiDriver;

class CurrencyManager extends Manager
{

    /**
    * Get a driver instance.
    *
    * @param  string|null  $name
    * @return mixed
    */
    public function service($name = null)
    {
       return $this->driver($name);
    }

    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return config('currency.default');
    }

    /**
     * Create the Local driver
     * 
    */
    public function createLocalDriver() {
        
    	return new LocalDriver();
    }

    /**
     * Create the 3rd party exchange rates api driver
     * 
    */
    public function createExchangeRatesApiDriver() {
    	return new exchangeRatesApiDriver();
    }
}