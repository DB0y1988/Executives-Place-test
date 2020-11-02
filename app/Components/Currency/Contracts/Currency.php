<?php

namespace App\Components\Currency\Contracts;

interface Currency
{
  /**
   * Define the drivers blueprints
   */
   public function convert($data);
}