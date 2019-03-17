<?php

namespace Farojas85\Checkrole;

use Farojas85\Checkrole\Models\Role;
use Illuminate\Contracts\Auth\Guard;

class Checkrole
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
}
