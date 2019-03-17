<?php

namespace Farojas85\Checkrole\Facades;

use Illuminate\Support\Facades\Facade;

class Checkrole extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'checkrole';
    }
}
