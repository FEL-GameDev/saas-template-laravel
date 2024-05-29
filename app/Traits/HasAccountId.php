<?php

namespace App\Traits;

trait HasAccountId
{
    public static function bootHasAccountId() {
        static::creating(function ($model) {
            if ($model->account_id === null && auth()->user() !== null) {
                $model->account_id = auth()->user()->account_id;
            }
        });
    }
}
