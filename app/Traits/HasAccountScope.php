<?php

namespace App\Traits;

use App\Scopes\AccountScope;

trait HasAccountScope
{
    protected static function bootHasAccountScope()
    {
        if (auth()->check()) {
            static::addGlobalScope(new AccountScope(auth()->user()->account_id));
        }
    }
}

