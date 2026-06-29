<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userProfiles extends Model
{
    //
    protected $fillable = [
        'user_id',
        'avatar',
        'phone',
        'position',
        'gender',
        'birth_date',
        'address',
        'bio',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
