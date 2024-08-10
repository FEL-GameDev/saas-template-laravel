<?php

namespace App\Models;

use App\Traits\HasAccountId;
use App\Traits\HasAccountScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    use HasAccountScope, HasAccountId;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'account_id'
    ];

    // This will update the updated_at column of the category when a subcategory is updated
    protected $touches = ['category'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
