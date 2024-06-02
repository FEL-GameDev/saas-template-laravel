<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class AccountScope implements Scope
{
    protected $account_id;

    public function __construct($account_id)
    {
        $this->account_id = $account_id;
    }

    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('account_id', $this->account_id);
    }
}
