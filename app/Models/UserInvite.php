<?php

namespace App\Models;

use App\Events\UserInviteCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

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
        'name',
        'role_id'
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
