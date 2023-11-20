<?php

namespace App\Models;

use App\Events\UserInviteCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInvite extends Model
{
    use HasFactory, Notifiable;

    /**
     * Summary of dispatchesEvents
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => UserInviteCreated::class
    ];

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'account_id',
        'user_id',
        'invite_code',
        'email',
        'name'
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
