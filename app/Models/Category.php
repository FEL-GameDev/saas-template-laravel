<?php

namespace App\Models;

use App\Traits\HasAccountId;
use App\Traits\HasAccountScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasAccountScope, HasAccountId;
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
