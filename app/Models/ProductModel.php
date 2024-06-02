<?php

namespace App\Models;

use App\Traits\HasAccountId;
use App\Traits\HasAccountScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    use HasAccountId, HasAccountScope;

    protected $fillable = ['name'];
}
