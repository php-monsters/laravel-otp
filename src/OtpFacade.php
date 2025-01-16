<?php

namespace PhpMonsters\Otp;

use Illuminate\Support\Facades\Facade;

class OtpFacade extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'otp';
    }
}
