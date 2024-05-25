<?php

namespace App\Traits;

trait HasAccountId
{
    public static function bootHasAccountId() {
        static::creating(function ($model) {
            $model->account_id = auth()->user()->account_id;
        });
    }
}
